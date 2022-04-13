<?php
$pluem = new classadmin;
$show_web = $pluem->show_web();
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12 mt-2">
                        <span>ชื่อเว็บไซต์</span>
                        <input type="text" class="form-control" value="<?php echo $show_web['title']; ?>" id="title_web">
                    </div>
                    <div class="col-sm-12 mt-2">
                        <span>โลโก้เว็บ</span>
                        <input type="text" class="form-control" value="<?php echo $show_web['logo']; ?>" id="logo_web">
                    </div>
                    <div class="col-sm-12 mt-2">
                        <span>ติดต่อฉัน</span>
                        <input type="text" class="form-control" value="<?php echo $show_web['contact']; ?>" id="contact_web">
                    </div>
                    <div class="col-sm-12 mt-2">
                        <span>เบอร์รับเงิน(อังเปา)</span>
                        <input type="text" class="form-control" value="<?php echo $show_web['phone']; ?>" id="phone_web">
                    </div>
                    <div class="col-sm-12 mt-2">
                        <button class="btn btn-success w-100 submit_web">บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/settings_web.js"></script>