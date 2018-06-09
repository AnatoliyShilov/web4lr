<?
    class FormValidation
    {
        private $rules;
        private $errors;

        function isNotEmpty($data)
        {
            return !empty($data);
        }

        function isInteger($data)
        {
            $regexp = "/^[0-9]+$/";
            if (preg_match($regexp, $data) == 1)
                return true;
            else
                return false;
        }

        function isLess($data, $value)
        {
            $regexp = "/^[0-9]+\.?[0-9]+$/";
            if (preg_match($regexp, $data) == 1)
            {
                $data = 1 * $data;
                if ($data < $value)
                    return true;
                else
                    return false;
            }
            else
            {
                $this->errors = "Получено не число.";
                return;
            }
        }

        function isGreater($data, $value)
        {
            $regexp = "/^[0-9]+\.?[0-9]+$/";
            if (preg_match($regexp, $data) == 1)
            {
                $data = 1 * $data;
                if ($data > $value)
                    return true;
                else
                    return false;
            }
            else
            {
                $this->errors = "Получено не число.";
                return;
            }
        }

        function isEmail($data)
        {
            $regexp = "/^[A-Za-z][0-9A-Za-z]{4,}@[a-z]{3,}.[a-z]{3,}$/";
            if (preg_match($regexp, $data) == 1)
                return true;
            else
                return false;
        }

        function setRule($fieldName, $validator)
        {
            $this->rules[$fieldName] = $validator;
        }

        function validate($post)
        {
            $i = 1;
            foreach ($post as $field => $value)
            {
                if (array_key_exists($field, $this->rules) && !empty($value) && preg_match($this->rules[$field], $value) != 1 || 
                    array_key_exists($field, $this->rules) && empty($value))
                    return $i;
                $i++;
            }
            return 0;
        }

        function showErrors()
        {
            $info = $this->errors;
            $this->errors = "";
            return $info;
        }
    }
?>