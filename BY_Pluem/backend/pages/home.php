<?php
$pluem = new classadmin;
$totaluser = $pluem->totaluser();
$totaltopup = $pluem->totaltopup();
$totalproduct = $pluem->totalproduct();
$totalproduct_ = $pluem->totalproduct_();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><?php echo $totaluser['total']; ?> คน</h4>
                    <p>ผู้ใช้ทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>
                        <?php if(empty($totaltopup['total'])){
                            echo "0.00";
                        }else{
                            echo $totaltopup['total'];
                        }
                        ?> บาท
                    </h4>
                    <p>ยอดเติมเงินทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h4><?php echo $totalproduct['total']; ?> ชิ้น</h4>
                <p>สินค้าคงเหลือทั้งหมด</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h4><?php echo $totalproduct_['total']; ?> ชิ้น</h4>
                    <p>สินค้าที่ขายไปทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    </div>
</div>