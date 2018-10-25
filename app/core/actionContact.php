<?php
include "app/core/contactFormValidation.php";
include "app/controllers/contactController.php";

    function validateContact()
    {
        $validator = new ContactFormValidation;
        $noValidField = $validator->validate($_POST);
        if ($noValidField == 0 && 
            $validator->additionalValidation($_POST) == true)
            ContactController::view("Данные отправлены.");
        else
        {
            switch ($noValidField)
            {
                case 1:
                    $noValidField = "сообщение";
                    break;
                case 2:
                    $noValidField = "ФИО";
                    break;
                case 3:
                    $noValidField = "пол";
                    break;
                case 4:
                    $noValidField = "год рождения";
                    break;
                case 7:
                    $noValidField = "возраст";
                    break;
                case 8:
                    $noValidField = "телефон";
                    break;
                case 9:
                    $noValidField = "email";
                    break;
            }
            ContactController::view("Проверьте заполнение поля: $noValidField.");
        }
    }
?>