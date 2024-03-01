from flask import Flask, request, jsonify
from sklearn.linear_model import LinearRegression
from sklearn.metrics import r2_score
import numpy as np

app = Flask(__name__)

# Sample training data and labels
train_data = np.array([[70, 75],
                       [85, 80],
                       [60, 65],
                       [90, 95],
                       [75, 70]])

train_labels = np.array([82, 88, 75, 92, 78])

# Create and train the linear regression model
model = LinearRegression()
model.fit(train_data, train_labels)

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.json
        exam1 = float(data['exam1'])
        exam2 = float(data['exam2'])

        # Make predictions on the new data
        new_data = np.array([[exam1, exam2]])
        predicted_exam3 = model.predict(new_data)[0]

        # Calculate R-squared for the predicted score
        predictions = model.predict(train_data)
        r_squared = r2_score(train_labels, predictions)

        return jsonify({'predicted_exam3': predicted_exam3, 'r_squared': r_squared})
    except Exception as e:
        return jsonify({'error': str(e)})

if __name__ == '__main__':
    app.run(debug=True)
