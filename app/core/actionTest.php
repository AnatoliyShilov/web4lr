<?php
include "app/core/resultsVerification.php";
include "app/controllers/testController.php";
include "app/models/testAsksModel.php";

    function validateTest()
    {
        $validator = new ResultsVerification;
        $noValidField = $validator->validate($_POST);
        if ($noValidField == 0)
            TestController::view("Результат теста: ".$validator->checkResults($_POST)." из 3.");
        else
        {
            switch ($noValidField)
            {
                case 1:
                {
                    TestController::view("Незаполнено ФИО.");
                    return false;
                }
                case 2:
                    $noValidField = "первый";
                    break;
                case 3:
                    $noValidField = "второй";
                    break;
                case 4:
                    $noValidField = "третий";
                    break;
            }
            TestController::view("Незаполнен $noValidField вопрос.");
            return false;
        }
        return true;
    }

    function saveTestResult()
    {
        $testModel = new testAsksModel();
        $testModel->connect("root", "root");
        $testModel->name = $_POST["FIO"];
        $testModel->dateTime = date('Y-m-d H:i:s');
        $testModel->q1 = $_POST["q1"];
        $testModel->q2 = $_POST["q2"];
        $testModel->q3 = $_POST["q3"];
        $testModel->q1Right = "2";
        $testModel->q2Right = "14";
        $testModel->q3Right = "это набор элементов, обладающих общим характеристическим свойством";
        echo $_POST["FIO"];
        $testModel->save();
    }
?>