
import sys
import json
from pypdf import PdfReader


def extract_resume_text(file_path):
    try:
        reader = PdfReader(file_path)

        extracted_text = []

        for page in reader.pages:
            text = page.extract_text()

            if text:
                extracted_text.append(text)

        full_text = "\n".join(extracted_text)

        # Clean unnecessary whitespace
        full_text = " ".join(full_text.split())

        if not full_text:
            return {
                "success": False,
                "message": "No readable text found in the PDF."
            }

        return {
            "success": True,
            "text": full_text
        }

    except Exception as error:
        return {
            "success": False,
            "message": str(error)
        }


if __name__ == "__main__":

    if len(sys.argv) < 2:
        print(json.dumps({
            "success": False,
            "message": "Please provide a PDF file path."
        }))
        sys.exit(1)

    pdf_path = sys.argv[1]

    result = extract_resume_text(pdf_path)

    print(json.dumps(result, ensure_ascii=True))
