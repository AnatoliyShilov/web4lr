<?

include "app/models/guestBookModel.php";
include "app/core/pagesView.php";

    class BlogController
    {
        static function view($errorsArray = NULL)
        {
            $onPage = 5;
            $info = "";

include "app/views/blog.php";
        }
    }

?>