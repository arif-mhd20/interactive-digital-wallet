<?php
include 'utility_operations.php';

$from = $to = $amount = "";
$flag = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$from = htmlspecialchars($_POST['from']);
	$to = htmlspecialchars($_POST['to']);
	$amount = htmlspecialchars($_POST['amount']);

    $dbname = "digital-wallet";
    $tableName = "transactions";


	if (empty($from)) {
		$fnameErr = "First name cannot be empty!";
		$flag = true;
	}

	if (empty($to)) {
		$lnameErr = "Last Name cannot be empty!";
		$flag = true;
	}

	if (empty($amount)) {
		$genderErr = "Gender Cant be empty!";
		$flag = true;
	}

	if (!$flag) {
        $sql .= "INSERT INTO " . $tableName . " (from_number, to_number, amount)";
        $sql .= " VALUES (" . "'" . $from .  "'" 
                . ", '" . $to .  "'" 
                . ", '" . $amount .  "'" 
                .")";

        saveToDatabase($dbname, $tableName, $sql);
        header("Location: http://localhost/final/interactive-digital-wallet/views/digital-wallet-2.php");
        exit();

	}
}
?>