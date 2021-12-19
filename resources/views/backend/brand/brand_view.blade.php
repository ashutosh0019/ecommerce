@extends('admin.admin_master')
@section('admin')

<div class="container-full">
	
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			<div class="col-8">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Brand List</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                                            <thead>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Brand English</th>
                                                    <th rowspan="1" colspan="1">Brand Hindi</th>
                                                    <th rowspan="1" colspan="1">Image</th>
                                                    <th rowspan="1" colspan="1">Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>	
                                                @foreach($brand as $item)						
                                                <tr role="row" >
                                                    <td>{{$item->brand_name_en}}</td>
                                                    <td>{{$item->brand_name_hin}}</td>
                                                    <td>
                                                        <img src="{{asset($item->brand_image)}}" style="width:70px; height:40px;">
                                                    </td>
                                                    <td>
                                                        <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                        <a id="delete" href="{{route('brand.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
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

            <!-- ---------add brand ----------- -->

            <div class="col-4">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Add Brand</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							
                            <form method="post" action="{{route('brand.store')}}" enctype='multipart/form-data'>
                                @csrf
                                
                                        
                                <div class="form-group">
                                <h5>Brand Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="" name="brand_name_en" class="form-control"> 
                                        @error('brand_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                <h5>Brnad Name Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="" name="brand_name_hin" class="form-control"> 
                                        @error('brand_name_hin')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                <h5>Brand Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="" name="brand_image" class="form-control"> 
                                        @error('brand_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Brand">
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