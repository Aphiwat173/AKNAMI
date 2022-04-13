<?php
$pluem = new classadmin;
$showedit_product = $pluem->showedit_product($_GET['id']);
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">แก้ไขสินค้า</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>ชื่อสินค้า</span>
                            <input type="text" id="edit_name_product" value="<?php echo $showedit_product['name'] ?>" class="form-control" placeholder="กรุณากรอกชื่อสินค้า">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>รูปภาพสินค้า</span><br>
                            <img src="<?php echo $showedit_product['image'] ?>" width="50%">
                            <input type="text" id="edit_image_product" value="<?php echo $showedit_product['image'] ?>" class="form-control mt-2" placeholder="กรุณากรอกรูปภาพสินค้า">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>รายละเอียดสินค้า</span>
                            <input type="text" id="edit_details_product" value="<?php echo $showedit_product['details'] ?>" class="form-control" placeholder="กรุณากรอกรายละเอียดสินค้า">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>สินค้าที่ได้รับ</span>
                            <textarea type="text" id="edit_item_product" class="form-control"><?php echo $showedit_product['item'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>ราคา</span>
                            <input type="text" id="edit_price_product" value="<?php echo $showedit_product['price'] ?>" class="form-control" placeholder="กรุณากรอกราคา">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>ผู้ชื่อ</span>
                            <select class="custom-select" id="edit_username_product">
                                <?php if($showedit_product['username']){ ?>
                                    <option value="<?php echo $showedit_product['username']; ?>" selected><?php echo $showedit_product['username']; ?></option>
                                    <option value="0">ยังไม่มีคนซื้อ</option>
                                <?php }else{ ?>
                                    <option value="0">ยังไม่มีคนซื้อ</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>เวลา</span>
                            <input type="text" value="<?php
                                if($showedit_product['date'] == "0"){
                                    echo "ยังไม่มีคนซื้อ";
                                }else{
                                    echo $showedit_product['date'];
                                }
                            ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success submit_edit_product">แก้ไขสินค้า</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $showedit_product['id']; ?>" id="id_edit_product">
<script src="assets/js/edit_product.js"></script>