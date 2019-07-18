<?php
        include "includes/link.php";
        include ("modules/admin/productAdmin.php");
        
    ?>
<div id="header"></div>
<div class="container-fluid">
    <div class="row mx-sm-4 my-sm-4">
        <?php
    
  $html = loadProductTable();
  echo $html;

                ?>
    </div>
</div>
<div class="container-fluid bg-light" id="footer"></div>