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
					<form method="post" action="{{route('update.change.password')}}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
						<div class="col-12">	
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="password" name="oldpassword" id="current_password" value="" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="password" name="password" id="password" value="" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="password" name="password_confirmation" id="password_confirmation" value="" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                </div>

                            </div>	               
						</div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Update</button>
						</div>
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

      
        @endsection