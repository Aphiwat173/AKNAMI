$(".submit_edit_user").click(function(){
    var edit_user_user = $("#edit_user_user").val();
    var edit_pass_user = $("#edit_pass_user").val();
    var edit_point_user = $("#edit_point_user").val();
    var id_user = $("#id_edit_user").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/edit_user.php",
        dataType:"json",
        data:{edit_user_user,edit_pass_user,edit_point_user,id_user},
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