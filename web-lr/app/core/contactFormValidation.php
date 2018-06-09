<?

include "app/core/formValidation.php";
include "app/core/iAdditionalValidation.php";

    class ContactFormValidation extends FormValidation implements IAdditionalValidation
    {
        function additionalValidation($post)
        {
            if (!array_key_exists("bDay", $post) || $post["bDay"] == NULL)
                return false;
            $dates = preg_split("/-/", $post["bDay"]);
            foreach ($dates as $date)
            {
                $date = preg_split("/\//", $date);
                if (checkdate($date[0], $date[1], $date[2]) == false)
                    return false;
            }
            return true;
        }

        function __construct()
        {
            $this->setRule("massage", "/^[a-zA-Zа-яА-я0-9\s]+$/u");
            $this->setRule("FIO", "/^[a-zа-яёA-ZА-Я]+\s+[a-zа-яёA-ZА-Я]+\s+[a-zа-яёA-ZА-Я]+$/u");
            $this->setRule("sex",  "/^[1-2]$/");
            $this->setRule("bDay", "/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}-[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/");
            $this->setRule("age", "/^[0-9]+$/");
            $this->setRule("phone", "/^[+][73]\d{9,11}$/");
            $this->setRule("email", "/^[A-Za-z][0-9A-Za-z]{4,}@[a-z]{3,}.[a-z]{3,}$/");
        }
    }
?>