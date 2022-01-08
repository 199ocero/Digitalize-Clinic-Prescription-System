@extends('pages.master.master')
@section('index')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Profile Information</h4>
                  </div>
                  <!-- /.box-header -->
                  <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" id="role_id" class="role_id form-control" type="text" name="role_id" value="clinician"/>
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{$clinician->first_name}}">
                                  @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Middle Name</label>
                                  <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Middle Name" value="{{$clinician->middle_name}}">
                                  @error('middle_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                              </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{$clinician->last_name}}">
                                  @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Suffix (If there's any)</label>
                                  <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Enter Suffix" value="{{$clinician->suffix}}">
                                  @error('suffix')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <select class="selectpicker section form-control" name="sex" id="sex" data-live-search="true" title="Select Sex">
                                            <option value="Male" {{($clinician->sex == 'Male' ? 'selected':'')}}>Male</option>
                                            <option value="Female" {{($clinician->sex == 'Female' ? 'selected':'')}}>Female</option>
                                        </select>
                                        @error('sex')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Civil Status</label>
                                        <select class="selectpicker section form-control" name="civil_status" id="civil_status" data-live-search="true" title="Select Civil Status">
                                            <option value="Married" {{($clinician->civil_status == 'Married' ? 'selected':'')}}>Married</option>
                                            <option value="Single" {{($clinician->civil_status == 'Single' ? 'selected':'')}}>Single</option>
                                            <option value="Divorce" {{($clinician->civil_status == 'Divorce' ? 'selected':'')}}>Divorce</option>
                                            <option value="Widow" {{($clinician->civil_status == 'Widow' ? 'selected':'')}}>Widow</option>
                                        </select>
                                        @error('civil_status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Type</label>
                                        <select class="selectpicker section form-control" name="blood_type" id="blood_type" data-live-search="true" title="Select Blood Type">
                                            <option value="O" {{($clinician->blood_type == 'O' ? 'selected':'')}}>O</option>
                                            <option value="O+" {{($clinician->blood_type == 'O+' ? 'selected':'')}}>O+</option>
                                            <option value="A+" {{($clinician->blood_type == 'A+' ? 'selected':'')}}>A+</option>
                                            <option value="A-" {{($clinician->blood_type == 'A-' ? 'selected':'')}}>A-</option>
                                            <option value="B+" {{($clinician->blood_type == 'B+' ? 'selected':'')}}>B+</option>
                                            <option value="B-" {{($clinician->blood_type == 'B-' ? 'selected':'')}}>B-</option>
                                            <option value="AB+" {{($clinician->blood_type == 'AB+' ? 'selected':'')}}>AB+</option>
                                            <option value="AB-" {{($clinician->blood_type == 'AB-' ? 'selected':'')}}>AB-</option>
                                        </select>
                                        @error('blood_type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input class="form-control" type="date" id="birthdate" name="birthdate" value="{{$clinician->birthdate->format('Y-m-d')}}">
                                        @error('birthdate')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Weight (Kilograms)</label>
                                  <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter Weight" value="{{$clinician->weight}}">
                                  @error('weight')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Height (Meters)</label>
                                  <input type="number" class="form-control" name="height" id="height" placeholder="Enter Height" value="{{$clinician->height}}">
                                  @error('height')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{$clinician->email}}">
                                  @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Contact Number</label>
                                  <input type="tel" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number" value="{{$clinician->contact_number}}" maxlength="11">
                                  @error('contact')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Clinic Name</label>
                                  <input type="text" class="form-control" name="clinic_name" id="clinic_name" placeholder="Enter Clinic Name" value="{{$clinician->clinic_name}}">
                                  @error('clinic_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{$clinician->address}}">
                                  @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Profile Photo</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <span class="mt-3 badge badge-xl badge-info">Note: The image dimension should be 416 x 416 pixels and 1 megabyte of size.</span>
                                  @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <div>
                                        <img id="showImage" src="{{!empty($clinician->image)?url('upload/user_images/'.$clinician->image):url('upload/no_image.jpg')}}" style="width: 100px; height:100px">
                                    </div>
                                    
                                </div>
                            </div>

                            
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
                          <a href="{{route('view.profile.clinician')}}" class="btn btn-rounded btn-danger btn-outline mr-1">
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

<script>
    $(document).ready(function () {
        $('#image').change(function (e)
         { 
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
         })
    });
</script>
<!-- /.content-wrapper -->
@endsection