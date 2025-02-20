from huggingface_hub import InferenceClient
import sys

# client = InferenceClient(api_key=sys.argv[8])
client = InferenceClient(api_key=sys.argv[7])

user_input = sys.argv[2]

messages = [
    {
        "role": "user",
        "content": user_input
    }
]

try:
    stream = completion = client.chat.completions.create(
        model=sys.argv[1],
        messages=messages,
        temperature=float(sys.argv[3]),
        max_tokens=int(sys.argv[4]),
        top_p=float(sys.argv[5]),
        frequency_penalty=float(sys.argv[6]),
        # presence_penalty=float(sys.argv[7]),
    )
except Exception as ex:
    print(ex)

print(completion.choices[0].message.content)