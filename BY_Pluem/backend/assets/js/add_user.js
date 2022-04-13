$(".submit_add_user").click(function(){
    var add_user_user = $("#add_user_user").val();
    var add_pass_user = $("#add_pass_user").val();
    var add_point_user = $("#add_point_user").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/add_user.php",
        dataType:"json",
        data:{add_user_user,add_pass_user,add_point_user},
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