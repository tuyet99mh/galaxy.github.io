

function imgChange(url)
{
    
    var img= document.getElementById("main-image");
    img.src=url;
}
$(document).ready(function(){

    $("#link-search").click(function(){
        
        var link="http://localhost:8080/prj/index.php?controller=product&action=search&id="+document.getElementById("txtSearch").value;
        $("#link-search").attr('href',link);
    });
});

$(function(){
    var arr= ['assets/images/banner/banner.jpg',"assets/images/banner/banner2.jpg","assets/images/banner/banner3.jpg"];
    var $i=0;
    
    setInterval(function(){   
        if($i==3) {$i=0;$('#bannerImg').attr('src',arr[$i]);$i++;}
        else{
        $('#bannerImg').attr('src',arr[$i]);
    
        $i++;
        } 
    },2000);
});
$(function(){
    $("#inpAdd").click(function(){
        alert("Thêm thành công");
    });
});
// $(function(){
//     $(".quantity").change(function(){     
//             $(".new-price").text("Thay đổi");
//     });
// });
