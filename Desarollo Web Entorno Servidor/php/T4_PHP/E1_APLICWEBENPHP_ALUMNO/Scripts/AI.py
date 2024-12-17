from huggingface_hub import InferenceClient
import sys

client = InferenceClient(api_key="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")

messages = [
	{
		"role": "user",
		"content": sys.argv[1]
	}
]

completion = client.chat.completions.create(
    model="TinyLlama/TinyLlama-1.1B-Chat-v1.0", messages=messages, max_tokens=500
)

print(completion.choices[0].message.content)
