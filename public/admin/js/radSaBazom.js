$(document).ready(function(){
})

function RoleInsert(){
    $("#insert-role").click(function(){
        var naziv=document.getElementById("naziv").value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"/role/insert",
            method:"post",
            data:{
                _token:  CSRF_TOKEN,
                naziv:naziv
            },
            success:function(data){
                $("#naziv").val(" ");
                $("#meni-insert-result").html("You added a new role");
                var ispis=' <thead>' +
                    '                            <tr>' +
                    '                                <th>Role Id</th>' +
                    '                                <th>Name</th>' +
                    '                                <th></th>' +
                    '                            </tr>' +
                    '                            </thead>' +
                    '                            <tbody>';
                for(var i=0;i<data.length;i++){
                    ispis+='<tr class="odd gradeX">' +
                        '                                    <td>'+data[i]["ulogaId"]+'</td>' +
                        '                                    <td>'+data[i]["nazivUloge"]+'</td>' +
                        '                                    <td> &nbsp;' +
                        '                                        <input class="btn btn-danger btn-md role-delete" data-id="'+data[i]["ulogaId"]+'" type="button" value="delete"/></td>' +
                        '                                </tr>'
                }
                ispis+='</tbody>';
                $('#dataTables-example').html(ispis);
                DeleteRole();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
RoleInsert();

function DeleteRole(){
    $(".role-delete").on("click",function(){
        var id=$(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"/role/delete",
            method:"post",
            type:"json",
            data:{
                _token:  CSRF_TOKEN,
                id:id
            },
            success:function(data){
                var ispis=' <thead>' +
                    '                            <tr>' +
                    '                                <th>Role Id</th>' +
                    '                                <th>Name</th>' +
                    '                                <th></th>' +
                    '                            </tr>' +
                    '                            </thead>' +
                    '                            <tbody>';
                for(var i=0;i<data.length;i++){
                    ispis+='<tr class="odd gradeX">' +
                        '                                    <td>'+data[i]["ulogaId"]+'</td>' +
                        '                                    <td>'+data[i]["nazivUloge"]+'</td>' +
                        '                                    <td> &nbsp;' +
                        '                                        <input class="btn btn-danger btn-md role-delete" data-id="'+data[i]["ulogaId"]+'" type="button" value="delete"/></td>' +
                        '                                </tr>'
                }
                ispis+='</tbody>';
                $('#dataTables-example').html(ispis);
                DeleteRole();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteRole();



function UpdateProduct(){
    $(".form-update").on("click",function(){
        var id=$(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"/product/updateForma",
            method:"post",
            type:"json",
            data:{
                _token:  CSRF_TOKEN,
                id:id,
            },
            success:function(data){


                ispis='<form id="forma" method="POST" action="/product/update"  role="form" enctype="multipart/form-data">' +
                    '<input type="hidden" name="_token" value="'+CSRF_TOKEN+'">       '+
                    '                            <div class="form-group">' +
                    '                                <label>Name</label>' +
                    '                                <input type="text" name="naziv" id="naziv" class="form-control" value="'+data['proizvod'][0]['nazivProizvoda']+'" placeholder="Enter product name" required>' +
                    '                            </div>' +
                    '                            <div class="form-group">' +
                    '                                <label>Price</label>' +
                    '                                <input type="text" name="cena"  id="cena" class="form-control"value="'+data['proizvod'][0]['cena']+'" placeholder="Enter price" required>' +
                    '                            </div>' +
                    '                            <div class="form-group">' +
                    '                                <label>Picture</label>' +
                    '                                <input type="file" name="slika"  id="slika" class="form-control">' +
                    '                            </div>' +
                    '                            <div class="form-group">' +
                    '                                <label>Picture Alt</label>' +
                    '                                <input type="text" name="slika_alt" id="slika_alt"  value="'+data['proizvod'][0]['alt']+'"class="form-control" placeholder="Enter picture alt" required>' +
                    '                            </div>' +
                    '' +
                    '                            <div class="form-group">' +
                    '                                <label>Quantity</label>' +
                    '                                <input type="text" name="kolicina" id="kolicina" value="'+data['proizvod'][0]['kolicina']+'"class="form-control" placeholder="Enter quantity" required>' +
                    '                            </div>' +
                    '<div class="form-group">' +
                    '                                <label>Gander </label>' +
                    '                                <select name="pol" id="pol" class="form-control">';
                for(var i=0;i<data['polovi'].length;i++){
                    if(data['proizvod'][0]['polId']==data['polovi'][i]['polId']){
                        ispis+= '<option value="'+data['polovi'][i]['polId']+'" selected>'+data['polovi'][i]['nazivPola']+'</option>';
                    }
                    else{
                        ispis+= '<option value="'+data['polovi'][i]['polId']+'">'+data['polovi'][i]['nazivPola']+'</option>';
                    }
                }
                ispis+='</select>' +
                    '                            </div>' +
                    '                            <div class="form-group">' +
                    ''+
                    '                                <input type="submit" name="insert-product" id="insert-product" class="btn btn-primary btn-md" value="UPDATE">' +
                    '                            </div>' +
                    '                            <label id="meni-insert-result"> </label>\n' +
                    '<input type="hidden" name="id" id="kolicina" value="'+data['proizvod'][0]['proizvodId']+'">' +
                    '                        </form>';
                $("#ispisForme").html(ispis);
                $("#naslovForma").html("Update");
                $('#naziv').focus();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
UpdateProduct();
function DeleteProduct(){
    $(".product-delete").on("click",function(){
        var id=$(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"/product/delete",
            method:"post",
            type:"json",
            data:{
                _token:  CSRF_TOKEN,
                id:id,
            },
            success:function(data){
                console.log(data);
                var ispis='<thead>\n' +
                    '                            <tr>\n' +
                    '                                <th>Product Id</th>\n' +
                    '                                <th>Name</th>\n' +
                    '                                <th>Price</th>\n' +
                    '                                <th>Picture</th>\n' +
                    '                                <th>Quantity</th>\n' +
                    '                                <th>Control</th>\n' +
                    '                            </tr>\n' +
                    '                            </thead>\n' +
                    '                            <tbody>\n';
                for(var i=0;i<data.length;i++){
                    ispis+='<tr class="odd gradeX">\n' +
                        '                                <td>'+data[i]["proizvodId"]+'</td>\n' +
                        '                                <td>'+data[i]["nazivProizvoda"]+'</td>\n' +
                        '                                <td>'+data[i]["cena"]+'</td>\n' +
                        '                                <td class="center"><img  width="50px" src="/images/'+data[i]["slika"]+'" alt="'+data[i]["alt"]+'"/></td>\n' +
                        '                                <td class="center">'+data[i]["kolicina"]+'</td>\n' +
                        '                                <td><input class="btn btn-primary btn-md form-update" data-id="'+data[i]["proizvodId"]+'" type="button" value="update"/> &nbsp;\n' +
                        '                                    <input class="btn btn-danger btn-md product-delete" data-id="'+data[i]["proizvodId"]+'" type="button" value="delete"/></td>\n' +
                        '                            </tr>\n';
                }
                ispis+="</tbody>";
                $("#dataTables-example").html(ispis);
                DeleteProduct();
                UpdateProduct();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteProduct();


function UpdateUserPrikazForme(){
    $(".user-update").on("click",function(){
        var id=$(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url:"/user/updateForma",
            method:"post",
            type:"json",
            data:{
                _token:  CSRF_TOKEN,
                id:id,
            },
            success:function(data){
                var ispis='';
                for(var i=0;i<data['korisnici'].length;i++){

                    ispis+='<div class="col-lg-12">' +
                        '    <h1 id="naslovForma">Update User</h1>' +
                        '    <form id="forma" role="form">' +
                        '        <div class="form-group">' +
                        '            <label>Name</label>' +
                        '            <input type="text" id="ime" class="form-control" value="'+data["korisnici"][i]["ime"]+'">' +
                        '        </div>' +
                        '        <div class="form-group">' +
                        '            <label>Last name</label>' +
                        '            <input type="text" id="prezime" class="form-control" value="'+data["korisnici"][i]["prezime"]+'">' +
                        '        </div>' +
                        '        <div class="form-group">' +
                        '            <label>Address</label>' +
                        '            <input type="text" id="adresa" class="form-control" value="'+data["korisnici"][i]["adresa"]+'">' +
                        '        </div>' +
                        '        <div class="form-group">' +
                        '            <label>Phone number</label>' +
                        '            <input type="text" id="telefon" class="form-control" value="'+data["korisnici"][i]["telefon"]+'">' +
                        '        </div>' +
                        '        <div class="form-group">' +
                        '            <label>Email</label>' +
                        '            <input type="text" id="email" class="form-control" value="'+data["korisnici"][i]["email"]+'">' +
                        '        </div>' +
                        '        <div class="form-group">' +
                        '            <label>Username</label>' +
                        '            <input type="text" id="username" class="form-control" value="'+data["korisnici"][i]["username"]+'">' +
                        '        </div>' +
                        '        <div class="form-group">' +
                        '            <label>Acctive</label>' +
                        '            <input type="text" id="aktivan" class="form-control" value="'+data["korisnici"][i]["aktivan"]+'">' +
                        '        </div>' +
                        '        <div class="form-group">' +
                        '            <label>Role </label>' +
                        '            <select id="uloga" class="form-control">';
                            for(var j=0;j<data['uloge'].length;j++){

                                if(data['korisnici'][i]['ulogaId']==data['uloge'][j]['ulogaId']){
                                    ispis+='<option selected value="'+data['uloge'][j]['ulogaId']+'">'+data['uloge'][j]['nazivUloge']+'</option>';
                                }
                                else{
                                    ispis+='<option value="'+data['uloge'][j]['ulogaId']+'">'+data['uloge'][j]['nazivUloge']+'</option>';
                                }
                            }
                            ispis+='</select>' +
                        '        </div>' +
                        '        ' +
                        '        <div class="form-group">' +
                        '            <input type="button" data-id="'+data["korisnici"][i]["korisnikId"]+'" id="updateUser" class="btn btn-primary btn-md" value="UPDATE">' +
                        '        </div>' +
                        '        <label id="meni-insert-result"> </label>' +
                        '        ' +
                        '    </form>' +
                        '</div>';
                }
                $("#ispisiOvde").html(ispis);
                UpdateUser();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
UpdateUserPrikazForme();




function UpdateUser(){
    $("#updateUser").click(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id=$(this).data("id");
        var ime=document.getElementById("ime").value;
        var prezime=document.getElementById("prezime").value;
        var adresa=document.getElementById("adresa").value;
        var telefon=document.getElementById("telefon").value;
        var email=document.getElementById("email").value;
        var username=document.getElementById("username").value;
        var aktivan=document.getElementById("aktivan").value;
        var uloga=document.getElementById("uloga").value;
        $.ajax({
            url:"/user/update",
            method:"post",
            type:"json",
            data:{
                _token:  CSRF_TOKEN,
                id:id,
                ime:ime,
                prezime:prezime,
                adresa:adresa,
                telefon:telefon,
                email:email,
                username:username,
                aktivan:aktivan,
                uloga:uloga,
            },
            success:function(data){
                var ispis='<thead>' +
                    '                        <tr>' +
                    '                            <th>User Id</th>' +
                    '                            <th>Name</th>' +
                    '                            <th>Last name</th>' +
                    '                            <th>Address</th>' +
                    '                            <th>Phone number</th>' +
                    '                            <th>Email</th>' +
                    '                            <th>Username</th>' +
                    '                            <th>Date of registration</th>' +
                    '                            <th>Acctive</th>' +
                    '                            <th>Uloga</th>' +
                    '                            <th>Control</th>' +
                    '                        </tr>' +
                    '                        </thead>' +
                    '                        <tbody>';
                for(var i=0;i<data['korisnici'].length;i++){
                    ispis+='<tr class="odd gradeX">' +
                        '                            <td>'+data["korisnici"][i]["korisnikId"]+'</td>' +
                        '                            <td>'+data["korisnici"][i]["ime"]+'</td>' +
                        '                            <td>'+data["korisnici"][i]["prezime"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["adresa"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["telefon"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["email"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["username"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["vremeRegistracije"]+'</td>' +
                        '                            <td class="center">';
                    if(+data["korisnici"][i]['aktivan']==1){
                        ispis+='aktivan';
                    }else{
                        ispis+='nije aktivan';
                    }
                    ispis+=
                        '                                                        </td>';
                        for(var j=0;j<data['uloge'].length;j++){
                            if(data["korisnici"][i]['ulogaId']==data["uloge"][j]['ulogaId']){
                                ispis+=data["uloge"][j]['nazivUloge'];
                            }
                        }
                        ispis+=
                        '                                                                                        <td class="center">admin</td>' +
                        '                                ' +
                        '                                                            ' +
                        '                                                        <td><input class="btn btn-primary btn-md user-update" data-id="34" type="button" value="update"/> &nbsp;' +
                        '                                <input class="btn btn-danger btn-md user-delete" data-id="34" type="button" value="delete"/></td>' +
                        '                        </tr>';
                }
                $("#ispisiOvde").html(" ");
                $("#dataTables-example").html(ispis);
                DeleteUser();
                UpdateUserPrikazForme();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}




function DeleteUser(){
    $(".user-delete").on("click",function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id=$(this).data("id");
        $.ajax({
            url:"/user/delete",
            method:"post",
            type:"json",
            data:{
                _token:  CSRF_TOKEN,
                id:id,
            },
            success:function(data){
                var ispis='<thead>' +
                    '                        <tr>' +
                    '                            <th>User Id</th>' +
                    '                            <th>Name</th>' +
                    '                            <th>Last name</th>' +
                    '                            <th>Address</th>' +
                    '                            <th>Phone number</th>' +
                    '                            <th>Email</th>' +
                    '                            <th>Username</th>' +
                    '                            <th>Date of registration</th>' +
                    '                            <th>Acctive</th>' +
                    '                            <th>Uloga</th>' +
                    '                            <th>Control</th>' +
                    '                        </tr>' +
                    '                        </thead>' +
                    '                        <tbody>';
                for(var i=0;i<data['korisnici'].length;i++){
                    ispis+='<tr class="odd gradeX">' +
                        '                            <td>'+data["korisnici"][i]["korisnikId"]+'</td>' +
                        '                            <td>'+data["korisnici"][i]["ime"]+'</td>' +
                        '                            <td>'+data["korisnici"][i]["prezime"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["adresa"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["telefon"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["email"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["username"]+'</td>' +
                        '                            <td class="center">'+data["korisnici"][i]["vremeRegistracije"]+'</td>' +
                        '                            <td class="center">';
                    if(+data["korisnici"][i]['aktivan']==1){
                        ispis+='aktivan';
                    }else{
                        ispis+='nije aktivan';
                    }
                    ispis+=
                        '                                                        </td>';
                    for(var j=0;j<data['uloge'].length;j++){
                        if(data["korisnici"][i]['ulogaId']==data["uloge"][j]['ulogaId']){
                            ispis+=data["uloge"][j]['nazivUloge'];
                        }
                    }
                    ispis+=
                        '                                                                                        <td class="center">admin</td>' +
                        '                                ' +
                        '                                                            ' +
                        '                                                        <td><input class="btn btn-primary btn-md user-update" data-id="34" type="button" value="update"/> &nbsp;' +
                        '                                <input class="btn btn-danger btn-md user-delete" data-id="34" type="button" value="delete"/></td>' +
                        '                        </tr>';
                }
                $("#dataTables-example").html(ispis);
                DeleteUser();
                UpdateUserPrikazForme();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteUser();



