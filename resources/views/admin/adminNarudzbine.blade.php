@extends('templates.adminTemplate')
@section('sadrzaj')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All orders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Orders
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Phone number</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Time of order</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($narudzbine as $order)
                        <tr class="odd gradeX">
                            <td>{{$order->ime}}</td>
                            <td>{{$order->prezime}}</td>
                            <td>{{$order->adresa}}</td>
                            <td class="center">{{$order->telefon}}</td>
                                @foreach($proizvodi as $proizvod)
                                    @if($order->proizvodId==$proizvod->proizvodId)
                                    <td class="center">{{$proizvod->nazivProizvoda}}</td>
                                @endif
                            @endforeach
                            <td class="center">{{$order->kolicina}}</td>
                            <td class="center">{{$order->cena}}$</td>
                            <td class="center">{{date('d.m.Y h:i:s',$order->vreme)}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="ispisiOvde" class="row">

                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    @endsection