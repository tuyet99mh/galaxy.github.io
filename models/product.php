<?php

class Product
{
	
	public static function getAllProduct(){
		//Bước 1: Kết nối CSDL
		$db = DB::connection();
		//Bước 2: Tạo truy vấn lấy dữ liệu
		$sql = "SELECT * FROM products";
		//Bước 3: Chuẩn bị tiến hành truy vấn
		$stmt = $db->prepare($sql);
		$stmt->execute();
		//Bước 4: Tiếp nhận kết quả trả về
		$records = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$records[] = $row;
		}
		return $records;
	}
	public static function filtCom($comName){
		//Bước 1: Kết nối CSDL
		$db=new DB();
		$sql="select * from products where supplierID= '".$comName."'";
		
			//code...
			if($records = $db->query($sql))
			{}
			else
			echo 'Lỗi: '.$db->error();
			return $records;
		}
	public static function filtCat($catID){
		//Bước 1: Kết nối CSDL
		$db=new DB();
		$sql="select * from products where categoryID= '".$catID."'";
		
			//code...
			if($records = $db->query($sql))
			{}
			else
			echo 'Lỗi: '.$db->error();
			return $records;
		}
		
		public static function search($name){
			//Bước 1: Kết nối CSDL
			$db=new DB();
			$sql="select * from products where productName like '%".$name."%'";
			
				//code...
				if($records = $db->query($sql))
				{}
				else
				echo 'Lỗi: '.$db->error();
				return $records;
		}
		public static function viewCart()
		{
			if(isset($_SESSION['cart']))
			{
				return $_SESSION['cart'];
			}else return array('0'=>'Giỏ hàng Trống');
		}
		//add to cart
		public static function addToCart($id)
		{
			$db=new DB();
			$sql="select * from products where productId = '".$id."'";
			
				//code...
				if(!isset($_SESSION['cart'][$id]))
				{
					if($_SESSION['cart'][$id]=$db->query($sql))
					{echo "<script> alert('Thêm Thành Công'); </script>";
						
						return true;}
					else{
						echo 'Lỗi: '.$db->error();return false;
				}
			}
			
			
		}


	
	


}
?>