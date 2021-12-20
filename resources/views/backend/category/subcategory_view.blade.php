@extends('admin.admin_master')
@section('admin')

<div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			<div class="col-8">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Sub Category List</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                                            <thead>
                                                <tr>
                                                    <th>Category Name</th>
                                                    <th>Sub Category English</th>
                                                    <th>Sub Category Hindi</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>	
                                                @foreach($subcategory as $item)						
                                                <tr role="row" >
                                                    <td>{{$item->category_id}}</td>
                                                    <td>{{$item->subcategory_name_en}}</td>
                                                    <td>{{$item->subcategory_name_hin}}</td>
                                                    
                                                    <td>
                                                        <a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                        <a id="delete" href="{{route('subcategory.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                                                    </td>
                                                   
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                            
							            </table>
                        
                        
                                    </div>
                                </div>                
                    
                        
                            </div>
						</div>
					</div>
				</div>
			</div>		
			<!-- /.col -->

            <!-- ---------add subcategory ----------- -->

            <div class="col-4">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Add Sub Category</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							
                            <form method="post" action="{{route('subcategory.store')}}" >
                                @csrf
                                
                                
                                <div class="form-group">
                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    <div class="help-block"></div></div>
                                </div>

                                <div class="form-group">
                                <h5>Sub Category Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="" name="subcategory_name_en" class="form-control"> 
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                <h5>Sub Category Name Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="" name="subcategory_name_hin" class="form-control"> 
                                        @error('subcategory_name_hin')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                
                                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Sub Category">
                                </div>
                                        
                                    

                            </form>              

                            </div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

@endsection