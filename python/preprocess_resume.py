
import sys
import re
import json
import unicodedata


def preprocess_resume_text(raw_text):
    try:
        # Normalize special Unicode characters
        text = unicodedata.normalize("NFKC", raw_text)

        # Convert all text to lowercase
        text = text.lower()

        # Preserve useful characters in technical skills:
        # Examples: C++, C#, .NET, Node.js
        text = re.sub(r"[^\w\s+#./@'-]", " ", text)

        # Remove unnecessary extra spaces and line breaks
        text = re.sub(r"\s+", " ", text).strip()

        if not text:
            return {
                "success": False,
                "message": "No text available for preprocessing."
            }

        return {
            "success": True,
            "cleaned_text": text
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
