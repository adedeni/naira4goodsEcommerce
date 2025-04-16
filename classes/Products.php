<?php
require_once 'Dbh.php';
class Products extends Dbh{
  public function __construct( )
  {
    // $this->product_name = $product_name;
    // $this->product_price = $product_price;
    // $this->product_description = $product_description;
    // $this->productImage_path = $productImage_path;
    // $this->product_size  = $product_size;
    // $this->product_color = $product_color;
    // $this->product_brand = $product_brand;
  }
  //logic for getting all product details in associative array, couppled with with pagination logic.
  public function getProductDetails($tableName,$limit, $offset){
        $query =" SELECT id, product_name, product_price, product_description, productImage_path, product_size, product_quantity,product_color, product_brand 
                  FROM {$tableName} 
                  ORDER BY RAND() 
                  LIMIT ? OFFSET ?;";
        $stmt=$this->connect()->prepare($query);
        $stmt->bindParam( 1, $limit,PDO::PARAM_INT );
        $stmt->bindParam(2, $offset,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
         }
        //  //counting and getting the total number of product in my db with tabel products
        //  public function countGetTotalProducts(){
        //     $query = " SELECT COUNT(*) as total FROM products;";
        //     $stmt = $this->connect()->prepare($query);
        //     $stmt->execute();
        //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //     return $result['total'];
        //  }

        public function quickView($tableName,$productID){
          $query = "SELECT * FROM {$tableName} WHERE id = :productID";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":productID",$productID, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           return $result;
          
          // if (isset($_GET['product_id'])) {
          //   $productID = $_GET['product_id'];
          //   $query = "SELECT * FROM products WHERE id = :productID";
          //   $stmt = $this->connect()->prepare($query);
          //   $stmt->bindParam(":productID",$productID, PDO::PARAM_INT);
          //   $stmt->execute();
          //   $result = $stmt->fetch(PDO::FETCH_ASSOC);
          //  return $result;
          // }

        }
}