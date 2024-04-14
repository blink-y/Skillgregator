<?php
session_start();
include 'connection.php';

if(isset($_POST['place_order'])) {

    #get info
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $user_id = 2;
    $order_date = date("Y-m-d H:i:s");


    #insert into db
    $stmt = $conn -> prepare("INSERT INTO Orders (order_cost, order_date, user_id, user_name, user_email, user_phone, user_city, user_address) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)") or die ("Connection failed: " . mysqli_connect_error());
    $stmt -> bind_param("isississ", $order_cost, $order_date, $user_id, $name, $email, $phone, $city, $address);
    $stmt -> execute();
    
    $order_id = $stmt -> insert_id;
    echo $order_id;

    #insert order_details
    foreach ($_SESSION['cart'] as $key => $value) {
        $skill = $_SESSION['cart'][$key];
        $skill_id = $skill['skill_id'];
        $skill_name = $skill['skill_name'];
        $price = $skill['price'];
        $instructor = $skill['instructor'];
        $category = $skill['skill_category'];

        $stmt = $conn->prepare("INSERT INTO Order_Details (order_id, skill_id, skill_name, price, instructor, category) 
                                VALUES (?, ?, ?, ?, ?, ?)") or die("Connection failed: " . mysqli_connect_error());
        $stmt->bind_param("iisiss", $order_id, $skill_id, $skill_name, $price, $instructor, $category);
        $stmt->execute();
    }

    // After the order is successfully processed
    header("Location: ../order-confirm.php");
    exit();


}

?>