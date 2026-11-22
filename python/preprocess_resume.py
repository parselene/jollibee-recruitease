
import sys
import json
import re
import unicodedata


def preprocess_resume_text(raw_text):
    try:
        # Normalize Unicode characters.
        text = unicodedata.normalize("NFKC", raw_text)

        # Normalize line endings.
        text = text.replace("\r\n", "\n").replace("\r", "\n")

        # Remove null bytes and unwanted control characters.
        text = "".join(
            char for char in text
            if char == "\n" or char == "\t"
            or unicodedata.category(char)[0] != "C"
        )

        # Preserve line breaks because they help retain
        # resume sections and employment history.
        text = re.sub(r"[ \t]+", " ", text)
        text = re.sub(r"\n{3,}", "\n\n", text)

        text = text.strip()

        if not text:
            return {
                "success": False,
                "message": "No text available for preprocessing."
            }

        # Create a separate lowercase version for
        # dictionary-based skill extraction.
        cleaned_text = text.lower()

        return {
            "success": True,
            "cleaned_text": cleaned_text,
            "original_formatted_text": text
        }

    except Exception as error:
        return {
            "success": False,
            "message": str(error)
        }


if __name__ == "__main__":
    raw_text = sys.stdin.buffer.read().decode("utf-8")

    result = preprocess_resume_text(raw_text)

    print(json.dumps(result, ensure_ascii=True))
