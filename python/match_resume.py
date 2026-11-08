
import sys
import json
import unicodedata


def normalize_skill(skill):
    return unicodedata.normalize("NFKC", str(skill)).strip().lower()


def match_resume(extracted_skills, required_skills):
    try:
        if not required_skills:
            return {
                "success": False,
                "message": "No required skills specified for this job."
            }

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

        total_required = len(required)
        total_matched = len(matched_skills)

        match_score = round(
            (total_matched / total_required) * 100, 2
        )

        return {
            "success": True,
            "match_score": match_score,
            "matched_skills": matched_skills,
            "missing_skills": missing_skills,
            "total_required": total_required,
            "total_matched": total_matched
        }

    except Exception as error:
        return {
            "success": False,
            "message": str(error)
        }


if __name__ == "__main__":
    try:
        data = json.loads(sys.stdin.buffer.read().decode("utf-8"))

        result = match_resume(
            data.get("extracted_skills", []),
            data.get("required_skills", [])
        )

        print(json.dumps(result, ensure_ascii=True))

    except Exception as error:
        print(json.dumps({
            "success": False,
            "message": str(error)
        }, ensure_ascii=True))
