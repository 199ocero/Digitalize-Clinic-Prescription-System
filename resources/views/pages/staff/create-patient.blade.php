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
                    <h4 class="box-title">Patient Registration</h4>
                  </div>
                  <!-- /.box-header -->
                  <form method="POST" action="{{route('patient.add')}}">
                      @csrf
                      <input type="hidden" id="role_id" class="role_id form-control" type="text" name="role_id" value="patient"/>
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                                  @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Middle Name</label>
                                  <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Enter Middle Name">
                                  @error('middle_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                              </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                                  @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Suffix (If there's any)</label>
                                  <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Enter Suffix">
                                  @error('suffix')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <select class="selectpicker section form-control" name="sex" id="sex" data-live-search="true" title="Select Sex">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
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
                                            <option value="Married">Married</option>
                                            <option value="Single">Single</option>
                                            <option value="Divorce">Divorce</option>
                                            <option value="Widow">Widow</option>
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
                                            <option value="O">O</option>
                                            <option value="O+">O+</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                        @error('blood_type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input class="form-control" type="date" id="birthdate" name="birthdate">
                                        @error('birthdate')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Weight (Kilograms)</label>
                                  <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter Weight">
                                  @error('weight')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Height (Meters)</label>
                                  <input type="number" class="form-control" name="height" id="height" placeholder="Enter Height">
                                  @error('height')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                                  @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Contact Number</label>
                                  <input onkeypress="return onlyNumberKey(event)" type="tel" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number">
                                  @error('contact')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
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
<script>
function onlyNumberKey(evt) {
      
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
</script>
@endsection