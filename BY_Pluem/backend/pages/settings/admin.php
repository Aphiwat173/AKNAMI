<?php
$pluem = new classadmin;
$show_admin = $pluem->show_admin();
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">จัดการผู้ดูแลระบบ</h3>
            </div>
            <div class="card-body">
            <a href="/backend/add_admin" class="btn btn-success my-2">เพิ่มผู้ดูแลระบบ</a>
            <table id="settings_viewweb" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ไอดี</th>
                        <th>ชื่อผู้ดูแลระบบ</th>
                        <th>รหัสผ่าน</th>
                        <th>เข้าสู่ระบบล่าสุดเมื่อ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($show_admin as $row){ ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['username']; ?>
                        </td>
                        <td>
                            <?php echo $row['password']; ?>
                        </td>
                        <td>
                            <?php echo $row['date']; ?>
                        </td>
                        <td>
                            <a href="/backend/edit_admin?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm mt-2">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <button id_del_admin="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm mt-2 del_admin">
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
<script type="text/javascript" src="assets/js/del_admin.js"></script>