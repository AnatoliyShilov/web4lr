<?php
include "app/controllers/fotosController.php";

    function actionFotos($post)
    {
        
        if (array_key_exists("plus", $post))
        {
            if ($post["plus"] < 15)
                $post["plus"]++;
            FotosController::view($post["plus"]);
        }elseif (array_key_exists("minus", $post))
        {
            if ($post["minus"] > 1)
                $post["minus"]--;
            FotosController::view($post["minus"]);
        }
    }
?>