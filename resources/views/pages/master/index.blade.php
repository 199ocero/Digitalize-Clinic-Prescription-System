@extends('pages.master.master')
@section('index')
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
            <div class="row">
                <div class="col-lg-3">
					<div class="box">
						<div class="box-body ribbon-box">
                            <div class="row">
                                <div class="col">
                                    <div class="ribbon ribbon-info">Clinician</div>
                                </div>
                                <div class="col">
                                    <span class="float-right badge badge-xl badge-info">{{$clinician}}</span>
                                    
                                </div>
                            </div>
							<p class="mb-0">The total number of DCPS-registered clinicians.</p>
						</div> <!-- end box-body-->
					</div>
				</div>
                <div class="col-lg-3">
					<div class="box">
						<div class="box-body ribbon-box">
                            <div class="row">
                                <div class="col">
                                    <div class="ribbon ribbon-info">Staff</div>
                                </div>
                                <div class="col">
                                    <span class="float-right badge badge-xl badge-info">{{$staff}}</span>
                                    
                                </div>
                            </div>
							<p class="mb-0">The total number of DCPS-registered staffs.</p>
						</div> <!-- end box-body-->
					</div>
				</div>
                <div class="col-lg-3">
					<div class="box">
						<div class="box-body ribbon-box">
                            <div class="row">
                                <div class="col">
                                    <div class="ribbon ribbon-info">Patient</div>
                                </div>
                                <div class="col">
                                    <span class="float-right badge badge-xl badge-info">{{$patient}}</span>
                                    
                                </div>
                            </div>
							<p class="mb-0">The total number of patients diagnosed in this clinic.</p>
						</div> <!-- end box-body-->
					</div>
				</div>
                <div class="col-lg-3">
					<div class="box">
						<div class="box-body ribbon-box">
                            <div class="row">
                                <div class="col">
                                    <div class="ribbon ribbon-info">e-Prescription</div>
                                </div>
                                <div class="col">
                                    <span class="float-right badge badge-xl badge-info">12</span>
                                    
                                </div>
                            </div>
							<p class="mb-0">The total number of e-Prescriptions generated using the DCPS.</p>
						</div> <!-- end box-body-->
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h4 class="box-title">Digitalize Clinic Prescription System <small class="subtitle text-warning">E-Prescription Ready that Comes in Handy</small></h4>
                      </div>
                      <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 text-justify">
                                <p>The <strong class="text-warning">Digitalized Clinic Prescription System</strong> will be built using Laravel Framework. The medication history, clinician and patient records, and prescription template features will all be available through this system. The medication history function will show clinicians the patient's previous information, such as the diagnosis the patient received in that same clinic previously. Another feature is clinician and patient records, which allows physicians to access or enter their own data records as well as patient records. Another feature is the prescription template, which allows practitioners to simply enter the essential information, such as the patient's information and the medications to be taken, along with dosage and other instructions.</p>

                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{asset('upload/dcps_logo_big.png')}}" alt="Logo" class="mx-auto">
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
@endsection