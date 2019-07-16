@extends('templates.adminTemplate')
@section('sadrzaj')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users Change</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Last name</th>
                            <th>Address</th>
                            <th>Phone number</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Date of registration</th>
                            <th>Acctive</th>
                            <th>Uloga</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($korisnici as $user)
                        <tr class="odd gradeX">
                            <td>{{$user->korisnikId}}</td>
                            <td>{{$user->ime}}</td>
                            <td>{{$user->prezime}}</td>
                            <td class="center">{{$user->adresa}}</td>
                            <td class="center">{{$user->telefon}}</td>
                            <td class="center">{{$user->email}}</td>
                            <td class="center">{{$user->username}}</td>
                            <td class="center">{{date('d.m.Y',$user->vremeRegistracije)}}</td>
                            <td class="center">
                                @if($user->aktivan==1)
                                aktivan
                            @else
                                nije aktivan
                                    @endif
                            </td>
                            @foreach($uloge as $u)
                                @if($u->ulogaId==$user->ulogaId)
                            <td class="center">{{$u->nazivUloge}}</td>
                                @endif

                            @endforeach
                            <td><input class="btn btn-primary btn-md user-update" data-id="{{$user->korisnikId}}" type="button" value="update"/> &nbsp;
                                <input class="btn btn-danger btn-md user-delete" data-id="{{$user->korisnikId}}" type="button" value="delete"/></td>
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