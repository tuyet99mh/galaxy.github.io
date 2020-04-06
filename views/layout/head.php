<?php
	
	
	$db=new DB();
	$sql="select * from suppliers";
	if($com = $db->query($sql))
	{}
	else
	echo 'Lỗi: '.$db->error();

?>
<!DOCTYPE html>
<html>
<head>
	<title>WWatch Shop</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="assets/js/detail.js"></script>	
</head>
<body>
<div class='container-fluid'>
	<div id="head" class="">
		<div class="row">
			<!-- <div class="col-sm-2"><a href="index.php"><img src="assets/images/logo.png" alt="smptshop"  width= '100px'></a></div> -->
			<div class="col-sm-12" id ="logo"><a href="index.php" ><img src="assets/images/logo.png" alt="smtpshop" width='200px'></a></div>
			
			<div class="headItem" id='acc' >
			<a href="<?php echo PATH;?>index.php?controller=product&action=viewCart"><span class="glyphicon glyphicon-shopping-cart" style="font-size: 12px">Cart<span class="badge" id="countCart"><?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']); else echo "00"; ?></span></span></a>
				<span class="dropdown" style="padding-left: 10px">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
						Acc
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<li><a href="home1.php?id=login">Đăng Nhập</a></li>
						<li ><a href="home1.php?id=register">Đăng kí</a></li>
						<li ><a href="home1.php?id=profile">Thông tin</a></li>
						<li><a href="home1.php?id=admin">Admin</a></li>
						</ul>
					</button>
				</span>	
			</div>
		</div>
		<div style="clear: both"></div>
		<div class="row">
		<div class="col-sm-12 " id="search">
			<div class="searchItem">
				<input class="col-sm-8" type="text" name="txtSearch" id="txtSearch" placeholder='Tìm sản phẩm'>
				<a href="#" id="link-search" class="col-sm-4"><span class="glyphicon glyphicon-search">Tìm</span></a>	
			</div>
					
			</div>
		</div>
	</div> 
	<!-- end head -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-full" id="menu">
         <!-- Links -->
         <ul class="navbar-nav">
		 <li class="nav-item menuHover">
			   <a class="nav-link"  href="#">Thương Hiệu</a>
				 
			   <div class="sub-menu">
				   <div class="container-fluid">
					   <div class="row"> 
						   
							<div class="col-sm-4">
								<ul > Thương hiệu
									<?php
										foreach ($com as $key => $value) {
											# code...
										
									?>
									<li><a href="<?php echo PATH;?>index.php?controller=product&action=filtCompanyName&id=<?php echo $value["supplierID"];?>"><?php echo $value["companyName"];?> </a></li>
									<?php
										}
									?>
								</ul>
							</div>
							<div class="col-sm-4">
								
							</div>
							
						</div>
					</div>
				</div>
			  
            </li>
            <li class="nav-item">
			   <a class="nav-link"  href="<?php echo PATH;?>index.php?controller=product&action=filtCat&id=CAT01">Đồng hồ nam</a>
				 
			   <div class="sub-menu">
				   <div class="container-fluid">
					   <div class="row">  
							<div class="col-sm-4">
								<ul > dialog 2
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul > dialog 2
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
							</div>
								<ul class="col-sm-4" > dialog3
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
						</div>
					</div>
				</div>
			  
            </li>
            <li class="nav-item">
			   <a class="nav-link" href="<?php echo PATH;?>index.php?controller=product&action=filtCat&id=CAT02">Đồng hồ nữ</a>
			   <div class="sub-menu">
				   <div class="container-fluid">
					   <div class="row">  
							<div class="col-sm-4">
								<ul > dialog 2
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul > dialog 2
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
							</div>
								<ul class="col-sm-4" > dialog3
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
						</div>
					</div>
				</div>
            </li>
            <li class="nav-item menuHover">
			   <a class="nav-link" href="#">Phụ Kiện đồng hồ</a>
			   <div class="sub-menu">
				   <div class="container-fluid">
					   <div class="row">  
							<div class="col-sm-4">
								<ul > dialog 2
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul > dialog 2
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
							</div>
								<ul class="col-sm-4" > dialog3
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
									<li><a href="#">Item</a></li>
								</ul>
						</div>
					</div>
				</div>
            </li>
         </ul>
	</nav>
	<div id="banner" class="row">
		<a href="#" class="col-sm-12"><img id='bannerImg' src="assets/images/banner/banner.jpg" alt="Đồng hồ" width="2340px" height="400px"></a>
	</div>
</div>
<div id="content-main">
		<?= @$content ?>
</div>
<?php
	require_once("views/layout/foot.php");
?>











