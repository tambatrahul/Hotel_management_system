<?php

    include('server/connection.php');

    if (isset($_POST['products'])) {
        $name = mysqli_real_escape_string($db, $_POST['products']);
        $show 	= "SELECT * FROM products WHERE product_name LIKE '$name%'  OR product_no LIKE '$name%' ";
        $query 	= mysqli_query($db, $show);
        if (mysqli_num_rows($query)>0) {
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr class='js-add' data-barcode=".$row['product_no']." data-product=".$row['product_name']." data-price=".$row['sell_price']." ><td>".$row['product_no']."</td>
                <td>".$row['product_name']."</td>";
                echo "<td>Rs.".$row['sell_price']."</td>";
            }
        } else {
            echo "<td></td><td>No Products found!</td><td></td>";
        }
    }
