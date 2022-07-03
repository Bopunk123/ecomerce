@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Form Validation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Forms</li>
								<li class="breadcrumb-item active" aria-current="page">Form Validation</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Form Validation</h4>
			  <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
						<div class="col-12">	
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Admin Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" value="{{$adminData->name}}" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Email Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" value="{{$adminData->email}}" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
                                </div>
                            </div>	
                            

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Admin Image</h5>
                                    <div class="controls">
                                        <input type="file" name="admin_profile_image" id="admin_profile_image" class="form-control"> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <h5></h5>
                                    <img src="{{(!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg')}}" width="100px" height="100px" id="image" alt="Card image cap">
                                </div>    
                            </div>
                        
                        </div>


                        

        
							
		
						</div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Update</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>

        <script>
    $(document).ready(function () {
        $('#admin_profile_image').change((e)=>{
            var reader = new FileReader;
            reader.onload = function(e){
                $('#image').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>
        @endsection