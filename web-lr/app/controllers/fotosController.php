<?php
    class FotosController
    {
        static function view($fotoInStr = 5)
        {

include "app/models/fotosModel.php";
            $model = new FotosModel($fotoInStr);
            $galery = $model->getContent();
            $countInStr = $fotoInStr;
include "app/views/fotos.php";

        }
    }
?>