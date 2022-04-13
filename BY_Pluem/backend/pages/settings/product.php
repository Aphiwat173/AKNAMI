<?php
$pluem = new classadmin;
$show_product = $pluem->show_product();
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">จัดการสินค้า</h3>
            </div>
            <div class="card-body">
            <a href="/backend/add_product" class="btn btn-success my-2">เพิ่มสินค้า</a>
            <table id="settings_viewweb" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ไอดี</th>
                        <th>ชื่อสินค้า</th>
                        <th>รูปภาพ</th>
                        <th>รายละเอียดสินค้า</th>
                        <th>สินค้าที่ได้รับ</th>
                        <th>ราคา</th>
                        <th>ผู้ชื่อ</th>
                        <th>เวลา</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($show_product as $row){ ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><img src="<?php echo $row['image']; ?>" width="50%"></td>
                        <td><?php echo $row['details']; ?></td>
                        <td><?php echo $row['item']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <?php
                            if($row['username'] == "0"){
                                echo "ยังไม่มีคนซื้อ";
                            }else{
                                echo $row['username'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['date'] == "0"){
                                echo "ยังไม่มีคนซื้อ";
                            }else{
                                echo $row['date'];
                            }
                            ?>
                        </td>
                        <td>
                            <a href="/backend/edit_product?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm mt-2">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <button id_del_product="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm mt-2 del_product">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/js/del_product.js"></script>