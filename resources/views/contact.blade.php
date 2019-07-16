@extends('templates.template')
@section('sadrzaj')
@include('inc.contactForm')
@endsection
@section('js')
    <script src={{ URL::asset("js/contact.js") }}></script>
    @endsection