<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.png')}}">

    <title>UPortal - Dashboard</title>
    
	<!-- Vendors Style-->
    
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<script src="https://cdn.tiny.cloud/1/ez7xvl9blyglw0lo8im3iwsh10zsljdoh19hvfu940ja9gxw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('pages.master.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('pages.master.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('index')
  <!-- /.content-wrapper -->
  @include('pages.master.body.footer')

  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	
	<!-- Vendor JS -->
  
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
  <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	
  <script src="{{asset('../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{asset('backend/js/pages/data-table.js')}}"></script>
	<script src="{{asset('backend/js/pages/jquery.toaster.js')}}"></script>
  <script src="{{asset('../assets/vendor_components/dropzone/dropzone.js')}}"></script>
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
    @if(Session::has('success'))

      $.toaster("{{Session::get('success')}}",'Success','success');
        
    @elseif(Session::has('danger'))
      $.toaster("{{Session::get('danger')}}",'Fail','danger');
    @endif
  </script>
  <script>
    $('#file_id').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });
    $('input[type=file]').change(function(){
        if($('input[type=file]').val()==''){
            $('button').attr('disabled',true)
        } 
        else{
        $('button').attr('disabled',false);
        }
    });
    $(document).ready(function(){
        elem = document.getElementById("deadline")
        var iso = new Date().toISOString();
        var minDate = iso.substring(0,16);
        // elem.value = minDate
        elem.min = minDate
    });
</script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
  <script>
    $(function(){
      $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })



      });
    });
  </script>
</body>
</html>