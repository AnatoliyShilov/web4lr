<?

include "app/controllers/guestBookController.php";

    function chengePageOfGuestBook()
    {
        $errorsArray =
        [
            'emailError' => "",
            'FIOError' => "",
            'messageError' => ""
        ];
        GuestBookController::view($errorsArray);
    }

    function actionGuestBook()
    {

include "app/core/guestBookFormValidation.php";

        $formValidator = new FormValidation;
        $error = false;
        $errorsArray =
        [
            'emailError' => "",
            'FIOError' => "",
            'messageError' => ""
        ];
        $gb = new GuestBookModel();
        $gb->dateTime = date('Y-m-d H:i:s');
        $file = fopen("messages.ini", "a");
        if ($_POST['FIO'] != "") // todo вилидация
            $gb->name = $_POST['FIO'];
        else
        {
            $error = true;
            $errorsArray['FIOError'] = "ФИО указано не верно.";
        }
        if ($formValidator->isEmail($_POST['email']))
            $gb->email = $_POST['email'];
        else
        {
            $error = true;
            $errorsArray['emailError'] = "Адрес электронной почты указан не верно.";
        }
        if ($_POST['message'] != "") // todo вилидация

            $gb->message = $_POST['message'];
        else
        {
            $error = true;
            $errorsArray['messageError'] = "Сообщение введено не верно.";
        }
        if (!$error)
            fwrite($file, $gb->toString());
        unset($_POST);
        GuestBookController::view($errorsArray);
    }

?>