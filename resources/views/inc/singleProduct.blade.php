<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img width="500px" src={{ URL::asset("images/$proizvod->slika") }} alt="{{$proizvod->alt}}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="text-black">{{$proizvod->nazivProizvoda}}</h2>
                <p><strong class="text-primary h4">${{$proizvod->cena}}</strong></p>
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" id="kolicinaProizvoda" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                    </div>

                </div>
                <p id="pIznadA"><a href="#" id="{{$proizvod->proizvodId}}" data-id="{{$proizvod->proizvodId}}" class="add-to-cart buy-now btn btn-sm btn-primary">Add To Cart</a></p>

            </div>
        </div>
    </div>
</div>

@include('inc.featuredProducts')