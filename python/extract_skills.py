
import sys
import json
import re
import unicodedata


# Dictionary of skills and their alternative terms.
SKILL_DICTIONARY = {
    "communication": [
        "communication",
        "verbal communication",
        "written communication",
        "communication skills"
    ],
    "leadership": [
        "leadership",
        "leadership skills",
        "team leader",
        "team leadership"
    ],
    "time management": [
        "time management",
        "time management skills"
    ],
    "customer service": [
        "customer service",
        "customer support",
        "customer relations",
        "customer care"
    ],
    "teamwork": [
        "teamwork",
        "team work",
        "team player",
        "collaboration"
    ],
    "problem solving": [
        "problem solving",
        "problem-solving",
        "troubleshooting"
    ],
    "adaptability": [
        "adaptability",
        "flexibility",
        "adaptable"
    ],
    "attention to detail": [
        "attention to detail",
        "detail oriented",
        "detail-oriented"
    ],
    "microsoft office": [
        "microsoft office",
        "ms office"
    ],
    "microsoft excel": [
        "microsoft excel",
        "ms excel",
        "excel"
    ],
    "microsoft word": [
        "microsoft word",
        "ms word"
    ],
    "microsoft powerpoint": [
        "microsoft powerpoint",
        "ms powerpoint",
        "powerpoint"
    ],
    "data entry": [
        "data entry",
        "data encoding",
        "data encoder"
    ],
    "sales": [
        "sales",
        "selling",
        "sales operations"
    ],
    "marketing": [
        "marketing",
        "digital marketing",
        "marketing management"
    ],
    "inventory management": [
        "inventory management",
        "stock management",
        "inventory control"
    ],
    "cash handling": [
        "cash handling",
        "cashier",
        "cash management"
    ],
    "food preparation": [
        "food preparation",
        "food handling",
        "food service"
    ],
    "point of sale": [
        "point of sale",
        "pos system",
        "pos"
    ],
    "organization": [
        "organization",
        "organizational skills",
        "organizing"
    ],
    "critical thinking": [
        "critical thinking",
        "analytical thinking"
    ],
    "decision making": [
        "decision making",
        "decision-making"
    ]
}


def extract_skills(raw_text):
    try:
        text = unicodedata.normalize("NFKC", raw_text).lower()

        if not text.strip():
            return {
                "success": False,
                "message": "No resume text provided."
            }

        extracted_skills = []

        for skill, aliases in SKILL_DICTIONARY.items():

            for alias in aliases:
                escaped_alias = re.escape(alias.lower())

                pattern = (
                    r"(?<![a-z0-9])"
                    + escaped_alias
                    + r"(?![a-z0-9])"
                )

                if re.search(pattern, text):
                    extracted_skills.append(skill)
                    break

        return {
            "success": True,
            "skills": extracted_skills,
            "total_skills": len(extracted_skills)
        }

    except Exception as error:
        return {
            "success": False,
            "message": str(error)
        }


if __name__ == "__main__":

    # Read UTF-8 input from Laravel.
    raw_text = sys.stdin.buffer.read().decode("utf-8")

    result = extract_skills(raw_text)

    print(json.dumps(result, ensure_ascii=True))
