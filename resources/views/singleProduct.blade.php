@extends('templates.template')
@section('sadrzaj')
  @include('inc.singleProduct')
@endsection
@section('js')
  <script src={{ URL::asset("js/singleProduct.js") }}></script>
@endsection