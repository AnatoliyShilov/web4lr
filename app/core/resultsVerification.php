<?php

include "app/core/testFormValidation.php";

    class ResultsVerification extends TestFormValidation
    {
        function checkResults($post)
        {
            $right = 3;
            if (!array_key_exists("q1", $post) || $post["q1"] != "2")
                $right--;
            if (!array_key_exists("q2", $post) || $post["q2"] != "14")
                $right--;
            if (!array_key_exists("q3", $post) || $post["q3"] != "это набор элементов, обладающих общим характеристическим свойством")
                $right--;
            return $right;
        }
    }
?>