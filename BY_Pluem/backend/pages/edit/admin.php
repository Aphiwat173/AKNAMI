<?php
$pluem = new classadmin;
$showedit_admin = $pluem->showedit_admin($_GET['id']);
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">แก้ไขผู้ดูแลระบบ</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="col-sm-12">
                        <span>ชื่อผู้ใช้</span>
                        <input type="text" id="edit_user_admin" value="<?php echo $showedit_admin['username'] ?>" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <span>รหัสผ่าน</span>
                            <input type="text" id="edit_pass_admin" value="<?php echo $showedit_admin['password'] ?>" class="form-control" placeholder="กรุณากรอกรหัสผ่าน">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success submit_edit_admin">แก้ไขผู้ดูแลระบบ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $showedit_admin['id']; ?>" id="id_edit_admin">
<script type="text/javascript" src="assets/js/edit_admin.js"></script>