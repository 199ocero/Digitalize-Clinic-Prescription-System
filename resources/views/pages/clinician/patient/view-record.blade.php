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
                  <h3 class="box-title">{{$first_name->first_name}}'s Health Records</h3>
                  <a href="{{url('clinician/patient/record/add/view/'.$id)}}" class="btn btn-primary float-right"><i class="glyphicon glyphicon-plus"></i> Add Record</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($patient as $patient)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$patient->created_at->format('F j, Y')}}</td>
                                    <td>{{$patient->created_at->format('g:i A')}}</td>
                                    <td style="white-space: nowrap;width:1%">
                                        <a href="{{url('clinician/patient/record/details/view/'.$patient->id)}}" data-toggle="tooltip" title="View Details" class="btn btn-circle btn-info text-white"><i class ="glyphicon glyphicon-info-sign"></i></a>
                                        <a href="{{url('clinician/patient/record/delete/'.$patient->id.'/'.$id)}}" data-toggle="tooltip" title="Delete Appointment" id="delete" class="btn btn-circle btn-danger text-white"><i class ="glyphicon glyphicon-trash"></i></a>
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