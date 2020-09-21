<?php
require_once("../controllers/UserRestController.php");
require_once("../controllers/ProductRestController.php");
require_once("../controllers/OrderRestController.php");

$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
	
if(isset($_GET["res"]))
	$res = $_GET["res"];
/*
controls the RESTful services
URL mapping
*/
switch($res){

		case "products":
		    {
				switch($page_key){

		case "list":
			// to handle REST Url /products/list/
	        	$productRestController = new ProductRestController();
		    	$result = $productRestController->getProducts();
			break;
	
		case "create":
			// to handle REST Url /products/create/
				$productRestController = new ProductRestController();
		         $productRestController->addNewProduct();
		break;
		
		case "delete":
			// to handle REST Url /products/delete/<row_id>
		    	$productRestController = new ProductRestController();
		    	$result = $productRestController->deleteProductById();
		break;
		
		case "update":
			// to handle REST Url /products/update/<row_id>
		    	$productRestController = new ProductRestController();
		    	$result = $productRestController->updateProductPriceById();
		break;
}
}
			break;
	
		case "orders":
			    {
				switch($page_key){

		case "list":
			// to handle REST Url /orders/list/
	            $orderRestController = new OrderRestController();
		    	$result = $orderRestController->getOrders();
			break;
	
		case "create":
			// to handle REST Url /orders/create/
		    	$orderRestController = new OrderRestController();
		    	$result = $orderRestController->addNewOrder();
		break;
		
		case "delete":
			// to handle REST Url /orders/delete/<row_id>
				$orderRestController = new OrderRestController();
		    	$result = $orderRestController->deleteProductById();
		break;
		
}
}
		break;
		
		case "users":
		    {
				switch($page_key){

		case "login":
			// to handle REST Url /users/login/
	        	$userRestController = new UserRestController();
		    	$result = $userRestController->getUserLogin();
			break;
	
		case "signup":
			// to handle REST Url /users/signup/
				$userRestController = new UserRestController();
		    	$userRestController->addNewUser();
		break;
		case "delete":
			// to handle REST Url /users/delete/<row_id>
				$userRestController = new UserRestController();
		    	$result = $userRestController->deleteUserById();
		break;
		

}
}
		break;
		

}


?>
