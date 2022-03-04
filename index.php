<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

</head>

<body>
	<?php
	include_once(dirname(__FILE__) . '/navbar/navbar.php');
	?>
	<?php
	include_once(dirname(__FILE__) . '/main-picture/main-pic.php');
	?>
	<?php
	include_once(dirname(__FILE__) . '/three-steps/Page-11.php');
	?>
	<?php
	include_once(dirname(__FILE__) . '/what-to-do/what-to-do.php');
	?>
	<?php
	include_once(dirname(__FILE__) . '/latest-news/latest-news.php');
	?>
	<?php
	include_once(dirname(__FILE__) . '/footer/footer.php');
	?>

</body>

</html>

<script>
	const queryString = window.location.search;
	console.log(queryString);
	if (queryString === "?error=submitted") {
		alert("Η αίτηση σας υποβλήθηκε επιτυχώς");
		window.location.replace("/DOATAP/Pages/MyApplications.php");
	}
</script>