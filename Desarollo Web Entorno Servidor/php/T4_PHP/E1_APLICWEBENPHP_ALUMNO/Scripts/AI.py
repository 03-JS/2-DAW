from huggingface_hub import InferenceClient
import sys

client = InferenceClient(api_key="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")

prompt_template = """You are a helpful assistant.
Here is the user's input:
{user_input}
Please respond accordingly and in the language used by the user.
"""

user_input = sys.argv[2]
user_input = "Escribe un programa para decir hola mundo en php"

formatted_prompt = prompt_template.format(user_input=user_input)

messages = [
    {
        "role": "user",
        "content": formatted_prompt
    }
]

completion = client.chat.completions.create(
    model=sys.argv[1],
    messages=messages,
    max_tokens=500
)

print(completion.choices[0].message.content)
