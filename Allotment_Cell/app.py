from flask import Flask, request, jsonify
from sklearn.tree import DecisionTreeClassifier
import numpy as np

app = Flask(__name__)

# Define courses
courses = {
    1: {'name': 'Physics, Chemistry, Biology, Mathematics', 'interest': ['Engineering']},
    2: {'name': 'Physics, Chemistry, Mathematics, Computer Science', 'interest': ['Engineering']},
    3: {'name': 'Business Studies, Accountancy, Economics, Computer Application', 'interest': ['Business']},
    4: {'name': 'History, Economics, Political Studies, Social Work', 'interest': ['Humanities']}
}

# Define sample data for training the model
X_train = np.array([
    [90, 85, 80, 95],  # Sample 1 marks
    [80, 75, 85, 90],  # Sample 2 marks
    [85, 95, 90, 80],  # Sample 3 marks
    [70, 65, 75, 80]   # Sample 4 marks
])
y_train = np.array(['Engineering', 'Engineering', 'Business', 'Humanities'])  # Corresponding interests

# Train the decision tree classifier
classifier = DecisionTreeClassifier()
classifier.fit(X_train, y_train)

# Define route for recommendation
@app.route('/recommend', methods=['POST'])
def recommend():
    data = request.get_json()
    marks = np.array(data['marks']).reshape(1, -1)  # Reshape marks for prediction
    predicted_interest = classifier.predict(marks)[0]
    
    eligible_courses = [course for course in courses.values() if predicted_interest in course['interest']]
    recommended_course = max(eligible_courses, key=lambda x: sum([marks[0][i] for i in range(len(x['name'].split(', ')))]))
    
    return jsonify({'recommended_course': recommended_course['name']})

if __name__ == '__main__':
    app.run(debug=True)
