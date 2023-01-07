<?php

//add.php
include('server/connection_new_select2.php');


$product_name = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["product_name"]);

$data = array(
    ':product_name'	=>	$product_name
);

$query = "
	SELECT * FROM products 
	WHERE product_name = :product_name
	";

$statement = $connect->prepare($query);

$statement->execute($data);

if ($statement->rowCount() == 0) {
    $query = "
		INSERT INTO products 
		(product_name) 
		VALUES (:product_name)
		";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    echo 'yes';
}
