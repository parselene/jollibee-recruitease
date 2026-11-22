
import sys
import json
import unicodedata
import re

from sentence_transformers import SentenceTransformer, util


MODEL_NAME = "sentence-transformers/all-MiniLM-L6-v2"

SKILLS_WEIGHT = 0.50
SEMANTIC_WEIGHT = 0.50


def normalize_skill(skill):
    return unicodedata.normalize(
        "NFKC", str(skill)
    ).strip().lower()


def split_into_chunks(text, max_words=100):
    """Split long resume text into smaller meaningful chunks."""
    paragraphs = [
        paragraph.strip()
        for paragraph in re.split(r"[\n\r]+", text)
        if paragraph.strip()
    ]

    chunks = []

    for paragraph in paragraphs:
        words = paragraph.split()

        for index in range(0, len(words), max_words):
            chunk = " ".join(words[index:index + max_words])

            if chunk:
                chunks.append(chunk)

    return chunks or [text]


def match_resume(data):
    try:
        resume_text = data.get("resume_text", "")
        extracted_skills = data.get("extracted_skills", [])
        required_skills = data.get("required_skills", [])
        job_title = data.get("job_title", "")
        job_description = data.get("job_description", "")

        if not resume_text.strip():
            return {
                "success": False,
                "message": "No resume text provided."
            }

        if not required_skills:
            return {
                "success": False,
                "message": "No required skills specified for this job."
            }

        # STEP 1: Exact skill matching.
        applicant_skills = {
            normalize_skill(skill)
            for skill in extracted_skills
        }

        required = [
            normalize_skill(skill)
            for skill in required_skills
        ]

        matched_skills = [
            skill for skill in required
            if skill in applicant_skills
        ]

        missing_skills = [
            skill for skill in required
            if skill not in applicant_skills
        ]

        skills_score = (
            len(matched_skills) / len(required)
        ) * 100

        # STEP 2: Load the pretrained ML model.
        model = SentenceTransformer(MODEL_NAME)

        # Split resume into chunks to reduce truncation
        # when processing longer resumes.
        resume_chunks = split_into_chunks(resume_text)

        # STEP 3: Compare job requirements with resume.
        comparison_text = " ".join([
            str(job_title),
            str(job_description),
            "Required skills: " + ", ".join(required_skills)
        ]).strip()

        resume_embeddings = model.encode(
            resume_chunks,
            convert_to_tensor=True,
            normalize_embeddings=True
        )

        job_embedding = model.encode(
            comparison_text,
            convert_to_tensor=True,
            normalize_embeddings=True
        )

        similarities = util.cos_sim(
            job_embedding,
            resume_embeddings
        )[0]

        # Use the strongest relevant chunk similarities.
        semantic_score = float(
            similarities.max().item() * 100
        )

        semantic_score = max(
            0.0,
            min(100.0, semantic_score)
        )

        # STEP 4: Calculate the combined assessment.
        overall_score = (
            skills_score * SKILLS_WEIGHT
            + semantic_score * SEMANTIC_WEIGHT
        )

        return {
            "success": True,
            "match_score": round(overall_score, 2),
            "skills_score": round(skills_score, 2),
            "semantic_score": round(semantic_score, 2),
            "matched_skills": matched_skills,
            "missing_skills": missing_skills,
            "total_required": len(required),
            "total_matched": len(matched_skills),
            "assessment_weights": {
                "skills": 50,
                "semantic": 50
            }
        }

    except Exception as error:
        return {
            "success": False,
            "message": str(error)
        }


if __name__ == "__main__":
    try:
        data = json.loads(
            sys.stdin.buffer.read().decode("utf-8")
        )

        result = match_resume(data)

        print(json.dumps(result, ensure_ascii=True))

    except Exception as error:
        print(json.dumps({
            "success": False,
            "message": str(error)
        }, ensure_ascii=True))
