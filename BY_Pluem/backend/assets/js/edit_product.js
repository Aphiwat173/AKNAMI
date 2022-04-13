$(".submit_edit_product").click(function(){
    var edit_name_product = $("#edit_name_product").val();
    var edit_image_product = $("#edit_image_product").val();
    var edit_details_product = $("#edit_details_product").val();
    var edit_item_product = $("#edit_item_product").val();
    var edit_price_product = $("#edit_price_product").val();
    var edit_username_product = $("#edit_username_product").val();
    var id_edit_product = $("#id_edit_product").val();
    $.ajax({
        type:"POST",
        url:"./api/v1/edit_product.php",
        dataType:"json",
        data:{edit_name_product,edit_image_product,edit_details_product,edit_item_product,edit_price_product,edit_username_product,id_edit_product},
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