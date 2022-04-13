<?php
$pluem = new classweb;
$web_config = $pluem->web_config();
$resultuser = $pluem->resultuser();
?>
<nav class="navbar navbar-expand-lg back555">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="<?php echo $web_config['logo']; ?>" width="80"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="text-fff">เมนู</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active text-fff" href="/">หน้าหลัก</a>
                <a class="nav-item nav-link active text-fff" href="/topup">เติมเงิน</a>
                <a class="nav-item nav-link active text-fff" href="/shop">ร้านค้า</a>
                <a class="nav-item nav-link active text-fff" href="/history_shop">ประวัติการซื้อสินค้า</a>
                <a class="nav-item nav-link active text-fff" target="target" href="<?php echo $web_config['contact']; ?>">ติดต่อแอดมิน</a>
            </div>
            <div class="navbar-nav ml-auto">
                <?php if(empty($_SESSION['id'])){?>
                    <a class="nav-item nav-link active text-fff" href="/login">เข้าสู่ระบบ</a>
                    <a class="nav-item nav-link active text-fff" href="/register">สมัครสมาชิก</a>
                <?php }else{ ?>
                    <a class="nav-item nav-link active text-fff" href="#">ชื่อ : <?php echo $resultuser['username']; ?></a>
                    <a class="nav-item nav-link active text-fff" href="#">เครดิต : <?php echo $resultuser['point']; ?> </a>
                    <a class="nav-item nav-link active text-fff logout" href="#">ออกจากระบบ</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>
<script type="text/javascript" src="../assets/js/navbar.js"></script>