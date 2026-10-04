<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-container">

    <h2>Add Student</h2>

    <form action="save_student.php" method="POST" onsubmit="return validateStudentForm()">

        <label>Student Name</label>
        <input type="text" id="student_name" name="student_name"
               placeholder="Enter student name" required>

        <label>Roll Number</label>
        <input type="text" id="roll_number" name="roll_number"
               placeholder="Enter roll number" required>

        <label>Course</label>
        <select name="course" required>

            <option value="">Select Course</option>
            <option value="BCA">BCA</option>
            <option value="BSc Computer Science">BSc Computer Science</option>
            <option value="BCom">BCom</option>
            <option value="BA">BA</option>
            <option value="BBA">BBA</option>
            <option value="BE">BE</option>
            <option value="BTech">BTech</option>

        </select>

        <label>Year</label>
        <select name="year" required>

            <option value="">Select Year</option>
            <option value="1">1st Year</option>
            <option value="2">2nd Year</option>
            <option value="3">3rd Year</option>
            <option value="4">4th Year</option>

        </select>

        <label>Email</label>
        <input type="email" name="email"
               placeholder="Enter email address">

        <button type="submit" class="submit-btn">
            Save Student
        </button>

    </form>

    <br>

    <a href="index.php" class="back-btn">
        ← Back to Home
    </a>

</div>

<script src="script.js"></script>

</body>
</html>