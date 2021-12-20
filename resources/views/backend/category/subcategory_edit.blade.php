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
                            <h4 class="box-title">Edit Sub Category</h4>
                        </div>
                        <div class="box-body">
                            
                                <form  method="post" action="{{route('subcategory.update', $subcategory->id)}}">
                                    @csrf

                                  
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <h5>Select Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}"  {{$category->id == $subcategory->category_id ? 'selected': ''}}>{{$category->category_name_en}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                <div class="help-block"></div></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">      
                                            <div class="form-group">
                                                <h5>Sub Category Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="" name="subcategory_name_en" class="form-control" value="{{$subcategory->subcategory_name_en}}"> 
                                                    @error('subcategory_name_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Sub Category Name Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" id="" name="subcategory_name_hin" class="form-control" value="{{$subcategory->subcategory_name_hin}}"> 
                                                    @error('subcategory_name_hin')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    
                                        
                                        

                                        
                                        
                                    </div>    
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Sub category">
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