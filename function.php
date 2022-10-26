<?php
    session_start();

    function userCheck(){
        if ($_SESSION["userCheck"] == 1){
            //echo "user boş değil";

        }
        else{
            header("Location:login.php");
        }
    }

