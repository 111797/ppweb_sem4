<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update stock
    $date = date('Y-m-d');
    for ($i = 1; $i <= 5; $i++) {
        $product_id = $i;
        $incoming = $_POST["in$i"];
        $outgoing = $_POST["out$i"];

        $sql = "INSERT INTO Stock (product_id, date, incoming, outgoing) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isii", $product_id, $date, $incoming, $outgoing);
        $stmt->execute();
    }

    // Update sales
    $outlet_name = $_POST['outlet_name'];
    $employee_name = $_POST['employee_name'];
    $date = date('Y-m-d');

    for ($i = 1; $i <= 5; $i++) {
        $product_id = $i;
        $quantity_sold = $_POST["total$i"];
        $total_amount = $_POST["uang$i"];

        $sql = "INSERT INTO Sales (outlet_name, employee_name, date, product_id, quantity_sold, total_amount) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiii", $outlet_name, $employee_name, $date, $product_id, $quantity_sold, $total_amount);
        $stmt->execute();
    }

    // Update expenses
    $expense_descriptions = ['Bahan Baku', 'Transportasi', 'Listrik'];
    $expense_amounts = [$_POST['expense1'], $_POST['expense2'], $_POST['expense3']];

    for ($i = 0; $i < 3; $i++) {
        $description = $expense_descriptions[$i];
        $amount = $expense_amounts[$i];

        $sql = "INSERT INTO Expenses (date, description, amount) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $date, $description, $amount);
        $stmt->execute();
    }

    // Update financial summary
    $modal = 50000; // Example value
    $total_sales = array_sum($expense_amounts);
    $total_expenses = array_sum($expense_amounts);
    $final_amount = $modal + $total_sales - $total_expenses;

    $sql = "INSERT INTO FinancialSummary (date, modal, total_sales, total_expenses, final_amount) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiii", $date, $modal, $total_sales, $total_expenses, $final_amount);
    $stmt->execute();
}

header("Location: dashboard.php");
?>
