@extends('templates.template')
@section('sadrzaj')
@include('inc.cart')
@endsection
@section('js')
    <script src={{ URL::asset("js/cart.js") }}></script>
    @endsection