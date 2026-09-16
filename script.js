function validateStudentForm() {

    let name = document.getElementById("student_name").value.trim();

    let roll = document.getElementById("roll_number").value.trim();

    if (name === "") {
        alert("Please enter student name.");
        return false;
    }

    if (roll === "") {
        alert("Please enter roll number.");
        return false;
    }

    return true;
}


function calculateInstallment() {

    let totalFee =
        parseFloat(document.getElementById("total_fee").value) || 0;

    let paidFee =
        parseFloat(document.getElementById("paid_fee").value) || 0;

    let numberOfInstallments =
        parseInt(document.getElementById("installments").value) || 0;


    let remainingFee = totalFee - paidFee;


    if (remainingFee < 0) {
        remainingFee = 0;
    }


    let installmentAmount = 0;


    if (numberOfInstallments > 0) {

        installmentAmount =
            remainingFee / numberOfInstallments;

    }


    document.getElementById("remaining_display").innerText =
        remainingFee.toFixed(2);


    document.getElementById("installment_display").innerText =
        installmentAmount.toFixed(2);
}