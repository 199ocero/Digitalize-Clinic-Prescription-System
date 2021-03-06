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
                            <th scope="col">First Name</th>
                            <th scope="col">Middle Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Suffix</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($patient as $patient)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$patient->first_name}}</td>
                                    <td>{{$patient->middle_name}}</td>
                                    <td>{{$patient->last_name}}</td>
                                    <td>{{$patient->suffix}}</td>
                                    <td>{{$patient->email}}</td>
                                    <td>{{$patient->created_at->format('m-d-Y')}}</td>
                                    <td style="white-space: nowrap;width:1%">
                                        <a href="{{url('clinician/patient/record/details/'.$patient->id)}}" data-toggle="tooltip" title="View Record" class="btn btn-circle btn-info text-white"><i class ="glyphicon glyphicon-folder-open"></i></a>
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