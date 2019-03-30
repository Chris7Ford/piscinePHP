<?php

function create_users_table($conn)
{
	$query = "CREATE TABLE `users` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`login` varchar(35) NOT NULL DEFAULT '',
	`pass_hash` varchar(35) NOT NULL DEFAULT '',
	`is_admin` int(1) NOT NULL DEFAULT '0',
	`date_deleted` date DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	if (mysqli_query($conn, $query)) {
    		echo "Users table created\n";
	}
	else
	{
    	echo "Error creating users table: " . mysqli_error($conn);
	}
}

function create_basket_table($conn)
{
	$query = "CREATE TABLE `basket` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`basket_id` int(11) NOT NULL,
	`product_id` int(11) DEFAULT NULL,
	`active` int(1) DEFAULT NULL,
	`date_ordered` date DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	if (mysqli_query($conn, $query)) {
    		echo "Basket table created\n";
	}
	else
	{
    	echo "Error creating basket table: " . mysqli_error($conn);
	}
}

function create_product_table($conn)
{
	$query = "CREATE TABLE `product` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`description` varchar(500) DEFAULT NULL,
 	`price` decimal(13,2) NOT NULL DEFAULT '0.00',
 	`featured` int(1) unsigned NOT NULL DEFAULT '0',
 	PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	if (mysqli_query($conn, $query)) {
    		echo "Product table created\n";
	}
	else
	{
    	echo "Error creating product table: " . mysqli_error($conn);
	}
}

function create_category_desc_table($conn)
{
	$query = "CREATE TABLE `category_descriptions` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`description` varchar(500) DEFAULT NULL,
 	PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	if (mysqli_query($conn, $query)) {
    		echo "Category Desecriptions table created\n";
	}
	else
	{
    	echo "Error creating category descriptions table: " . mysqli_error($conn);
	}
}

function create_category_prod_table($conn)
{
	$query = "CREATE TABLE `category_products` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`product_id` int(11) NOT NULL,
	`category_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	if (mysqli_query($conn, $query)) {
    		echo "Category Products table created\n";
	}
	else
	{
    	echo "Error creating category products table: " . mysqli_error($conn);
	}
}

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE Rush00";
if (mysqli_query($conn, $sql)) {
	echo "Database created successfully";
	$query = "USE Rush00;";
	if (mysqli_query($conn, $query)) {
    		echo "Users table created\n";
	}
	else
    		echo "Error creating users table: " . mysqli_error($conn);
	create_users_table($conn);
	create_basket_table($conn);
	create_product_table($conn);
	create_category_desc_table($conn);
	create_category_prod_table($conn);
} else {
	echo "Error creating database: " . mysqli_error($conn);
}

// closing connection
mysqli_close($conn);
?>
