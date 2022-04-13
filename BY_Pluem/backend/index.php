<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'config/class.php';
    $pluem = new classadmin;
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
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/dataTables/dataTables.responsive.min.js"></script>
    <script src="assets/js/dataTables/dataTables.buttons.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="QymvDpEg"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <?php
    require '../vendor/autoload.php';
    $router = new AltoRouter();
    if(empty($_SESSION['id_admin'])){
        $router->map('GET','/backend/',function(){
            include 'pages/login.php';
        });
        $router->map('GET','/backend/login',function(){
            include 'pages/login.php';
        });
    }else{
        include 'layouts/navbar.php';
        $router->map('GET','/backend/',function(){
            include 'pages/home.php';
        });
        $router->map('GET','/backend/home',function(){
            include 'pages/home.php';
        });

        //settings
        $router->map('GET','/backend/settings_product',function(){
            include 'pages/settings/product.php';
        });
        $router->map('GET','/backend/settings_user',function(){
            include 'pages/settings/user.php';
        });
        $router->map('GET','/backend/settings_admin',function(){
            include 'pages/settings/admin.php';
        });
        $router->map('GET','/backend/settings_web',function(){
            include 'pages/settings/web.php';
        });

        //history
        $router->map('GET','/backend/history_product',function(){
            include 'pages/history/product.php';
        });
        $router->map('GET','/backend/history_topup',function(){
            include 'pages/history/topup.php';
        });

        //edit
        $router->map('GET','/backend/edit_user',function(){
            include 'pages/edit/user.php';
        });
        $router->map('GET','/backend/edit_admin',function(){
            include 'pages/edit/admin.php';
        });
        $router->map('GET','/backend/edit_product',function(){
            include 'pages/edit/product.php';
        });

        //add
        $router->map('GET','/backend/add_user',function(){
            include 'pages/add/user.php';
        });
        $router->map('GET','/backend/add_admin',function(){
            include 'pages/add/admin.php';
        });
        $router->map('GET','/backend/add_product',function(){
            include 'pages/add/product.php';
        });
    }
    $match = $router->match();
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    }else {
        if(empty($_SESSION['id_admin'])){ //ถ้าไม่มี $_SESSION['id'] และไม่พบหน้า จะให้โชว์หน้า login
            include 'pages/login.php';
        }else{
            include 'pages/404/index.php'; //ถ้ามี $_SESSION['id'] และไม่พบหน้า จะให้โชว์ข้อความ 404 Not Found
        }
    }
    ?>
    <script>
    $(function () {
        $("#settings_viewweb").DataTable({
        })
    });
</script>
</body>
</html>