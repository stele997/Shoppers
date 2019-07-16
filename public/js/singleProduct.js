$(document).ready(function(){

    $(".add-to-cart").click(function($e){
        $e.preventDefault();
        var stingId=$(this).data("id");
        var intId=parseInt(stingId);
        var kolicina=$("#kolicinaProizvoda").val();

        $.ajax({
            url:'/cart/'+intId+"/"+kolicina,
            method:"GET",
            success:function(result){
                console.log(result)
                var broj = result.length;

                $("#pIznadA").html('<a disabled="disabled">Added to cart</a>');
                $("#brojArtikala").html(broj);

            },
            error:function(xhr,status,errMsg){
                console.log(xhr+" "+status+" " + errMsg);
            }

        })
    })
})