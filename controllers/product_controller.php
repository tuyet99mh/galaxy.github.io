<?php
require_once("controllers/base_controller.php");
require_once("models/product.php");

class ProductController extends BaseController{
	public function __construct(){
		//Khai báo thư mục chứa các view của Product
		$this->folder = "product";
	}

	//Tạo action đã đăng ký trong 'route'
	public function index(){
		//Lấy dữ liệu từ Model
		$arrPro = Product::getAllProduct();
		if(!empty($arrPro)){
		$data = array('products'=>$arrPro);
		}else{
			$data = array('products'=>"Không có sản phẩm");
		}
		//Đổ dữ liệu, biểu diễn ra view tương ứng
		$this->render("home",$data);
	}
	public function detail(){
		//Kiểm tra sự tồn tại của mã sản phẩm
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		if(!empty($id)){
			//Lấy dữ liệu của sản phẩm theo mã sản phẩm;
			
			$data = array('item'=>'thông tin chi tiết sản phâm');
			//Đưa dữ liệu ra view chi tiet de hien thi
			$this->render("detail", $data);
		}else{
			header("location:".PATH."?controller=page&action=error");
		}
	}
	public function filtCompanyName(){
		
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		if(!empty($id)){
			
			$items= Product::filtCom($id);
			$data = array('products'=>$items);
			//Đưa dữ liệu ra view chi tiet de hien thi
			$this->render("home", $data);
		}else{
			header("location:".PATH."?controller=page&action=error");
		}
	}
	public function filtCat()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		if(!empty($id)){
		
			$items= Product::filtCat($id);
			$data = array('products'=>$items);
			//Đưa dữ liệu ra view chi tiet de hien thi
			$this->render("home", $data);
		}else{
			header("location:".PATH."index?controller=page&action=error");
		}
	}
	public function search()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		if(!empty($id)){
			
			$items= Product::search($id);
			$data = array('products'=>$items);
			//Đưa dữ liệu ra view chi tiet de hien thi
			$this->render("home", $data);
		}else{
			header("location:".PATH."index?controller=page&action=error");
		}
	}
	// View Cart
	public function viewCart()
	{
		$items=Product::viewCart();
		$data=array('cart'=>$items);
		$this->render("cart",$data);
	}
	public function addToCart()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		if(!empty($id)){
			
			//$items=Product::addToCart($id);
			$data=array('cart','Thêm thành công');
			
			$this->render('detail',$data);
		}else{
			header("location:".PATH."index?controller=page&action=error");
		}
	}
}
?>









