@extends('pages.master.master')
@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Create Prescription</h4>
                  </div>
                  <!-- /.box-header -->
                  <form method="POST" action="{{url('clinician/patient/prescription/add/'.$id)}}">
                      @csrf
                      <input type="hidden" id="role_id" class="role_id form-control" type="text" name="role_id" value="patient"/>
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Medicine</label>
                                  <input type="text" class="form-control" name="medicine" id="medicine" placeholder="Enter Medicine Name">
                                  @error('medicine')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Brand</label>
                                  <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter Brand Name">
                                  @error('brand')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Form</label>
                                        <select class="selectpicker section form-control" name="form" id="form" data-live-search="true" title="Select Form">
                                            <option value="Liquid">Liquid</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="Capsule">Capsule</option>
                                        </select>
                                        @error('form')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Frequency(Times a Day)</label>
                                      <input type="number" class="form-control" name="frequency" id="frequency" placeholder="Enter Frequency">
                                      @error('frequency')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Duration(Days)</label>
                                      <input type="number" class="form-control" name="duration" id="duration" placeholder="Enter Duration">
                                      @error('duration')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Instruction</label>
                                      <textarea id="instruction" name="instruction" class="form-control" rows="5" placeholder="Enter Instruction"></textarea>                                     
                                      @error('instruction')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                                    </div>
                                </div>
                                
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
                          <a href="{{ url()->previous() }}" class="btn btn-rounded btn-danger btn-outline mr-1">
                            <i class="ti-trash"></i> Cancel
                          </a>
                          <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                          </button>
                      </div>  
                  </form>
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