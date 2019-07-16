@extends('templates.template')
@section('sadrzaj')
    @include('inc.women')
@endsection
@section('search')
    <form action="" class="site-block-top-search">
        <span class="icon icon-search2"></span>
        <input type="text" class="form-control border-0" id="searchProducts" placeholder="Search for products">
    </form>
@endsection
@section('js')
    <script src={{ URL::asset("js/women.js") }}></script>
@endsection