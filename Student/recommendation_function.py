from flask import Flask, request, jsonify

app = Flask(__name__)

# Dictionary mapping subjects to related courses
subject_courses = {
    'English': ['English Course A', 'English Course B'],
    'Hindi': ['Hindi Course A', 'Hindi Course B'],
    'Social Science': ['Social Science Course A', 'Social Science Course B'],
    'Mathematics': ['Mathematics Course A', 'Mathematics Course B'],
    'Malayalam - I': ['Malayalam - I Course A', 'Malayalam - I Course B'],
    'Malayalam - II': ['Malayalam - II Course A', 'Malayalam - II Course B'],
    'Biology': ['Biology Course A', 'Biology Course B'],
    'Physics': ['Physics Course A', 'Physics Course B'],
    'Chemistry': ['Chemistry Course A', 'Chemistry Course B'],
    'Information Technology': ['IT Course A', 'IT Course B']
}

# Endpoint to receive scores and return recommended courses
@app.route('/recommend_courses', methods=['POST'])
def recommend_courses():
    # Extract scores from request
    scores = request.json['scores']
    
    # Perform machine learning to recommend courses based on scores
    recommended_courses = perform_machine_learning(scores)
    
    return jsonify({'courses': recommended_courses})

# Machine learning function
def perform_machine_learning(scores):
    # List to store recommended courses
    recommended_courses = []

    # Check scores for each subject
    for subject, score in scores.items():
        # Convert score to integer
        score = int(score)
        if score < 5:
            # If score is below 5, recommend 2 courses for that subject
            recommended_courses.extend(subject_courses.get(subject, [])[:2])
        elif score < 7:
            # If score is below 7, recommend 1 course for that subject
            recommended_courses.extend(subject_courses.get(subject, [])[:1])

    return recommended_courses

if __name__ == '__main__':
    app.run(debug=True)
