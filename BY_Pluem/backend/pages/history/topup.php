<?php
$pluem = new classadmin;
$history_topup = $pluem->history_topup();
?>
<div class="container mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ประวัติการเติมเงิน</h3>
            </div>
            <div class="card-body">
            <table id="settings_viewweb" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ไอดี</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>ชื่อบัญชี</th>
                        <th>จำนวนเงิน</th>
                        <th>ลิงค์</th>
                        <th>เวลา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($history_topup as $row){ ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['link']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>