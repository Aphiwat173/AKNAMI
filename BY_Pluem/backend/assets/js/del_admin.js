$(".del_admin").click(function(){
    var id_del_admin = $(this).attr("id_del_admin")
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่!',
        text: "คุณแน่ใจที่ต้องการลบผู้ดูแลระบบหมายเลข "+id_del_admin,
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
                url:"./api/v1/del_admin.php",
                dataType:"json",
                data:{id_del_admin},
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