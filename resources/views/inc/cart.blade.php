<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody id="tabela">
                        @if(Session::has('cart'))
                            @foreach(session('cart') as $item)
                        <tr>
                            <td class="product-thumbnail">
                                <img src="images/{{$item[0]->slika}}" alt="{{$item[0]->alt}}" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">{{$item[0]->nazivProizvoda}}</h2>
                            </td>
                            <td>${{$item[0]->cena}}</td>
                            <td>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <span class="form-control text-center" >{{$item['kolicina']}}</span>

                                </div>

                            </td>
                            <td>${{$item[0]->cena*$item['kolicina']}}</td>
                            <td><a href="#" data-id="{{$item[0]->proizvodId}}" class="deleteItem btn btn-primary btn-sm">X</a></td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        @if(Session::has('user'))
        <div class="row">
            <div class="col-md-12 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="subtotal text-black">
                                    $@if(isset($ukupno))
                                        {{$ukupno}}.00
                                    @endif
                                </strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="subtotal text-black">$@if(isset($ukupno))
                                        {{$ukupno}}.00
                                    @endif</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='/checkout'">Proceed To Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endif
    </div>
</div>