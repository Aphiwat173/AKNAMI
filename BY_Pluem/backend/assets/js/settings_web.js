$(".submit_web").click(function(){
    var title_web = $("#title_web").val();
    var logo_web = $("#logo_web").val();
    var contact_web = $("#contact_web").val();
    var phone_web = $("#phone_web").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/settings_web.php",
        dataType:"json",
        data:{title_web,logo_web,contact_web,phone_web},
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