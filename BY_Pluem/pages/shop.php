<?php
$pluem = new classweb;
$show_product = $pluem->show_product();
?>
<div class="container mt-2">
    <div class="row">
        <div class="col-12">
        <h1 class="text-fff">สินค้าทั้งหมด</h1>
            <div class="card-deck">
                <div class="row">
                    <?php foreach ($show_product as $row){ ?>
                    <div class="col-sm-4 mt-2">
                        <div class="card bg-dark">
                            <a>
                                <img class="card-img-top" src="<?php echo $row['image']; ?>">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-fff"><?php echo $row['name']; ?></h5>
                                <hr>
                                <p class="card-text text-fff"><?php echo $row['details']; ?></p>
                                <p class="card-text text-fff">ราคา <?php echo $row['price']; ?> บาท</p>
                                <center>
                                    <button type="button" class="btn btn-success buy_product" nameproduct="<?php echo $row['name']; ?>" idproduct="<?php echo $row['id']; ?>">ซื้อสินค้า</button>
                                    <a href="/show_details?id=<?php echo $row['id']; ?>" class="btn btn-primary">รายละเอียดสินค้า</a>
                                </center>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../assets/js/buy_product.js"></script>