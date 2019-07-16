@extends('templates.template')
@section('sadrzaj')
    @include('inc.logIn')
@endsection
@section('js')
    <script src={{ URL::asset("js/login.js") }}></script>
@endsection