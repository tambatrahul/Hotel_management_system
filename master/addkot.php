<?php

include 'server/connection.php';
if (isset($_POST['product'])) {
    $user = "admin";
    $discount = $_POST['discount'];
    $total = $_POST['totalvalue'];
    $price = $_POST['price'];
    $product = $_POST['product'];
    $customer = $_POST['customer'];
    $quantity = $_POST['quantity'];
    $reciept = array();

    $query = '';
    $customer_id = mysqli_query($db, "SELECT customer_id FROM customer WHERE firstname LIKE '$customer'");




    if (mysqli_num_rows($customer_id) == 0) {
        echo "failure";
    } else {
        $cust_id 	= mysqli_fetch_array($customer_id);
        $cust_id_new = $cust_id['customer_id'];

        $sql = "INSERT INTO `kot`(`odetails`, `table`, `print`) VALUES('test',$customer,1)";
        $result = mysqli_query($db, $sql);


        if ($result == true) {
            $select = "SELECT `id` FROM `kot` ORDER BY `id` DESC LIMIT 1";
            $res = mysqli_query($db, $select);
            $id = mysqli_fetch_array($res);

            for ($count = 0; $count < count($product); $count++) {
                $price_clean = mysqli_real_escape_string($db, $price[$count]);
                $product_clean = mysqli_real_escape_string($db, $product[$count]);
                $quantity_clean = mysqli_real_escape_string($db, $quantity[$count]);
                if ($product_clean != '' && $quantity_clean != '' && $price_clean != '') {
                    $query .= "
					INSERT INTO `cart`(`name`, `price`,`image`, `quantity`,`user`) VALUES 
		($product_clean,$price_clean,$total,$quantity_clean,$customer);
		";
                }
            }

            for ($count = 0; $count < count($product); $count++) {
                $hid=$id['id'];
                $price_clean = mysqli_real_escape_string($db, $price[$count]);
                $product_clean = mysqli_real_escape_string($db, $product[$count]);
                $quantity_clean = mysqli_real_escape_string($db, $quantity[$count]);
                if ($product_clean != '' && $quantity_clean != '' && $price_clean != '') {
                    $query .= "
					INSERT INTO `print_kot`( `id`, `items`, `quantity`, `user`) VALUES 
            ($hid,$product_clean,$quantity_clean,$customer);
            ";
                }
            }
            $q=mysqli_query($db, "SELECT active FROM user WHERE username LIKE '$customer'");
            $sel_id 	= mysqli_fetch_array($q);
            $sel_new = $sel_id['active'];
            if ($sel_new==0) {
                mysqli_query($db, "update user set active='1' where username='$customer'");
            }
        } else {
            echo "failure";
        }

        if ($query != '') {
            if (mysqli_multi_query($db, $query)) {
                echo "success";
            } else {
                echo "failure";
            }
        } else {
            echo 'failure';
        }
    }
}
