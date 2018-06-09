<?php
    class Dispatcher
    {
        static function route($addr)
        {
            switch ($addr)
            {
                case "aboutMe":

include "app/controllers/aboutMeController.php";

                    AboutMeController::view();
                    break;
                case "contact":

include "app/controllers/contactController.php";

                    ContactController::view();
                    break;
                case "fotos":

include "app/controllers/fotosController.php";

                    FotosController::view();
                    break;
                case "main":

include "app/controllers/mainController.php";

                    MainController::view();
                    break;
                case "myInterests":

include "app/controllers/myInterestsController.php";

                    MyInterestsController::view();
                    break;
                case "story":

include "app/controllers/storyController.php";

                    StoryController::view();
                    break;
                case "study":

include "app/controllers/studyController.php";

                    StudyController::view();
                    break;
                case "test":

include "app/controllers/testController.php";

                    TestController::view();
                    break;
                default:

include "app/controllers/errorController.php";

                    ErrorController::view("lnk err", "not found. lnk=".$str);
            }
        }
    }
?>