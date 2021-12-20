@extends('admin.admin_master')
@section('admin')

<div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			<div class="col-8">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Category List</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                                            <thead>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Category Icon</th>
                                                    <th rowspan="1" colspan="1">Category English</th>
                                                    <th rowspan="1" colspan="1">Category Hindi</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>	
                                                @foreach($category as $item)						
                                                <tr role="row" >
                                                    <td><span><i class="{{$item->category_icon}}"></i></span> </td>
                                                    <td>{{$item->category_name_en}}</td>
                                                    <td>{{$item->category_name_hin}}</td>
                                                    
                                                    <td>
                                                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                        <a id="delete" href="{{route('category.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
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

            <!-- ---------add category ----------- -->

            <div class="col-4">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Add Category</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							
                            <form method="post" action="{{route('category.store')}}" >
                                @csrf
                                
                                        
                                <div class="form-group">
                                <h5>Category Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="" name="category_name_en" class="form-control"> 
                                        @error('category_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                <h5>Category Name Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="" name="category_name_hin" class="form-control"> 
                                        @error('category_name_hin')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                <h5>Category Icon<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="" name="category_icon" class="form-control"> 
                                        @error('category_icon')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Category">
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