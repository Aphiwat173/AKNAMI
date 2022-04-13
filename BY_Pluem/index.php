<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'config/class.php';
    $pluem = new classweb;
    $web_config = $pluem->web_config();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_config['title'] ?></title>
    <link rel="icon" type="image" href="<?php echo $web_config['logo']; ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="QymvDpEg"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit&display=swap">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="QymvDpEg"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <?php
    require 'vendor/autoload.php';
    $router = new AltoRouter();
    include 'layouts/navbar.php';
    $resultuser = $pluem->resultuser();
    //กำหนดหน้า

     /* ตัวอย่าง
    $router->map('GET','หน้า',function(){
        include ''; ไฟล์หน้า
    });
    */
    if(empty($_SESSION['id'])){ //ถ้าไม่มี $_SESSION['id']
        $router->map('GET','/',function(){
            include 'pages/home.php';
        });
        $router->map('GET','/home',function(){
            include 'pages/home.php';
        });
        $router->map('GET','/login',function(){
            include 'pages/login.php';
        });
        $router->map('GET','/register',function(){
            include 'pages/register.php';
        });
    }else{ //ถ้ามี $_SESSION['id']

        //สมาชิก
        $router->map('GET','/',function(){
            include 'pages/home.php';
        });
        $router->map('GET','/home',function(){
            include 'pages/home.php';
        });
        $router->map('GET','/topup',function(){
            include 'pages/topup.php';
        });
        $router->map('GET','/shop',function(){
            include 'pages/shop.php';
        });
        $router->map('GET','/show_details',function(){
            include 'pages/details/show_details.php';
        });
        $router->map('GET','/history_shop',function(){
            include 'pages/history/history_shop.php';
        });


        //Test Pages
        $router->map('GET','/test',function(){
            include 'pages/test/test.php';
        });
    }
    $match = $router->match();
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        if(empty($_SESSION['id'])){ //ถ้าไม่มี $_SESSION['id'] และไม่พบหน้า จะให้โชว์หน้า login
            include 'pages/login.php';
        }else{
           include 'pages/404/index.php'; //ถ้ามี $_SESSION['id'] และไม่พบหน้า จะให้โชว์ข้อความ 404 Not Found
        }
    }
    ?>
    <br><br><br><br>
</body>
</html>