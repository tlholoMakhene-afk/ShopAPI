<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Order {
	private $orders = array();
	public function getAllOrders(){
			    $query = 'SELECT * FROM `tbl_orders` ';
				$dbcontroller = new DBController();
		        $this->orders = $dbcontroller->executeSelectQuery($query);
		        return $this->orders;
	}

	public function saveOrder(){
		if(isset($_POST['total'],$_POST['items'])){
				$total = $_POST['total'];
				$productsOrdered = $_POST['items'];
				
			$query = "insert into tbl_orders (Products_In_Order, Total) values ('" . $productsOrdered ."','". $total ."')"; 
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	
	public function deleteOrder(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM tbl_orders WHERE Order_ID = '.$id;
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	

	
}
?>