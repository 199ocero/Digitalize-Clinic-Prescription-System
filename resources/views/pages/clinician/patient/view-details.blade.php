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
                        <h3 class="box-title">Record Details</h3>
                        
                        <a href="{{url('clinician/patient/record/edit/'.$appointment->id)}}" class="btn btn-primary float-right">
                            <i class="glyphicon glyphicon-edit"></i> Edit Record
                        </a>
                        <a href="{{url('clinician/patient/prescription/view/'.$appointment->id)}}" style="margin-right: 15px" class="btn btn-info float-right">
                            <i class="glyphicon glyphicon-edit"></i> Create e-Prescription
                        </a>
                    </div>
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Symptoms</h5>
                                  <textarea id="symptoms" name="symptoms" class="form-control" rows="5" readonly>{{$appointment->symptoms}}</textarea>
                                  <p class="text-warning" style="margin-top: 5px">Note: You can type none if there's no symptoms.</p>
                                </div>
                              <div class="form-group">
                                <h5>Diagnosis</h5>
                                <textarea id="diagnosis" name="diagnosis" class="form-control" rows="5" readonly>{{$appointment->diagnosis}}</textarea>
                                <p class="text-warning" style="margin-top: 5px">Note: You can type none if there's no diagnosis.</p>
                                
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Test Results</h5>
                                  <div class="controls">
                                  <div class="demo-checkbox">
                                      <fieldset>
                                          <input disabled {{($echocardiogram== '1' ? 'checked':'')}} type="checkbox" id="checkbox_1" name="test[]" value="Echocardiogram('echo')" class="filled-in chk-col-primary">
                                          <label for="checkbox_1">Echocardiogram('echo')</label>
                                      </fieldset>
                                      <fieldset>
                                          <input disabled {{($electrocardiogram== '1' ? 'checked':'')}} type="checkbox" id="checkbox_2" name="test[]" value="Electrocardiogram(ECG or EKG)" class="filled-in chk-col-primary">
                                          <label for="checkbox_2">Electrocardiogram(ECG or EKG)</label>
                                      </fieldset>
                                      <fieldset>
                                          <input disabled {{($x_ray== '1' ? 'checked':'')}} type="checkbox" id="checkbox_3" name="test[]" value="Chest X-ray" class="filled-in chk-col-primary">
                                          <label for="checkbox_3">Chest X-ray</label>
                                      </fieldset>
                                      <fieldset>
                                          <input disabled {{($cbc== '1' ? 'checked':'')}} type="checkbox" id="checkbox_4" name="test[]" value="Blood Test(CBC)" class="filled-in chk-col-primary">
                                          <label for="checkbox_4">Blood Test(CBC)</label>
                                      </fieldset>
                                      <fieldset>
                                          <input disabled {{($urinalysis== '1' ? 'checked':'')}} type="checkbox" id="checkbox_5" name="test[]" value="Urinalysis(Urine Test)" class="filled-in chk-col-primary">
                                          <label for="checkbox_5">Urinalysis(Urine Test)</label>
                                      </fieldset>
                                      <fieldset>
                                          <input disabled {{($ultrasound== '1' ? 'checked':'')}} type="checkbox" id="checkbox_6" name="test[]" value="Ultrasound" class="filled-in chk-col-primary">
                                          <label for="checkbox_6">Ultrasound</label>
                                      </fieldset>
                                      <fieldset>
                                          <input disabled {{($ct_scan== '1' ? 'checked':'')}} type="checkbox" id="checkbox_7" name="test[]" value="CT Scan" class="filled-in chk-col-primary">
                                          <label for="checkbox_7">CT Scan</label>
                                      </fieldset>
                                      <fieldset>
                                          <input disabled {{($stool_test== '1' ? 'checked':'')}} type="checkbox" id="checkbox_8" name="test[]" value="Stool Test" class="filled-in chk-col-primary">
                                          <label for="checkbox_8">Stool Test</label>
                                      </fieldset>
                                  </div>
                                  <div class="help-block"></div></div> <p class="text-warning">Note: You can check 1 or more test results and leave blank if none.</p> </div>

                          </div>

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