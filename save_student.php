<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_name = $_POST["student_name"];
    $roll_number = $_POST["roll_number"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $email = $_POST["email"];

    $sql = "INSERT INTO students
            (student_name, roll_number, course, year, email)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssis",
        $student_name,
        $roll_number,
        $course,
        $year,
        $email
    );

    if (mysqli_stmt_execute($stmt)) {

        echo "<script>
                alert('Student added successfully!');
                window.location.href='fee_planner.php';
              </script>";

    } else {

        echo "Error: " . mysqli_error($conn);

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>