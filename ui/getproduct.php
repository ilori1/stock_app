<?php

include_once 'connectdb.php';

$productid = isset($_GET["id"])? intval($_GET["id"]) : null;
$barcode = isset($_GET["id"])? intval($_GET["id"]) : null;

if (!$productid &&!$barcode) {
    http_response_code(400);
    echo json_encode(["error" => "Missing required parameters"]);
    exit();
}

$select = $pdo->prepare("SELECT * FROM tbl_product WHERE pid = :pid OR barcode = :barcode");
$select->bindParam(":pid", $productid);
$select->bindParam(":barcode", $barcode);
$select->execute();

$row = $select->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    http_response_code(404);
    echo json_encode(["error" => "Product not found"]);
    exit();
}

$response = $row;

header('Content-Type: application/json');

echo json_encode($response);

?>