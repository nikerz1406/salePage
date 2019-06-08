<?php
        if(isset($_REQUEST["page"])){
           setcookie("page", $_REQUEST["page"]);
        }else{
            setcookie("page","%");
        };
?>