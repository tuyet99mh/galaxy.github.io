<?php
if(isset($_GET['action'])){
	echo "<script>
		$('#banner').hide();
	</script>";
	$action= $_GET['action'];
	$title="";
	if($action=='index') $title='Sản phẩm nổi bật';
	if($action=='filtCompanyName'){
		$db=new DB();
		$sql="select * from suppliers where supplierID= '".$_GET['id']."'";
		
		if($sup=$db->query($sql)){} else echo "Lỗi: ".$db->error();
		$title="Hãng đồng hồ ". $sup[0]['companyName'];
		
	 }else if($action=="filtCat")
	 {
		$db=new DB();
		$sql="select * from categories where categoryID= '".$_GET['id']."'";
		
		if($sup=$db->query($sql)){} else echo "Lỗi: ".$db->error();
		$title="". $sup[0]['categoryName'];	 
	 }
}else{
	$title="Sản phẩm nổi bật";
}
?>

<div class="container-fluid">
	<h2 class="title">
	<?php echo $title;?>
	
	
	</h2>
	<div class="row">
		
		<?php
		
		if($data['products']!="Rỗng"){
		$products = $data['products'];
		
		foreach($products as $k => $v){
		?>
			<div class="col-sm-3 item" id="link-item">
				<a  href="<?php echo PATH;?>index.php?controller=product&action=detail&id=<?php echo $v['productID'];?>">
					<div class="item">
						<div class="image">
							<img src="assets/images/products/<?php echo trim($v['thumbnail']);?>" width="150px" height="150px">
						</div>
						<div class="name"><?php echo $v['productName'];?></div>
						<div class="oldprice"><s> <?php echo $v['unitPrice'];?>đ</s></div>
						<div class="price"><?php echo $v['unitPrice']-($v['unitPrice']*$v['discount'])/100;?> <span class="percent" >đ(<?php echo '-'.$v['discount'];?>%)</span></div>
						
					</div>
				</a>
			</div>
		

		<?php
		}
		}else{
			echo "<b class='container-fluid'><i>Không có sản phẩm!</i></b>";
		}
		
		?>
	</div>
</div>