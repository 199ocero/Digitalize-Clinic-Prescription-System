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
                    <h4 class="box-title">Change Password</h4>
                  </div>
                  <!-- /.box-header -->
                  <form method="POST" action="{{ route('password.update.staff') }}">
                    @csrf

                      <div class="box-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Current Password</label>
                              <input id="current_password" type="password" class="form-control" name="current_password" placeholder="Enter Current Password">
                              @error('current_password')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                              </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>New Password</label>
                                  <input id="password" type="password" class="form-control" name="password" placeholder="Enter New Password">
                                  @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                              </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            </div>
                            
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
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