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
                    <h4 class="box-title">Patient Information</h4>
                  </div>
                  <!-- /.box-header -->
                  <form method="POST" action="{{url('staff/patient/update/'.$patient->id)}}">
                      @csrf
                      <input type="hidden" id="role_id" class="role_id form-control" type="text" name="role_id" value="patient"/>
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{$patient->first_name}}">
                                  @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Middle Name</label>
                                  <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Middle Name" value="{{$patient->middle_name}}">
                                  @error('middle_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                              </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{$patient->last_name}}">
                                  @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Suffix (If there's any)</label>
                                  <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Enter Suffix" value="{{$patient->suffix}}">
                                  @error('suffix')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <select class="selectpicker section form-control" name="sex" id="sex" data-live-search="true" title="Select Sex">
                                            <option value="Male" {{($patient->sex == 'Male' ? 'selected':'')}}>Male</option>
                                            <option value="Female" {{($patient->sex == 'Female' ? 'selected':'')}}>Female</option>
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
                                            <option value="Married" {{($patient->civil_status == 'Married' ? 'selected':'')}}>Married</option>
                                            <option value="Single" {{($patient->civil_status == 'Single' ? 'selected':'')}}>Single</option>
                                            <option value="Divorce" {{($patient->civil_status == 'Divorce' ? 'selected':'')}}>Divorce</option>
                                            <option value="Widow" {{($patient->civil_status == 'Widow' ? 'selected':'')}}>Widow</option>
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
                                            <option value="O" {{($patient->blood_type == 'O' ? 'selected':'')}}>O</option>
                                            <option value="O+" {{($patient->blood_type == 'O+' ? 'selected':'')}}>O+</option>
                                            <option value="A+" {{($patient->blood_type == 'A+' ? 'selected':'')}}>A+</option>
                                            <option value="A-" {{($patient->blood_type == 'A-' ? 'selected':'')}}>A-</option>
                                            <option value="B+" {{($patient->blood_type == 'B+' ? 'selected':'')}}>B+</option>
                                            <option value="B-" {{($patient->blood_type == 'B-' ? 'selected':'')}}>B-</option>
                                            <option value="AB+" {{($patient->blood_type == 'AB+' ? 'selected':'')}}>AB+</option>
                                            <option value="AB-" {{($patient->blood_type == 'AB-' ? 'selected':'')}}>AB-</option>
                                        </select>
                                        @error('blood_type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input class="form-control" type="date" id="birthdate" name="birthdate" value="{{$patient->birthdate}}">
                                        @error('birthdate')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Weight (Kilograms)</label>
                                  <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Weight" value="{{$patient->weight}}">
                                  @error('weight')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Height (Meters)</label>
                                  <input type="text" class="form-control" name="height" id="height" placeholder="Enter Height" value="{{$patient->height}}">
                                  @error('height')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{$patient->email}}">
                                  @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Contact Number</label>
                                  <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number" value="{{$patient->contact_number}}">
                                  @error('contact')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{$patient->address}}">
                                @error('address')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer text-right">
                          <a href="{{route('view.staff.patient')}}" class="btn btn-rounded btn-danger btn-outline mr-1">
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