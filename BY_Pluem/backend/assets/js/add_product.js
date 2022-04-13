$(".submit_add_product").click(function(){
    var add_name_product = $("#add_name_product").val();
    var add_image_product = $("#add_image_product").val();
    var add_details_product = $("#add_details_product").val();
    var add_item_product = $("#add_item_product").val();
    var add_price_product = $("#add_price_product").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/add_product.php",
        dataType:"json",
        data:{add_name_product,add_image_product,add_details_product,add_item_product,add_price_product},
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