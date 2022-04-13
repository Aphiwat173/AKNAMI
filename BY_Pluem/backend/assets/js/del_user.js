$(".del_user").click(function(){
    var id_del_user = $(this).attr("id_del_user")
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่!',
        text: "คุณแน่ใจที่ต้องการลบผู้ใช้หมายเลข "+id_del_user,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ไม่'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"POST",
                url:"./api/v1/del_user.php",
                dataType:"json",
                data:{id_del_user},
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
        }
      })
})