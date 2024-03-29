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
def recommend_courses(interest):
    return interests_courses_mapping.get(interest, [])

# Function to recommend courses with marks based on student's interest
def recommend_courses_with_marks(interest, course_marks_data):
    recommended_courses = recommend_courses(interest)
    if recommended_courses:
        recommended_courses_with_marks = [(course, course_marks_data.get(course, 0)) for course in recommended_courses]
        recommended_courses_with_marks.sort(key=lambda x: x[1], reverse=True)
        return recommended_courses_with_marks
    else:
        return []

# cm = recommend_courses_with_marks(interest, course_marks_data)

# print("CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC:")
# for ccc in cm:
#     print(ccc)

@app.route('/recommend', methods=['POST'])
def get_recommendations():
    data = request.json
    student_interest = data.get('interest')
    student_mark = 880
    st_options = [  
        data.get('option_1', ''),
        data.get('option_2', ''),
        data.get('option_3', ''),
        data.get('option_4', '')
    ]
    
    course_marks_data = {
        "Physics, Chemistry, Biology, Mathematics": int(data.get('bio', 0)),
        "Physics, Chemistry, Mathematics, Computer Science": int(data.get('cs', 0)),
        "Business Studies, Accountancy, Economics, Computer Application": int(data.get('com', 0)),
        "History, Economics, Political Studies, Social Work": int(data.get('hum', 0))
    }

    recommended_courses_with_marks = recommend_courses_with_marks(student_interest, course_marks_data)
    print("Recommended Courses with Marks:")
    print(recommended_courses_with_marks)

    if recommended_courses_with_marks:
        response = {'courses': recommended_courses_with_marks, 'message': None}
        final_recommended_course = None
        for option in st_options:
            for course, mark in recommended_courses_with_marks:
                if course in option and student_mark >= mark:
                    final_recommended_course = course
                    break
            if final_recommended_course:
                break
        if final_recommended_course:
            response['final_course'] = final_recommended_course
            print("Final recommended course:", final_recommended_course)
        else:
            response['message'] = "Sorry, you haven't scored enough marks for any available course."
    else:
        response = {'message': "Sorry, you haven't scored enough marks for allotment."}

    return jsonify(response)

if __name__ == '__main__':
    app.run(debug=True)
