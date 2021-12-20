@extends('admin.admin_master')
@section('admin')

<div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		    <div class="row">
			  
			 
                <!-- /.col -->

                <!-- ---------edit category ----------- -->

                <div class="col-12">
                    <div class="box">
                        <div class="box-header">						
                            <h4 class="box-title">Edit Category</h4>
                        </div>
                        <div class="box-body">
                            
                                <form  method="post" action="{{route('category.update', $category->id)}}">
                                    @csrf

                                  
                                    <div class="row">
                                        <div class="col-md-6">      
                                            <div class="form-group">
                                                <h5>Category Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="" name="category_name_en" class="form-control" value="{{$category->category_name_en}}"> 
                                                    @error('category_name_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Category Name Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="" name="category_name_hin" class="form-control" value="{{$category->category_name_hin}}"> 
                                                    @error('category_name_hin')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Category Icon<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="image" name="category_icon" class="form-control" value="{{$category->category_icon}}" > 
                                                    
                                                    @error('category_icon')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                    </div>    
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update category">
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


@endsection