import random
from flask import Flask, jsonify
import os

# Create a Flask app
app = Flask(__name__)

# Step 1: Load the dataset from the file
def load_dataset():
    with open('dataset.txt', 'r') as file:
        dataset = file.readlines()
    return dataset

# Step 2: Analyze the dataset (in this case, randomly select an achievement)
def analyze_and_generate(dataset):
    # For simplicity, we randomly select an achievement text
    selected_text = random.choice(dataset)
    return selected_text

# Step 3: Define an API route to get the generated text
@app.route('/generate_text', methods=['GET'])
def generate_text():
    dataset = load_dataset()
    generated_text = analyze_and_generate(dataset)
    return jsonify({"generated_text": generated_text})

if __name__ == '__main__':
    # Run the Flask app
    app.run(debug=True, host='0.0.0.0', port=5000)
