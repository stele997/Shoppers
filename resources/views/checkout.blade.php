@extends('templates.template')
@section('sadrzaj')
@include('inc.checkout')
@endsection
@section('js')
    <script src={{ URL::asset("js/checkout.js") }}></script>
    @endsection