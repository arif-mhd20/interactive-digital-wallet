<?php
include 'utility_operations.php';

$dbName = "digital-wallet";
$tableName = "transactions";


$result = getFromDatabase($dbName, $tableName);

//debugPrint($result);
array_walk($result, 'test_print');

?>