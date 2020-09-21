<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class User {
	private $users = array();
	public function login(){
		if(isset($_POST['username']) and isset($_POST['password']) ){
				$username = $_POST['username'];
				$pwd = $_POST['password'];
			    $query = 'SELECT * FROM `tbl_users` WHERE `Username` = "'.$username.'" AND `Password` = "'.$pwd.'" ';
				$dbcontroller = new DBController();
		        $this->users = $dbcontroller->executeSelectQuery($query);
		        return $this->users;
		}
	}

	public function signup(){
		if(isset($_POST['username']) and isset($_POST['password']) ){
				$username = $_POST['username'];
				$pwd = $_POST['password'];
			
			$query = "INSERT INTO `tbl_orders` (`Order_ID`, `productIDs`, `Total`) VALUES (NULL, '" . $username ."','". $pwd ."')"; 
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	
	public function deleteAccount(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM tbl_users WHERE ID = '.$id;
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