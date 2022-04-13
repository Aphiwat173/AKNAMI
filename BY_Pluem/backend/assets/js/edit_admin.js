$(".submit_edit_admin").click(function(){
    var edit_user_admin = $("#edit_user_admin").val();
    var edit_pass_admin = $("#edit_pass_admin").val();
    var id_admin = $("#id_edit_admin").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/edit_admin.php",
        dataType:"json",
        data:{edit_user_admin,edit_pass_admin,id_admin},
        success:function(data){
            if (data.status == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: data.message,
                }).then(function(){
                    window.location.reload();
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด!',
                    text: data.message,
                })
            }
        }
    })
})