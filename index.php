<?php
session_start();
//inclue the header file
include ("./view/header.php");
include ("./model/cata.php");
include ("./model/database.php");
include ("./model/product.php");
include ("./model/user.php");
//inclue home file
/* include ("./view/home.php"); */
//
if(isset($_GET['act'])) {
    switch($_GET['act']){
        case 'product':
            $product = getAllProduct();
            include ('view/product.php');
            break;   
        case 'cart':
            include('view/cart.php');
            break;
        
        case 'contact':
            include('view/contact.php');
            break;

        case 'login':
            if(isset($_POST['register'])&&($_POST['register'])){
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $phone = $_POST['phone'];
                //gọi hàm thêm user
                $result = addUser($username, $password, $phone);
                if ($result) echo 'Chúc mừng bạn đã đăng ký thành công';
                else echo 'Bạn đăng ký không thành công';
            }
            include('view/login.php');
            break;

        case 'blog':
            include('view/blog.php');
            break;
        case 'contact':
            include('view/contact.php');
            break; 
        case 'single-product':
            $product = getAllProduct();
            $id=$_GET['id'];
            
            include('view/single-product.php');
            break;   
        default:
            include('view/home.php');
            break;  
    }
}else{
    $catagoris = categoryList();
    $product = getAllProduct();
    include('view/home.php');
}
include ("./view/footer.php");

?>