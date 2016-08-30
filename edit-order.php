<!doctype html>
<html>
<head>
	<title>Andrew's Beer Store</title>
	<link rel="stylesheet" href="include/styles.css">
</head>
<body>
	<div id="PageWrapper">
		<h1>Andrew's Online Beer Warehouse</h1>
<?php
	session_start();
	include('include/db-connect.php');
	$result = $con->query("SELECT * FROM orders o JOIN order_items i ON o.order_id =
		i.order_id JOIN users u ON u.user_id = o.user_id
		WHERE o.order_id = {$_GET['id']}");
	if ($result) {
		$_SESSION['editItems'] = [];
		foreach ($result as $row) {
			array_push($_SESSION['editItems'],
				['id' => $row['beer_id'], 'quantity' => $row['quantity']]);

			// set post values for form
			$_POST['firstname'] = $row['firstname'];
			$_POST['lastname'] = $row['lastname'];
			$_POST['address'] = $row['address'];
			$_POST['city'] = $row['city'];
			$_POST['state'] = $row['state'];
			$_POST['zipcode'] = $row['zipcode'];
			$_POST['orderid'] = $_GET['id'];
		}
		include 'include/nav.php';
		if ($_SERVER['REQUEST_METHOD'] != 'POST') $_SESSION['edit'] = true;
		include('include/ProductManager.php');
		include('include/OrderHandler.php');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') include('include/order-submit.php');
		include('include/order-form.php');
		$_SESSION['edit'] = false;
	}
?>
<!-- BEGIN order confirmation section -->
<div class="confirm">
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($responseText)) echo $responseText; ?>
</div>
<?php include('include/footer.html');
