<?
include "app/core/formValidation.php";
include "app/core/iAdditionalValidation.php";

    class GuestBookFormValidation extends FormValidation implements iAdditionalValidation
    {
        function additionalValidation($post)
        {
            return true;
        }

        function __construct()
        {
            
        }
    }
?>