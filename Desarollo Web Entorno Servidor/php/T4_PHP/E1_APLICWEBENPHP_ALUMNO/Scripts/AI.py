from huggingface_hub import InferenceClient
import sys

client = InferenceClient(api_key="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")

# prompt_template = """You are a helpful assistant.
# Here is the user's input:
# {user_input}
# Please respond accordingly and in the language used by the user.
# Do not include the user's input in your response.
# """

user_input = sys.argv[2]
# user_input = "Que es ChatGPT?"

# formatted_prompt = prompt_template.format(user_input=user_input)

messages = [
    {
        "role": "user",
        # "content": formatted_prompt,
        "content": user_input
    }
]

completion = client.chat.completions.create(
    model=sys.argv[1],
    # model="NousResearch/Hermes-3-Llama-3.2-3B",
    max_tokens=2048,
    temperature=1,
    top_p=1,
    frequency_penalty=0,
    presence_penalty=0
)

print(completion.choices[0].message.content)