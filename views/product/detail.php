<?php
	$id=$_GET['id'];
	//include("database.php");
	$db=new DB();
	$sql="select * from products where productID = '".$id."'";
	if($pr = $db->query($sql))
	{}
	else
	echo 'Lỗi: '.$db->error();

	$sql="select categoryName from products join categories on products.categoryID=categories.categoryID where productID = '".$id."'";
	if($catName = $db->query($sql))
	{}
	else
	echo 'Lỗi: '.$db->error();
	$sql="select * from products where categoryID like '%".$pr[0]['categoryID']."%'";
	if($pr2 = $db->query($sql))
	{}
	else
	echo 'Lỗi: '.$db->error();
	echo "<script>
		$('#banner').hide();
	</script>";
	
	if(isset($_GET['action']) && $_GET['action']=="addToCart"){ 
        $id=$_GET['id']; 
        if(isset($_SESSION['cart'][$id])){ 
			$_SESSION['cart'][$id]['quantity']++;
			//echo "<script> alert('Thêm Thành Công'); </script>";
		}
		else
		{      
            $sql= "select * FROM products WHERE productID='".$id."'"; 
			//Sản phẩm đc thêm
			if($prAdd = $db->query($sql))
			{}
			else
			echo 'Lỗi: '.$db->error();         
            $_SESSION['cart'][$id]=array( 
                "quantity" => 1,"productName"=>$prAdd[0]['productName'],
                "price" => $prAdd[0]['unitPrice'],"discount"=>$prAdd[0]['discount'],"thumbnail"=>trim($prAdd[0]['thumbnail'])
			);
			//echo "<script> alert('Thêm Thành Công'); </script>";             
               
        }         
    } 
  

?>
<div class="container-fluid">

		<div id="order">
			<h2 class="title">Thông tin chi tiết sản phẩm</h2>
			<div id="navigator"><a href="index.php">Trang chủ</a>><a href="<?php echo PATH;?>index.php?controller=product&action=filtCat&id=<?php echo $pr[0]['categoryID'];?>"><?php echo $catName[0][0];?></a>><a href="#"> <?php echo $pr[0]['productName'];?></a></div>

			<div id="detail">
				
				<div class="row">
					<div id="detail-left" class="col-sm-4">
						<div id="thumb-img" >
							<img id="main-image" src="assets/images/products/<?php echo trim($pr[0]['thumbnail']);?>" width="100%">
						</div>
						<div id="detail-left-thum">
							<?php
							$imgs = explode(";", $pr[0]['image']);
							for($i=0; $i<count($imgs); $i++){
							?>

							<button class="sub-image" onclick="imgChange('assets/images/products/<?php echo trim($imgs[$i]);?>');"><img src="assets/images/products/<?php echo trim($imgs[$i]);?> " id="sub-img<?php $i?>" width="100px" height="100px" ></button> 

							<?php
							}
							?>
						</div>
						
					</div>
					<div id="detail-right" class="col-sm-8">
						<div id="description">
						<h3><?php echo $pr[0]['productName'];?></h3> <br>
							<h4>Mô tả chi tiết</h4>
							<div id="description-content">
								<?php echo $pr[0]['description'];?>
							</div>
						</div>
						<div class="PRprice">
							<div id="detail-price">Khuyến mãi: <?php echo $pr[0]['unitPrice']-($pr[0]['unitPrice']*$pr[0]['discount'])/100;?> đ <i style="color: red; font-size: 24px;"> (-<?php echo $pr[0]['discount'];?>%) </i></div>
							
							<div id="detail-old-price">Giá hãng: <s id="old-price"><?php echo $pr[0]['unitPrice'];?> đ</s></div>
						</div>
						<div class="buy">
							<a href="index.php">
								<input type="button" name="btnBuy" value="MUA NGAY" id="inpBuy" style="background-color: rgb(0, 255, 34);">
							</a>
							<a href="<?php echo PATH;?>index.php?controller=product&action=addToCart&id=<?php echo $pr[0]['productID'];?>">
								<input type="button" name="btnAddCart" value="THÊM VÀO GIỎ" style="background-color: #3498db;"  id="inpAdd">
							</a>
						</div>
					</div>
				</div>
			</div>

			<div style="clear:both;"></div>
			
		</div>
	<div class="contain">
		<div class="title">
		<?php 
			
		?>
			Có thể bạn quan tâm
			
		</div>
		<div class="row">
			<?php
			for ($i=0 ; $i<=3;$i++) {
				# code...
				if(isset($pr2[$i])){
			
			
			?>
				<div class="col-sm-3 item" id="link-item">
				<a  href="<?php echo PATH;?>index.php?controller=product&action=detail&id=<?php echo $pr2[$i]['productID'];?>">
					<div class="item">
						<div class="image">
							<img src="assets/images/products/<?php echo trim($pr2[$i]['thumbnail']);?>" width="150px" height="150px">
						</div>
						<div class="name"><?php echo $pr2[$i]['productName'];?></div>
						<div class="oldprice"><s> <?php echo $pr2[$i]['unitPrice'];?>đ</s></div>
						<div class="price"><?php echo $pr2[$i]['unitPrice']-($pr2[$i]['unitPrice']*$pr2[$i]['discount'])/100;?> <span class="percent" style="color: red">(<?php echo '-'.$pr2[$i]['discount'];?>%)</span></div>
						
					</div>
				</a>
				</div>
			

			<?php
			}}
			?>
		</div>


		<div style="clear:both;"></div>
	</div>
</div>