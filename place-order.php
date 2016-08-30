<?php
	// our html header and class files
	include('include/header.php');
	include('include/db-connect.php');
	include('include/OrderHandler.php');
	include('include/ProductManager.php');

	if (!isset($_SESSION['id']))
		header('Location: login.php');
?>
		<h6>Note: All beers come in 22oz bottles</h6>
		<?= $_SESSION['edit'] ?
			'<br><h2>***Please Edit Your Order and Click Save***</h2>' : ''; ?>
		<?php include 'include/nav.php'; ?>
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') include('include/order-submit.php');?>
		<?php include 'include/order-form.php' ?>
		<?php $_SESSION['edit'] = false ?>
		<!-- BEGIN order confirmation section -->
		<div class="confirm">
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($responseText)) echo $responseText; ?>
		</div>
<?php include('include/footer.html');
