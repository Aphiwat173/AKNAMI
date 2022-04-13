$(".submit_add_admin").click(function(){
    var add_user_admin = $("#add_user_admin").val();
    var add_pass_admin = $("#add_pass_admin").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/add_admin.php",
        dataType:"json",
        data:{add_user_admin,add_pass_admin},
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