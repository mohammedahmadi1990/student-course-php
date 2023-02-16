<?php
session_start();


if (isset($_GET["courseNo"])) {
    $course_no = urldecode($_GET["courseNo"]);
    $cart = $_SESSION['cart'];
    if (in_array($course_no, $cart)) {
        $index = array_search($course_no, $cart);
        array_splice($cart, $index, 1);
    } else {
        array_push($cart, $course_no);
    }
    $_SESSION['cart'] = $cart;
}

?>