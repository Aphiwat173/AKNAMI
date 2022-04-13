<?php
$pluem = new classweb;
if(empty($_GET['id'])){
    echo "ไม่พบสินค้า";
}else{
    $show_details = $pluem->show_details($_GET['id']);
}
?>
<?php if(empty($_GET['id'])){ ?>
<?php }else{ ?>
    <div class="container mt-3">
        <center>
            <div class="card bg-dark">
                <div class="card-body">
                    <div class="col-sm-6">
                        <a>
                            <img class="card-img-top img-show" src="<?php echo $show_details['image']; ?>">
                        </a>
                        <div class="d-block pl-4 pt-3">
                            <h3 class="text-fff"><?php echo $show_details['name'] ?></h3>
                            <hr class="text-dark">
                            <h5 class="mt-3 text-fff">ราคา : <?php echo $show_details['price']; ?></h5>
                            <h5 class="mt-3 text-fff">สถานะ :
                                <?php
                                    if($show_details['username'] == "0"){
                                        echo "ยังไม่มีคนซื้อ";
                                    }else{
                                        echo "มีคนซื้อแล้ว";
                                    }
                                ?>
                            </h5>
                            <hr>
                            <h5 class="mt-3 text-fff">รายละเอียดสินค้า</h5>
                            <p class="text-fff"><?php echo $show_details['details']; ?></p>
                            <hr>
                            <button type="button" class="btn btn-success buy_product w-100" nameproduct="<?php echo $show_details['name']; ?>" idproduct="<?php echo $show_details['id']; ?>">ซื้อสินค้า</button>
                            <a href="/home" class="btn btn-primary w-100 mt-3">กลับหน้าหลัก</a>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
<?php } ?>
<script type="text/javascript" src="../assets/js/buy_product.js"></script>