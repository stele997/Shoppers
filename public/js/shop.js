$(document).ready(function(){


    $(document).on('click','.pagination a',function(event){
        event.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        fetch_data(page);

    });
    function fetch_data(page){
        $.ajax({
            url:'/pagination/fetch_data?page='+page,
            success:function(data){
                $('#data').html(data);
            }
        })
    };

    $('#searchProducts').keyup(function(){
        query=$(this).val();
        $.ajax({
            url:'/search',
            method:'GET',
            data:{query:query},
            success:function(data){
                $('#data').html(data);
            },
            error:function(xhr,status,errMsg){
console.log(errMsg)
            }
        })
    })
})