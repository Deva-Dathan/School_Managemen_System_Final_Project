from flask import Flask, request, jsonify
from sklearn.preprocessing import LabelEncoder
from sklearn.tree import DecisionTreeClassifier
import itertools

app = Flask(__name__)

# Define the mapping of interests to recommended courses
interests = ['Engineering', 'Medicine', 'Teaching', 'Business', 'Law', 'Information Technology']
recommendations = {
    'Engineering': ['Physics', 'Chemistry', 'Biology', 'Mathematics'],
    'Medicine': ['Physics', 'Chemistry', 'Biology', 'Mathematics'],
    'Teaching': [['Physics', 'Chemistry', 'Biology', 'Mathematics'], 
                 ['Physics', 'Chemistry', 'Mathematics', 'Computer Science'],
                 ['Business Studies', 'Accountancy', 'Economics', 'Computer Application'],
                 ['History', 'Economics', 'Political Studies', 'Social Work']],
    'Business': [['Business Studies', 'Accountancy', 'Economics', 'Computer Application'],
                 ['History', 'Economics', 'Political Studies', 'Social Work']],
    'Law': ['History', 'Economics', 'Political Studies', 'Social Work'],
    'Information Technology': [['Physics', 'Chemistry', 'Mathematics', 'Computer Science'],
                                ['Business Studies', 'Accountancy', 'Economics', 'Computer Application']]
}

# Prepare the data
X = [[interest] for interest in interests]
y = ['|'.join(list(itertools.chain.from_iterable(rec))) if isinstance(rec[0], list) else ','.join(rec) for rec in recommendations.values()]

# Encoding labels
label_encoder_X = LabelEncoder()
label_encoder_y = LabelEncoder()
X_encoded = label_encoder_X.fit_transform(interests)
y_encoded = label_encoder_y.fit_transform(y)

# Train the decision tree classifier
clf = DecisionTreeClassifier()
clf.fit(X_encoded.reshape(-1, 1), y_encoded)

# Function to recommend courses based on student interest using the trained classifier
def recommend_course_ml(student_interest):
    interest_encoded = label_encoder_X.transform([student_interest])
    predicted_courses_encoded = clf.predict(interest_encoded.reshape(-1, 1))
    predicted_courses = label_encoder_y.inverse_transform(predicted_courses_encoded)
    return predicted_courses[0].split('|') if '|' in predicted_courses[0] else predicted_courses[0].split(',')

@app.route('/recommend_courses', methods=['GET'])
def recommend_courses():
    student_interest = request.args.get('interest')
    recommended_courses = recommend_course_ml(student_interest)
    groups = [recommended_courses[:4], recommended_courses[4:8], recommended_courses[8:12], recommended_courses[12:]]
    non_empty_groups = [group for group in groups if group]
    response = {f"Group {i}": group for i, group in enumerate(non_empty_groups, start=1)}
    return jsonify(response)

if __name__ == '__main__':
    app.run(debug=True)
