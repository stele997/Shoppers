<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4"><h2 class="text-black h5">Man</h2></div>

                    </div>
                </div>
                <div id="data">
                    @include('inc.listaProizvodaZaShop')
                </div>
            </div>

            <div class="col-md-3 order-1 mb-5 mb-md-0">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('inc.categories')
            </div>
        </div>

    </div>
</div>