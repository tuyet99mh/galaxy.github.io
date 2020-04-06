<?php 
session_start();
    if(isset($_REQUEST['change'])&&isset($_REQUEST['quantity'])){

     $itemId=$_REQUEST['change'];$quan=$_REQUEST['quantity'];
     $_SESSION['cart'][$itemId]['quantity']=$quan;
    }
    if(isset($_REQUEST['remove']))
    {
        unset($_SESSION['cart'][$_REQUEST['remove']]);
    }
    $giamgia=$_SESSION['cart'][$itemId]['price']*($_SESSION['cart'][$itemId]['discount']/100)*$_SESSION['cart'][$itemId]['quantity'];
?>


