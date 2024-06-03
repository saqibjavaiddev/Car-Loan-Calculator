<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = $_POST['price'];
    $term = $_POST['term'];
    $down_payment = $_POST['down_payment'];
    $taxes = $_POST['taxes'];
    $interest_rate = $_POST['interest_rate'];
    $insurance = $_POST['insurance'];
    $hoa = $_POST['hoa'];

    // Loan amount after down payment
    $loan_amount = $price - $down_payment;

    // Monthly interest rate
    $monthly_interest_rate = ($interest_rate / 100) / 12;

    // Number of monthly payments
    $num_payments = $term * 12;

    // Monthly principal and interest payment
    $monthly_payment = $loan_amount * $monthly_interest_rate * pow(1 + $monthly_interest_rate, $num_payments) / (pow(1 + $monthly_interest_rate, $num_payments) - 1);

    // Monthly taxes
    $monthly_taxes = $taxes / 12;

    // Monthly insurance
    $monthly_insurance = $insurance / 12;

    // Total monthly payment
    $total_monthly_payment = $monthly_payment + $monthly_taxes + $monthly_insurance + $hoa;

    echo "<div class='container'><h2>Monthly Payment Calculation</h2>";
    echo "<div class='result'>Monthly Payment: $" . number_format($total_monthly_payment, 2) . "</div></div>";
}
?>
