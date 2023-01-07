<?php

    include('server/connection.php');
    $sql = "SELECT product_no, product_name, sell_price FROM products";
    $result = mysqli_query($db, $sql);
    $results = (object)[];
    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = ['id'=>$row['product_no'],'text'=>$row['product_name']];
    }
    // $data = new stdClass();
    // $data->results = $results;

    echo json_encode($results);
