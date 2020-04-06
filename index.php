<?php
session_start();
define("PATH", "http://localhost:8080/prj/");
//Gọi kết nối tới CSDL
require_once("connection.php");

//Xử lý phân tích tham số trên URL
if(isset($_GET['controller'])){
	$controller = $_GET['controller'];
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}else{
		$action = "index";
	}
}else{
	$controller = "product";
	$action = "index";
}

//Hiển thị giá trị của $controller và $action
// echo "Controller đang yêu cầu: ".$controller;
// echo "<br>Action đang yêu cầu: ". $action; 

//Gọi bộ định tuyến 'route.php'
require_once("route.php");
?>



