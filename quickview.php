<?php
require_once 'classes/Products.php';

if (isset($_GET['product_id']) && isset($_GET['table_name'])) {
    $productID = intval($_GET['product_id']);
     $tableName = htmlspecialchars($_GET['table_name']);
    $productObj = new Products();
    $productDetails = $productObj->quickView($tableName,$productID);
    if ($productDetails) {
        echo json_encode([
            'productName' => $productDetails['product_name'],
            'productPrice' => $productDetails['product_price'],
            'productImage' => $productDetails['productImage_path'],
            'productDescription' => $productDetails['product_description'],
            'productSize' => $productDetails['product_size'],
            'productColor' => $productDetails['product_color'],
            'productBrand' => $productDetails['product_brand']
        ]);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
}
?>
