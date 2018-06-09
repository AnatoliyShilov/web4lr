<?php
    class MyInterestsController
    {
        static function view()
        {

include "app/models/myInterestsModel.php";

            $model = new MyInterestsModel;
            $lists = $model->getContent();
            $myHobbies = $lists["myHobbies"];
            $books = $lists["books"];
            $musics = $lists["musics"];
            $films = $lists["films"];
            $games = $lists["games"];

include "app/views/myInterests.php";

        }
    }
?>