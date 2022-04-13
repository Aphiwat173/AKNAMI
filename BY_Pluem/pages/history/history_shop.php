<?php
$pluem = new classweb;
$history_shop = $pluem->history_shop();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-dark">
                <div class="card-body text-fff">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">สินค้าที่ได้รับ</th>
                            <th scope="col">ราคา</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($history_shop as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['item'] ?></td>
                                    <td><?php echo $row['price']; ?> บาท</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>