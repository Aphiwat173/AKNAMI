$(".buy_product").click(function(){
    var idproduct = $(this).attr("idproduct")
    var nameproduct = $(this).attr("nameproduct")
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่!',
        text: "คุณแน่ใจหรือไม่ ที่จะซื้อสินค้า "+nameproduct,
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
                url:"./api/buy_product.php",
                dataType:"json",
                data:{idproduct},
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