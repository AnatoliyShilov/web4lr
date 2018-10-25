<?php
include "app/core/formValidation.php";

    $validator = new FormValidation;
    $testIndex = 1;
	function test($value, $validVal, $info = NULL)
	{
        global $testIndex;
		$value = ($value == $validVal) ? "ok" : "yesn't";
		echo "$testIndex";
		if ($info != NULL)
			echo " - $info";
		echo " - $value <br>";
        $testIndex++;
	}

	$null = "";
	test($validator->isNotEmpty($null), false);
	test($validator->isNotEmpty($validator), true);
	$int = "1234";
	$noint = "8eiur37484?";
	$float = "123.232";
	test($validator->isInteger($int), true);
	test($validator->isInteger($noint), false);
	test($validator->isInteger($float), false);
	test($validator->isLess($int, 1235), true);
	test($validator->isLess($int, 1233), false);
	test($validator->isLess($float, 123.233), true);
	test($validator->isLess($float, 123.231), false);
    $validator->isLess($noint, 122);
    test($validator->showErrors(), "Получено не число.");
    test($validator->isNotEmpty($validator->showErrors()), false);
	test($validator->isGreater($int, 1235), false);
	test($validator->isGreater($int, 1233), true);
	test($validator->isGreater($float, 123.233), false);
	test($validator->isGreater($float, 123.231), true);
    $validator->isGreater($noint, 122);
    test($validator->showErrors(), "Получено не число.");
    test($validator->isNotEmpty($validator->showErrors()), false);
    $email = "anatolishil@gmail.com";
    $noemail = "keoirfkoei03292";
    test($validator->isEmail($email), true);
	test($validator->isEmail($noemail), false);
	$validator->setRule("int", "/^[0-9]+$/");
	$validator->setRule("float", "/^[0-9]+\.?[0-9]+$/");
	$validator->setRule("email", "/^[A-Za-z][0-9A-Za-z]{4,}@[a-z]{3,}.[a-z]{3,}$/");
	$postValid = 
	[
		"int" => "1234",
		"float" => "123.232",
		"email" => "anatolishil@gmail.com"
	];
	$postNoValid = 
	[
		"int" => "8eiur37484?",
		"float" => "wdef32.23",
		"email" => "keoirfkoei03292"
	];
	test($validator->validate($postValid), true, "Валидатор. Правильные данные");
	test($validator->validate($postNoValid), false, "Валидатор. Неправильные данные");
	echo "ok";
?>