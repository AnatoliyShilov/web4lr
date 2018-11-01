<?php

	require "app/core/dispatcher.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (array_key_exists("test", $_POST))
		{
			include "app/core/actionTest.php";
			if (validateTest())
				saveTestResult();
		}
		elseif (array_key_exists("contact", $_POST))
		{
			include "app/core/actionContact.php";
			validateContact();
		}
		elseif (array_key_exists("plus", $_POST) || array_key_exists("minus", $_POST))
		{
			include "app/core/actionFotos.php";
			actionFotos();
		}
		elseif (array_key_exists("guestBook", $_POST))
		{
			include "app/core/actionGuestBook.php";
			actionGuestBook();
		}
		elseif (array_key_exists("blog", $_POST) || array_key_exists("recOnPageBlog", $_POST))
		{
			include "app/core/actionBlog.php";
			actionBlog();
		}
	}
	elseif (array_key_exists("guestBook", $_GET))
	{
		include "app/core/actionGuestBook.php";
		changePageOfGuestBook();
	}
	elseif (array_key_exists("blog", $_GET))
	{
		include "app/core/actionBlog.php";
		changePageOfBlog();
	}
	elseif	(!empty($_GET["route"]))
	{
		Dispatcher::route($_GET["route"]);
	} 
	
?>