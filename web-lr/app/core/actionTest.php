<?php
include "app/core/resultsVerification.php";
include "app/controllers/testController.php";

    function validateTest($post)
    {
        $validator = new ResultsVerification;
        $noValidField = $validator->validate($post);
        if ($noValidField == 0)
            TestController::view("Результат теста: ".$validator->checkResults($post)." из 3.");
        else
        {
            switch ($noValidField)
            {
                case 1:
                    $noValidField = "первый";
                    break;
                case 2:
                    $noValidField = "второй";
                    break;
                case 3:
                    $noValidField = "третий";
                    break;
            }
            TestController::view("Незаполнен $noValidField вопрос.");
        }
    }
?>