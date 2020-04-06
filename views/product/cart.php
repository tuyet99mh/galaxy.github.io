<?php 
   
?>

<script>
    
</script>
<link rel="stylesheet" href="assets/css/cssCart.css">
<div class="container-fluid myCart">
    <div class="row">
        <div class="col-sm-8" id="listItem">
            <h3>Giỏ hàng của tôi</h3>
            <?php
                if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0)
                {
                    echo "<b><i>Không có sản phẩm trong giỏ!</i></b>";
                }
                else{
                    $totalCost=0;
            ?>
            <div class='mainCart ' >
                <?php foreach ($_SESSION['cart'] as $key => $value) {
                    # code...
                    $totalCost+=$value['price']*(1-$value['discount']/100)*$value['quantity'];
                ?>
                <div id='itemCart<?php echo $key;?>' class='row itemCart'>
                    <a href="#" class='col-sm-7'>
                        <img src="assets/images/products/<?php echo trim($value['thumbnail']);?>" alt="<?php echo $id?>" width='110px' height='110px'>
                        <span class="name"><?php echo $value['productName'] ?></span>
                    </a>
                    <input type="number"  name="quantity" value="<?php echo $value['quantity'];?>" min="1" max="100" class='quantity col-sm-1'>
                    <div class='price col-sm-4'>
                        <div class="old-price"><s><?php echo $value['price']; ?>đ</s></div>
                        <div class='new-price'><?php echo $value['price']*(1-$value['discount']/100); ?>đ</div>
                        <div  class='remove'> <button>Xóa</button></div>

                    </div>
                    
                    
                    <div class="col-sm-12 totalCart">
                        <div class="discount">Tiết Kiệm: <?php echo $value['price']*($value['discount']/100)*$value['quantity']; ?>đ</div>
                        <div class="itemCost">Giá sản phẩm: <?php echo $value['price']*(1-$value['discount']/100)*$value['quantity']; ?>đ</div>
                    </div>
                </div>
                <script>
                    $(function (){
                        $("#itemCart<?php echo $key;?> .remove").click(function(){
                           if(confirm("Bạn muốn xóa sản phẩm không")){
                            $.get(
                                "ajax.php",
                                {remove: "<?php echo $key;?>"
                                
                                },
                                function(data){
                                   location.reload();
                                 }
                            );
                              
                           
                           }
                           
                        });
                    });


                    $(document).ready(function(){
                        $("#itemCart<?php echo $key;?> .quantity").change(function(){    
                           var $quantity= $("#itemCart<?php echo $key;?> .quantity").val(); 
                           var $itemId='<?php echo $key;?>';
                            $.get(
                                "ajax.php",
                                {change: "<?php echo $key;?>",
                                    quantity: $quantity
                                },
                                function(data){
                                    
                                   location.reload();
                                 }
                            );
                            
                        });
                    });
                
                </script>
                <?php
                
                }
            
                ?>
                <div id='totalCost'>
                Tổng tiền: <?php echo $totalCost;?>đ
            </div>
            </div>
            
            
        </div>
        <div class="col-sm-4">
            <h4>Thông tin khách hàng</h4>
        </div>

        <?php }?>
    
    </div>
    <?php
      // print_r($_SESSION['cart']);
      
    ?>


</div>
<script>
    $(document).ready(function(){
                        $(".itemCart .quantity").change(function(){
                            var $id=this.attr('id');
                            alert($id);
                            
                           var $quantity= $("#"+$id+" .quantity").val(); 
                           var $itemId=$id;
                            $.get(
                                "ajax.php",
                                {change: $id,
                                    quantity: $quantity
                                },
                                function(data){
                                    alert($id);
                                   location.reload();
                                 }
                            );
                            
                        });
                    });
</script>

