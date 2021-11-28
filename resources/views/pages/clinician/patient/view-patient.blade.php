@extends('pages.master.master')
@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            
           <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title">Patient Accounts</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type</th>
                            <th scope="col">Registered</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($patient as $patient)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                                    <td>{{$patient->email}}</td>
                                    <td>Patient</td>
                                    <td>{{$patient->created_at->format('F j, Y')}}</td>
                                    <td style="white-space: nowrap;width:1%">
                                        <a href="" data-toggle="tooltip" title="View Record" class="btn btn-circle btn-info text-white"><i class ="glyphicon glyphicon-info-sign"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                  </table>
                  </div>              
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->
@endsection