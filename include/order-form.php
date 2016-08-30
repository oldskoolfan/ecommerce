<form action="" method="post">
	<fieldset>
		<legend>Order Calculator</legend>
		<label>First Name:
			<input name="firstname" type="text" maxlength="50"
				value="<?php if ($_SESSION['edit'] && isset($_POST['firstname'])) echo $_POST['firstname']?>"
			>
		</label>
		<label>Last Name:
			<input name="lastname" type="text" maxlength="50"
				value="<?php if ($_SESSION['edit'] && isset($_POST['lastname'])) echo $_POST['lastname']?>"
			>
		</label>
		<label>Street Address:
			<input name="address" type="text" maxlength="50"
				value="<?php if ($_SESSION['edit'] && isset($_POST['address'])) echo $_POST['address']?>"
			>
		</label>
		<label>City:
			<input name="city" type="text" maxlength="50"
				value="<?php if ($_SESSION['edit'] && isset($_POST['city'])) echo $_POST['city']?>"
			>
		</label>
		<label>State:
			<input name="state" type="text" maxlength="2"
				value="<?php if ($_SESSION['edit'] && isset($_POST['state'])) echo $_POST['state']?>"
			>
		</label>
		<label>Zipcode:
			<input name="zipcode" type="text" maxlength="5"
				value="<?php if ($_SESSION['edit'] && isset($_POST['zipcode'])) echo $_POST['zipcode']?>"
			>
		</label>
		<input type="hidden" name="orderid"
			value="<?php if ($_SESSION['edit'] && isset($_POST['orderid'])) echo $_POST['orderid']?>">

		<!-- product section -->
		<label>Beer:
			<table>
			<tr>
				<th>Name</th><th>Family</th><th>Price</th><th>Avail</th><th>Quantity</th>
			</tr>

		<?php
			// we re-instantiate this object here so we have updated quantities in stock
			// (in case we are doing a postback for an order)
			$productManager = new ProductManager($con);

			// loop through beer array to create our beer row options
			foreach ($productManager->currentProducts as $beer) {
				if ($beer->isActive) {
					if ($_SESSION['edit'] && isset($_SESSION['editItems'])) {
						$item = OrderHandler::getBeerById($_SESSION['editItems'],
							$beer->id);
						$val = $item ? "value=\"{$item['quantity']}\"" : '';
					}
					else {
						$val = '';
					}
					echo "<tr><td>$beer->name</td><td>$beer->family</td>
						<td>$beer->price</td><td>$beer->inStock</td><td>
						<input name=\"quantity-{$beer->id}\" type=\"text\" $val>
						</td></tr>";
				}
			}
		?>
			</table>
		</label>
		<!-- end product section -->
		<input type="submit" value="Save">
	</fieldset>
</form>
<!-- END form -->
