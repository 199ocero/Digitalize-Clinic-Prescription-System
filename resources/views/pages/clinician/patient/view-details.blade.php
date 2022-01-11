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
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="glyphicon glyphicon-edit"></i> Edit Record
                        </button>
                    </div>
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Symptoms</h5>
                                  <textarea id="symptoms" name="symptoms" class="form-control" rows="5"></textarea>
                              </div>
                              <div class="form-group">
                                <h5>Diagnosis</h5>
                                <textarea id="diagnosis" name="diagnosis" class="form-control" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <h5>Test Results</h5>
                                  <div class="controls">
                                  <div class="demo-checkbox">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_1" name="test[]" value="Echocardiogram('echo')" class="filled-in chk-col-primary">
                                          <label for="checkbox_1">Echocardiogram('echo')</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_2" name="test[]" value="Electrocardiogram(ECG or EKG)" class="filled-in chk-col-primary">
                                          <label for="checkbox_2">Electrocardiogram(ECG or EKG)</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_3" name="test[]" value="Chest X-ray" class="filled-in chk-col-primary">
                                          <label for="checkbox_3">Chest X-ray</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_4" name="test[]" value="Blood Test(CBC)" class="filled-in chk-col-primary">
                                          <label for="checkbox_4">Blood Test(CBC)</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_5" name="test[]" value="Urinalysis(Urine Test)" class="filled-in chk-col-primary">
                                          <label for="checkbox_5">Urinalysis(Urine Test)</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_6" name="test[]" value="Ultrasound" class="filled-in chk-col-primary">
                                          <label for="checkbox_6">Ultrasound</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_7" name="test[]" value="CT Scan" class="filled-in chk-col-primary">
                                          <label for="checkbox_7">CT Scan</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_8" name="test[]" value="Stool Test" class="filled-in chk-col-primary">
                                          <label for="checkbox_8">Stool Test</label>
                                      </fieldset>
                                  </div>
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