$(".submit_register").click(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    var confirmpassword = $("#confirmpassword").val();
    $.ajax({
        type:"POST",
        url:"./api/register.php",
        dataType:"json",
        data:{username,password,confirmpassword},
        success:function(data){
            if (data.status == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: data.message,
                }).then(function(){
                    window.location.href = '/home';
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