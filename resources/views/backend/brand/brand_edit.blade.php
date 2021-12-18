@extends('admin.admin_master')
@section('admin')

<div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		    <div class="row">
			  
			 
                <!-- /.col -->

                <!-- ---------edit brand ----------- -->

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">						
                            <h4 class="box-title">Edit Brand</h4>
                        </div>
                        <div class="box-body">
                            
                                <form  method="post" action="{{route('brand.update', $brand->id)}}" enctype="multipart/form-data">
                                    @csrf

                                    <!-- <input type="hidden" name="id" value="{{$brand->id}}"> -->
                                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}"> 
                                    
                                    <div class="row">
                                        <div class="col-md-6">      
                                            <div class="form-group">
                                                <h5>Brand Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}"> 
                                                    @error('brand_name_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Brnad Name Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="" name="brand_name_hin" class="form-control" value="{{$brand->brand_name_hin}}"> 
                                                    @error('brand_name_hin')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Brand Image<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" id="image" name="brand_image" class="form-control"> 
                                                    
                                                    @error('brand_image')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <img id="showImage" src="{{asset($brand->brand_image)}}"
                                                style="width:100px; height:100px;"  alt="Image">
                                        </div>
                                        
                                    </div>    
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Brand">
                                    </div> 
                                        

                                </form>                                                             
    
                            
                        </div>
                    </div>
                </div>
		    </div>
		  <!-- /.row -->
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