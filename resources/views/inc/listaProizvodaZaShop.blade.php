<div id="listaProizvoda" class="row mb-5">

    @if(count($proizvodi)>0)
        @foreach($proizvodi as $proizvod)
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="/singleProduct/{{$proizvod->proizvodId}}"><img width="500px" src="images/{{$proizvod->slika}}" alt="{{$proizvod->alt}}" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="/singleProduct/{{$proizvod->proizvodId}}">{{$proizvod->nazivProizvoda}}</a></h3>
                        <p class="text-primary font-weight-bold">${{$proizvod->cena}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="row" data-aos="fade-up">
    {{$proizvodi->links()}}
</div>