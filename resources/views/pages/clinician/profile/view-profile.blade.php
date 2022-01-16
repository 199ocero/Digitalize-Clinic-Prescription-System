@extends('pages.master.master')
@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
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
                          <h3 class="text-secondary mb-20">Clinician</h3>
                        </div>
                        <div class="col-12">
                          <div class="pb-15">						
                            <div class="user-social-acount">
                              <button class="btn btn-circle btn-social-icon btn-facebook" style="margin: 10px"><i class="fa fa-facebook"></i></button>
                              <button class="btn btn-circle btn-social-icon btn-twitter" style="margin: 10px"><i class="fa fa-twitter"></i></button>
                              <button class="btn btn-circle btn-social-icon btn-instagram" style="margin: 10px"><i class="fa fa-instagram"></i></button>
                            </div>
                          </div>
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
                              <p><strong class="text-secondary">First Name :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->first_name}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Middle Name :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->middle_name}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Last Name :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->last_name}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Suffix :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->suffix}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Sex :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->sex}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Civil Status :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->civil_status}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Birth Date :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              @if ($clinician->birthdate!=null)
                              {{$clinician->birthdate->format('F j, Y')}}
                              @endif
                              
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Weight :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->weight}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Height :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->height}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Blood Type :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->blood_type}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Contact Number :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->contact_number}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">PTR Number :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->ptr_number}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">License Number :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->license_number}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Email :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->email}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Clinic :</strong></p>
                            </div>
                            <div class="col-sm-6 text-secondary">
                              {{$clinician->clinic_name}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-6">
                              <p><strong class="text-secondary">Address :</strong></p>
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