<?php

function database_connect($servername = "127.0.0.1", $username = "webshopuser", $password = "ZnYuNE6kEG7QHGa", $dbname = "abdel_webshop")
{
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn)  throw new Exception("Connection failed: " . mysqli_connect_error());
    return $conn;
}

function database_disconnect($conn)
{
    mysqli_close($conn);
}

function saveUser($user)
{
    $conn = database_connect();
    try {

        $name = mysqli_real_escape_string($conn, $user['naam']);
        $email = mysqli_real_escape_string($conn, $user['email']);
        $wachtwoord = mysqli_real_escape_string($conn, $user['wachtwoord']);
        $sql = "INSERT INTO users (name, email, password) 
        VALUE ('" . $name . "', '" . $email . "','" . $wachtwoord . "')";
        if (!mysqli_query($conn, $sql)) throw new Exception("user not Found");
    } finally {
        database_disconnect($conn);
    }
}

function findUserByEmail($email)
{
    $conn = database_connect();
    try {
        $sql = "SELECT user_id, name, email, password FROM users WHERE email='" . $email . "'";
        $user = mysqli_query($conn, $sql);
        if (!$user) throw new Exception("user not found" . $sql);
        if (mysqli_num_rows($user) > 0) {
            while ($row = mysqli_fetch_assoc($user)) {
                return array('id' => $row["user_id"], 'naam' => $row["name"], 'email' => $row["email"], 'wachtwoord' => $row["password"]);
            }
        }
    } finally {
        database_disconnect($conn);
    }
}

function findProducts()
{
    $conn = database_connect();
    try {
        $sql = "SELECT  * FROM products";
        $products = mysqli_query($conn, $sql);
        if (!$products) throw new Exception("GetProducts failed");
        return mysqli_fetch_all($products, MYSQLI_ASSOC);
    } finally {
        database_disconnect($conn);
    }
}


function findProductById($id)
{
    $conn = database_connect();
    try {
        $sql = "SELECT * FROM products WHERE product_id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        if (!$result) throw new Exception("Error by Function find product by Id : " . mysqli_error($conn));
        $products = (mysqli_fetch_all($result, MYSQLI_ASSOC));
        return sizeof($products) == 1 ?  $products[0] : null;
    } finally {
        database_disconnect($conn);
    }
}

function addPaymentToDatabase($user_id, $cartItems, $totalPrice)
{
    $conn = database_connect();
    try {
        if (!$conn) throw new Exception("connection faild");
        $sql = "INSERT INTO carts ( user_id)VALUE ('" . $user_id . "')";
        if (!mysqli_query($conn, $sql)) throw new Exception("Cart can t inserted");

        $cart_id = mysqli_insert_id($conn);
        foreach ($cartItems as $item) {
            $nbrOfItems = mysqli_real_escape_string($conn, $item['nbrOfItems']);
            $sql = "INSERT INTO cart_items (cart_id , nbr_items , product_id)VALUE ('" . $cart_id . "', '" . $nbrOfItems . "','" . $item['id'] . "')";
            if (!mysqli_query($conn, $sql)) throw new Exception("Cart Item Insert ERROR : " . $sql);
        }

        $sql = "INSERT INTO payments ( cart_id , total_price , checkout)VALUE ('" . $cart_id . "', '" . $totalPrice . "','" . 0 . "')";
        if (!mysqli_query($conn, $sql)) throw new Exception("Payment can t inserted");
        return mysqli_insert_id($conn);
    } finally {
        database_disconnect($conn);
    }
}
