<?php

include "db.php";

$sql = "SELECT * FROM students ORDER BY student_name";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fee Planner</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

    <h2>Create Fee Installment Plan</h2>

    <form action="save_fee.php" method="POST">

        <label>Select Student</label>

        <select name="student_id" required>

            <option value="">Select Student</option>

            <?php

            if (mysqli_num_rows($result) > 0) {

                while ($student = mysqli_fetch_assoc($result)) {

                    echo "<option value='" . $student['id'] . "'>";

                    echo htmlspecialchars($student['student_name']);

                    echo " - " . htmlspecialchars($student['roll_number']);

                    echo "</option>";
                }

            }

            ?>

        </select>

        <label>Total College Fee (₹)</label>

        <input type="number"
               id="total_fee"
               name="total_fee"
               placeholder="Enter total fee"
               min="0"
               step="0.01"
               oninput="calculateInstallment()"
               required>

        <label>Already Paid Amount (₹)</label>

        <input type="number"
               id="paid_fee"
               name="paid_fee"
               placeholder="Enter paid amount"
               min="0"
               step="0.01"
               value="0"
               oninput="calculateInstallment()"
               required>

        <label>Number of Installments</label>

        <select id="installments"
                name="installments"
                onchange="calculateInstallment()"
                required>

            <option value="">Select installments</option>
            <option value="1">1 Installment</option>
            <option value="2">2 Installments</option>
            <option value="3">3 Installments</option>
            <option value="4">4 Installments</option>
            <option value="5">5 Installments</option>
            <option value="6">6 Installments</option>

        </select>

        <div class="calculation-box">

            <p>
                Remaining Fee:
                ₹<span id="remaining_display">0.00</span>
            </p>

            <p>
                Installment Amount:
                ₹<span id="installment_display">0.00</span>
            </p>

        </div>

        <button type="submit" class="submit-btn">
            Create Fee Plan
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

<?php
mysqli_close($conn);
?>