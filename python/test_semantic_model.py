
from sentence_transformers import SentenceTransformer, util

MODEL_NAME = "sentence-transformers/all-MiniLM-L6-v2"

print("Loading RecruitEase ML model...")

model = SentenceTransformer(MODEL_NAME)

resume_text = """
Assisted customers with product inquiries.
Handled customer complaints and resolved their concerns.
Processed customer orders and provided friendly service.
"""

job_requirement = "Customer service skills"

resume_embedding = model.encode(
    resume_text,
    convert_to_tensor=True
)

requirement_embedding = model.encode(
    job_requirement,
    convert_to_tensor=True
)

similarity = util.cos_sim(
    requirement_embedding,
    resume_embedding
).item()

print("\nRecruitEase Semantic Matching Test")
print("----------------------------------")
print("Job requirement:", job_requirement)
print("Resume content:", resume_text.strip())
print(f"Semantic similarity: {similarity * 100:.2f}%")
print("\nML semantic comparison completed!")
