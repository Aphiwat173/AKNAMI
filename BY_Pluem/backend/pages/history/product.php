<?php
$pluem = new classadmin;
$history_product = $pluem->history_product();
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ประวัติการซื้อสินค้า</h3>
            </div>
            <div class="card-body">
            <table id="settings_viewweb" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ไอดี</th>
                        <th>ชื่อสินค้า</th>
                        <th>รายละเอียดสินค้า</th>
                        <th>สินค้าที่ได้รับ</th>
                        <th>ราคา</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>เวลา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($history_product as $row){ ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['details']; ?></td>
                        <td><?php echo $row['item']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>