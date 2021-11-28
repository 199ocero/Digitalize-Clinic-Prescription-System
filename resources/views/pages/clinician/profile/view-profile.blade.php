@extends('pages.master.master')
@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <!-- /.row -->
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black">
                      <a href="{{route('profile.edit')}}" class="btn btn-primary float-right"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                    </div>
                    <div class="widget-user-image">
                      <img class="rounded-circle" src="{{!empty($clinician->image)?url('upload/user_images/'.$clinician->image):url('upload/no_image.jpg')}}" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="description-block">
                            <h5 class="description-header">First Name</h5>
                            <span class="description-text">{{$clinician->first_name}}</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 br-1 bl-1">
                          <div class="description-block">
                            <h5 class="description-header">Middle Name</h5>
                            <span class="description-text">{{$clinician->middle_name}}</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 br-1 bl-1">
                          <div class="description-block">
                            <h5 class="description-header">Last Name</h5>
                            <span class="description-text">{{$clinician->last_name}}</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <div class="col-sm-3">
                            <div class="description-block">
                              <h5 class="description-header">Suffix</h5>
                              <span class="description-text">{{$clinician->suffix}}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    
                </div>
                <div class="box">
                  <div class="box-body box-profile">            
                    <div class="row">
                      <div class="col-12">
                          <div>
                              <p><strong class="text-warning">Sex :</strong><span class="text-gray pl-10">{{$clinician->sex}}</span></p>
                              <p><strong class="text-warning">Civil Status :</strong><span class="text-gray pl-10">{{$clinician->civil_status}}</span></p>
                              <p><strong class="text-warning">Birth Date :</strong><span class="text-gray pl-10">{{$clinician->birthdate}}</span></p>
                              <p><strong class="text-warning">Weight :</strong><span class="text-gray pl-10">{{$clinician->weight}} kg</span></p>
                              <p><strong class="text-warning">Height :</strong><span class="text-gray pl-10">{{$clinician->height}} m</span></p>
                              <p><strong class="text-warning">Blood Type :</strong><span class="text-gray pl-10">{{$clinician->blood_type}}</span></p>
                              <p><strong class="text-warning">Contact Number :</strong><span class="text-gray pl-10">{{$clinician->contact_number}}</span></p>
                              <p><strong class="text-warning">Email :</strong><span class="text-gray pl-10">{{$clinician->email}}</span></p>
                              <p><strong class="text-warning">Clinic :</strong><span class="text-gray pl-10">{{$clinician->clinic_name}}</span></p>
                              <p><strong class="text-warning">Address :</strong><span class="text-gray pl-10">{{$clinician->address}}</span></p>
                          </div>
                      </div> 
                    </div>
                  </div>
                  <!-- /.box-body -->
              </div>
            </div>
            
            
            
            
        </div> --}}
        
        <div class="row">
    
          <!--Box options!-->
            <div class="col-md-4 col-12">
              <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black">
                          <a href="{{route('profile.edit')}}" class="btn btn-primary float-right"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                      
                    </div>
                    <div class="widget-user-image">
                      <img class="rounded-circle" src="{{!empty($clinician->image)?url('upload/user_images/'.$clinician->image):url('upload/no_image.jpg')}}" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="d-flex flex-column align-items-center text-center">
                        <div class="mt-3">
                          <h5>{{$clinician->first_name}} {{$clinician->last_name}}</h5>
                          <p class="text-secondary mb-2">Clinician</p>
                        </div>
                      </div>
                      <!-- /.row -->
                    </div>
                    
                </div>
              </div>
            </div>
    
            <!--box button!-->
            <div class="col-md-8 col-12">
              <div class="box">
                <div class="box-body box-profile">            
                  <div class="row">
                    <div class="col-12">
                        <div>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Sex :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->sex}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Civil Status :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->civil_status}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Birth Date :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->birthdate}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Weight :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->weight}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Height :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->height}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Blood Type :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->blood_type}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Contact Number :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->contact_number}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Email :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->email}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Clininc :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->clinic_name}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-warning">Address :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->address}}
                            </div>
                          </div>
                            
                        </div>
                    </div> 
                  </div>
                </div>
            </div>

          </div>
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->
@endsection