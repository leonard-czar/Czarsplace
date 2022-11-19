<?php
include_once "myportalhead.php";?>

<div class="container-fluid-sm ">

    <div class="row  text-center" style="font-family: czars2;">

        <div class='col-sm mt-1 p-3 alert alert-success' >Item Added To Cart Successfully! </div>
    </div>
    <div class=' row m-5 text-center justify-content-center' style="display:grid ;font-family: czars2;">
        <div class="col">
            <div ><span class='m-2' ><a href='dashboard.php' style='color:blue;text-decoration:underline'>Continue shopping</a></span></div>

        </div>
        <div class="col">
           <div><span class='m-2' ><a href='cart.php' style='color:blue;text-decoration:underline'>View cart</a></span></div> 

        </div>
    </div>
</div>


<?php
include_once "myportalfoot.php";
?>