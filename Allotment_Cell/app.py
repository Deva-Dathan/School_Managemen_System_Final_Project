from flask import Flask, request, jsonify
from sklearn.tree import DecisionTreeClassifier
from sklearn.preprocessing import MultiLabelBinarizer

app = Flask(__name__)

# Define the mapping between interests and courses
interests_courses_mapping = {
    "Engineering": ["Physics, Chemistry, Biology, Mathematics", "Physics, Chemistry, Mathematics, Computer Science"],
    "Medicine": ["Physics, Chemistry, Biology, Mathematics"],
    "Teaching": ["Physics, Chemistry, Biology, Mathematics",
                 "Physics, Chemistry, Mathematics, Computer Science",
                 "Business Studies, Accountancy, Economics, Computer Application",
                 "History, Economics, Political Studies, Social Work"],
    "Business": ["Business Studies, Accountancy, Economics, Computer Application",
                 "History, Economics, Political Studies, Social Work"],
    "Law": ["History, Economics, Political Studies, Social Work"],
    "Information Technology": ["Physics, Chemistry, Mathematics, Computer Science",
                               "Business Studies, Accountancy, Economics, Computer Application"]
}

# Function to recommend courses based on student's interest
def recommend_courses(interest, st_options):
    recommended_courses = interests_courses_mapping.get(interest, [])
    if recommended_courses:
        for option in st_options:
            for course in recommended_courses:
                if course in option:
                    return course
    return "No recommendations available for this interest."

# Convert courses mapping to binary format
mlb = MultiLabelBinarizer()
courses_encoded = mlb.fit_transform(interests_courses_mapping.values())

# Train Decision Tree classifier
clf = DecisionTreeClassifier()
clf.fit(courses_encoded, list(interests_courses_mapping.keys()))

@app.route('/recommend', methods=['POST'])
def get_recommendations():
    data = request.json
    student_interest = data.get('interest')
    st_options = [
        data.get('option_1', ''),
        data.get('option_2', ''),
        data.get('option_3', ''),
        data.get('option_4', '')
    ]
    recommended_course = recommend_courses(student_interest, st_options)
    return jsonify({"recommended_course": recommended_course})

if __name__ == '__main__':
    app.run(debug=True)
