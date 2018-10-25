<?

include "app/core/formValidation.php";
include "app/core/iAdditionalValidation.php";

    class TestFormValidation extends FormValidation implements IAdditionalValidation
    {
        function additionalValidation($post)
        {
            return true;
        }
        
        function __construct()
        {
            $this->setRule("q1", "/^[1-3]$/");
            $this->setRule("q2", "/^[0-9]+$/");
            $this->setRule("q3", "/^\s*[a-zA-ZА-Яа-я0-1]+[.,:;!?]?\s*(\s-)?\s*(\s[a-zA-ZА-Яа-я0-1]+[.,;:!?]?\s*(\s-)?\s*){2,}$/u");
            $this->setRule("FIO", "/^[a-zA-Zа-яА-Я\s]+$/");
        }
    }
?>