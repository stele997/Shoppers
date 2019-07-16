$(document).ready(function(){
    deleteItem();

    function deleteItem(){
        $(".deleteItem").click(function($e){
            $e.preventDefault();
            var stingId=$(this).data("id");
            var intId=parseInt(stingId);
            $.ajax({
                url:'/nesto/'+intId,
                method:"GET",
                success:function(result){
                    console.log(result)
                    var broj = result.length;
                    $("#brojArtikala").html(broj);
                    var ispis="";
                    for(var i=0;i<result.length;i++){
                        ispis+='<tr>'+
                            '                            <td class="product-thumbnail">' +
                            '                                <img src="images/'+result[i][0]['slika']+'" alt="'+result[i][0]['slika']+'" class="img-fluid">' +
                            '                            </td>' +
                            '                            <td class="product-name">' +
                            '                                <h2 class="h5 text-black">'+result[i][0]['nazivProizvoda']+'</h2>' +
                            '                            </td>' +
                            '                            <td>$'+result[i][0]['cena']+'</td>' +
                            '                            <td>' +
                            '                                <div class="input-group mb-3" style="max-width: 120px;">' +
                            '                                    <div class="input-group-prepend">' +
                            '                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>' +
                            '                                    </div>' +
                            '                                    <input type="text" class="form-control text-center" value="'+result[i]['kolicina']+'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">' +
                            '                                    <div class="input-group-append">' +
                            '                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button> '+
                            '                                    </div>' +
                            '                                </div>'+
                            '                            </td>' +
                            '                            <td>$'+result[i][0]['cena']*result[i]['kolicina']+'</td> '+
                            '                            <td><a href="#" data-id="'+result[i][0]['proizvodId']+'" class="deleteItem btn btn-primary btn-sm">X</a></td>'+
                            '                        </tr>';
                    }
                    $("#tabela").html(ispis);
                    $kolicina=0;
                    for(var i=0;i<result.length;i++){
                        $kolicina+=result[i][0]['cena']*result[i]['kolicina'];

                    }

                    $(".subtotal").html('$'+$kolicina+'.00');
                    deleteItem();
                },
                error:function(xhr,status,errMsg){
                    console.log(xhr+" "+status+" " + errMsg);
                }

            })

        })

    }

})