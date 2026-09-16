<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = intval($_POST["student_id"]);

    $total_fee = floatval($_POST["total_fee"]);

    $paid_fee = floatval($_POST["paid_fee"]);

    $installments = intval($_POST["installments"]);

    if ($total_fee <= 0) {
        die("Total fee must be greater than 0.");
    }

    if ($paid_fee < 0 || $paid_fee > $total_fee) {
        die("Paid amount is invalid.");
    }

    if ($installments <= 0) {
        die("Invalid number of installments.");
    }

    $remaining_fee = $total_fee - $paid_fee;

    $installment_amount = $remaining_fee / $installments;

    $sql = "INSERT INTO fee_plans
            (student_id, total_fee, paid_fee, remaining_fee,
             installments, installment_amount)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "idddid",
        $student_id,
        $total_fee,
        $paid_fee,
        $remaining_fee,
        $installments,
        $installment_amount
    );

    if (mysqli_stmt_execute($stmt)) {

        echo "<script>
                alert('Fee installment plan created successfully!');
                window.location.href='dashboard.php';
              </script>";

    } else {

        echo "Error: " . mysqli_error($conn);

    }

    mysqli_stmt_close($stmt);

}

mysqli_close($conn);

?>