$(".logout").click(function(){
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่!',
        text: "คุณแน่ใจที่จะออกจากระบบ ",
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
            url:"./api/logout.php",
            success:function(){
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: 'ออกจากระบบ สำเร็จ!',
            }).then(function(){
                window.location.reload();
            })
            }
            })
        }
    })
})