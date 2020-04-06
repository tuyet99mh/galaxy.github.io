<?php
//Tạo ra một mảng các controller sẽ được khai báo trong website
$controllers = array(
	'product'	=>	['index','detail','filtCompanyName','filtCat','search','viewCart','addToCart'],
	'page'		=>	['error']
);


//Kiểm tra sự tồn tại của controller và action do người dùng gửi yêu cầu
if(!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])){

	$controller = "page";
	$action = "error";
}

//Nhúng file định nghĩa controller
include_once("controllers/". $controller. "_controller.php");

//Tạo tên lớp trong controller tương ứng
$klass = str_replace("_", "", ucwords($controller,"_")). "Controller";

//Khởi tạo đối tượng có kiểu $klass
$controller = new $klass;
//Truy cập tới phương thức $action trong $controller
$controller->$action();
?>












