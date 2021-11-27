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
                    <h4 class="box-title">Clinician Credentials</h4>
                  </div>
                  <!-- /.box-header -->
                  <form method="POST" action="{{url('admin/clinician/update/'.$clinician->id)}}">
                      @csrf
                      <input type="hidden" id="role_id" class="role_id form-control" type="text" name="role_id" value="clinician"/>
                      <div class="box-body">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username_id" placeholder="Enter Username" value="{{$clinician->username}}">
                                @error('username')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" id="email" :value="old('email')" placeholder="Enter Email" value="{{$clinician->email}}">
                              @error('email')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
                          <a href="{{route('view.admin.clinician')}}" class="btn btn-rounded btn-danger btn-outline mr-1">
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