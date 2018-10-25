<?php
include "app/controllers/fotosController.php";

    function actionFotos()
    {
        
        if (array_key_exists("plus", $_POST))
        {
            if ($_POST["plus"] < 15)
                $_POST["plus"]++;
            FotosController::view($_POST["plus"]);
        }elseif (array_key_exists("minus", $_POST))
        {
            if ($_POST["minus"] > 1)
                $_POST["minus"]--;
            FotosController::view($_POST["minus"]);
        }
    }
?>