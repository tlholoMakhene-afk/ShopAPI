<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Product {
	private $products = array();
	public function getAllProducts(){
		if(isset($_GET['name'])){
			$name = $_GET['name'];
			$query = 'SELECT * FROM `tbl_products` WHERE Product_Name LIKE "%' .$name. '%"';
		} else {
			$query = 'SELECT * FROM `tbl_products` ';
		}
		$dbcontroller = new DBController();
		$this->products = $dbcontroller->executeSelectQuery($query);
		return $this->products;
	}

	public function addProduct(){
		if(isset($_POST['name'])){
			$name = $_POST['name'];
				$price = '';
				$sup_name = '';
				$cost ='';
				$category = '';
				$img = '';
				$desc = '';
			if(isset($_POST['price'])){
				$price = $_POST['price'];
			}
			if(isset($_POST['supplier_name'])){
				$sup_name = $_POST['supplier_name'];
			}	
			if(isset($_POST['cost'])){
				$cost = $_POST['cost'];
			}
			if(isset($_POST['category'])){
				$category = $_POST['category'];
			}
			if(isset($_POST['ImagePath'])){
				$img = $_POST['ImagePath'];
			}
			if(isset($_POST['Description'])){
				$desc = $_POST['Description'];
			}

			$query = "insert into tbl_products (Product_ID,Product_Name,Price,Supplier_Name,Cost,Category,ImagePath,Description) values (NULL,'" . $name ."','". $price ."','" . $sup_name ."','" . $cost ."','". $category ."','" . $img ."','" . $desc ."')";
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function deleteProduct(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM tbl_products WHERE Product_ID = '.$id;
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function editProduct(){
		if(isset($_POST['price']) && isset($_GET['id'])){
			$price = $_POST['price'];
			$query = "UPDATE tbl_products SET Price='". $price ."' WHERE Product_ID=".$_GET['id'];
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->executeQuery($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}
	
}
?>