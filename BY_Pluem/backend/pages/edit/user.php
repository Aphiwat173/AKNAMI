<?php
$pluem = new classadmin;
$showedit_user = $pluem->showedit_user($_GET['id']);
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">แก้ไขสมาชิก</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="col-sm-12">
                        <span>ชื่อผู้ใช้</span>
                        <input type="text" id="edit_user_user" value="<?php echo $showedit_user['username'] ?>" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>รหัสผ่าน</span>
                            <input type="text" id="edit_pass_user" value="<?php echo $showedit_user['password'] ?>" class="form-control" placeholder="กรุณากรอกรหัสผ่าน">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>เครดิต</span>
                            <input type="text" id="edit_point_user" value="<?php echo $showedit_user['point'] ?>" class="form-control" placeholder="กรุณากรอกเครดิต">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success submit_edit_user">แก้ไขสมาชิก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $showedit_user['id']; ?>" id="id_edit_user">
<script type="text/javascript" src="assets/js/edit_user.js"></script>