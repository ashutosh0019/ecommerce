@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit your Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('admin.profile.store')}}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<h5>Name<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" class="form-control" required  value="{{ $editData->name}}"> </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<h5>Email <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="email" name="email" class="form-control"  required value="{{ $editData->email}}"> </div>
									</div>
								</div>
								<!-- <div class="col-md-6">
									<div class="form-group">
									<h5>Password Input Field <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<h5>Repeat Password Input Field <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password2" data-validation-match-match="password" class="form-control" required> </div>
									</div>
								</div> -->
								<div class="col-md-6">
									<div class="form-group">
									<h5>Profile Image<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="file" name="profile_photo_path" id="image" class="form-control"> </div>
									</div>
								</div>

								<div class="col-md-6">
									<img id="showImage" src="{{ (!empty($editData->profile_photo_path))? 
										url('upload/admin_images/'.$editData->profile_photo_path):url('upload/no_image.jpg') }}"
										style="width:100px; height:100px; border-radius: 50%;"  alt="">
								</div>
							</div>		
			
							
						</div>
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
    <!-- /.content -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection