<nav id="main-nav" class="greeting <?= isset($staticNav) && $staticNav ? 'static' : 'absolute'?>">
	<?php if(isset($_SESSION['id'])):?>
		<span>Hi, <?=$_SESSION['username']?>!</span>
	<?php endif;?>
	<a href="./">Home</a>
	<?php if(!isset($_SESSION['id'])):?>
		<a href="login.php">Log In</a>
		<a href="new_user.php">Create Account</a>
	<?php else:?>
		<a href="place-order.php">Place Order</a>
		<a href="orders.php">View My Orders</a>
		<a href="profile.php">My Profile</a>
		<?php if($_SESSION['isAdmin']):?>
			<a href="process-orders.php">Process Orders</a>
			<a href="products.php">Edit Products</a>
		<?php endif;?>
		<a href="logout.php">Log Out</a>
	<?php endif;?>
</nav>
