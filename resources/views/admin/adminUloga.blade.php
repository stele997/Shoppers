@extends('templates.adminTemplate')
@section('sadrzaj')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Change</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Products
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Role Id</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($uloge as $prod)
                                <tr class="odd gradeX">
                                    <td>{{$prod->ulogaId}}</td>
                                    <td>{{$prod->nazivUloge}}</td>
                                    <td> &nbsp;
                                        <input class="btn btn-danger btn-md role-delete" data-id="{{$prod->ulogaId}}" type="button" value="delete"/></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 id="naslovForma">Add new role</h1>
                        <form id="forma" role="form">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="naziv" class="form-control" placeholder="Enter role name">
                            </div>
                            <div class="form-group">
                                <input type="button" id="insert-role" class="btn btn-primary btn-md" value="INSERT">
                            </div>
                            <label id="meni-insert-result"> </label>

                        </form>
                    </div>

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
@endsection
