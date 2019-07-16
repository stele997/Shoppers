<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <a href="/cart">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                <form action="/naruci" method="post"  id="naruci">
                    @csrf
                <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  value="{{session('user')[0]->ime}}"id="firstName" name="firstName">
                        </div>
                        <div class="col-md-6">
                            <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  value="{{session('user')[0]->prezime}}"id="lastName" name="lastName">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address"  value="{{session('user')[0]->adresa}}"name="address" placeholder="Street address">
                        </div>
                    </div>


                    <div class="form-group row mb-5">
                        <div class="col-md-6">
                            <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" value="{{session('user')[0]->email}}" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone"  value="{{session('user')[0]->telefon}}" name="phone" placeholder="Phone Number">
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-md-6">


                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border">
                            @if(Session::has('cart'))
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                <th>Product</th>
                                <th>Total</th>
                                </thead>
                                <tbody>
                                @foreach($korpa as $item)
                                <tr>
                                    <td>{{$item[0]->nazivProizvoda}} <strong class="mx-2">x</strong> {{$item['kolicina']}}</td>
                                    <td>${{$item[0]->cena*$item['kolicina']}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                    <td class="text-black font-weight-bold"><strong>${{$ukupno}}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                                <div class="form-group">
                                    <input type='submit' class="btn btn-primary btn-lg py-3 btn-block" value="Place Order"/>
                                </div>

                                </form>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </form> -->
    </div>
</div>