<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	require_once("template/head.php");
	
?>
<div class="main" id="body">
	<div class="container-fluid ">
		<div class="row ">
			<div class="col-sm-8 banner">
				<a href="#">
					<img src="asset/image/banner/bgr.jpg" alt="" height="100px" width="700px">
				</a>
			</div>

		</div>
		<div class="row">
			<div class="col-sm-3 item">
				<a href="#">
				<img class="img" src="asset/image/BLL1.png" alt="" width="150px" height="150px">
				<div class="name">Items 1</div>
				</a>
			</div>
			<div class="col-sm-3 item">
				<a href="#">
				<img class="img" src="asset/image/BLL1.png" alt="" width="150px" height="150px">
				<div class="name">Items 1</div>
				</a>
			</div>
			<div class="col-sm-3 item">
				<a href="#">
				<img class="img" src="asset/image/BLL1.png" alt="" width="150px" height="150px">
				<div class="name">Items 1</div>
				</a>
			</div>
			<div class="col-sm-3 item">
				<a href="#">
				<img class="img" src="asset/image/BLL1.png" alt="" width="150px" height="150px">
				<div class="name">Items 1</div>
				</a>
			</div>
		</div>
	</div>
	<?php
	if(isset($_GET['id']))
	{
		if($id=="login")
		{
			include("template/login.php");
		}
	}
	?>
</div>

<?php
	include("template/foot.php");
?>