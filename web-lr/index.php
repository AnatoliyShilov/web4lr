<?php

require "app/core/dispatcher.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (array_key_exists("test", $_POST))
		{
include "app/core/actionTest.php";

			validateTest($_POST);
		}
		elseif (array_key_exists("contact", $_POST))
		{
include "app/core/actionContact.php";

			validateContact($_POST);
		}elseif (array_key_exists("plus", $_POST) || array_key_exists("minus", $_POST))
		{
include "app/core/actionFotos.php";

			actionFotos($_POST);
		}
	}
	elseif (!empty($_GET["route"]))
	{
		Dispatcher::route($_GET["route"]);
	}
	
?>