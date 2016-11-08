# CSCI 2412 - Ecommerce example

This is a basic example of how you can implement an ecommerce site with the following functionality:

* Product inventory management system
* User shopping cart
* Order history (basic user) and processing (admin)

## Setup Instructions

1. Clone or download the project to your htdocs directory
2. Make sure Apache and MySQL servers are running
3. Copy config.ini.example to config.ini
4. Create a folder called `etc` somewhere on your file system
5. In config.ini, set `etc_directory` equal to the full path to the directory you created in step 4
6. In `etc`, create a file called `db-connect.php` with the following code:
	```
	<?php

	$con = new mysqli('localhost', 'root', '');
	```
7. Run the beerstoredb_dump.sql file in Workbench
8. Go to the project index page in your browser
9. You can log in as andrew/1234 (admin) or bob/1234 (basic user)
