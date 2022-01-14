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
                  <h3 class="box-title">Patient's e-Prescription</h3>
                  <a href="{{url('clinician/patient/prescription/add/view/'.$id)}}" class="btn btn-primary float-right"><i class="glyphicon glyphicon-plus"></i> Add Recipe</a>
                  @if (!$prescription->isEmpty())
                  <a target="_blank" href="{{url('clinician/patient/generate/prescription/'.$id)}}" class="btn btn-success float-right" style="margin-right: 15px"><i class="glyphicon glyphicon-print"></i> Generate Prescription</a>  
                  @endif
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Medicine</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Form</th>
                            <th scope="col">Frequency</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Instruction</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($prescription as $prescription)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$prescription->medicine}}</td>
                                    <td>{{$prescription->brand}}</td>
                                    <td>{{$prescription->form}}</td>
                                    <td>{{$prescription->frequency}} time/s a day</td>
                                    <td>{{$prescription->duration}} day/s</td>
                                    <td>{{$prescription->instruction}}</td>
                                    <td style="white-space: nowrap;width:1%">
                                        <a href="{{url('clinician/patient/prescription/edit/'.$prescription->id)}}" data-toggle="tooltip" title="Edit Recipe" class="btn btn-circle btn-primary text-white"><i class ="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{url('clinician/patient/prescription/delete/'.$prescription->id.'/'.$id)}}" data-toggle="tooltip" title="Delete Recipe" id="delete" class="btn btn-circle btn-danger text-white"><i class ="glyphicon glyphicon-trash"></i></a>
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