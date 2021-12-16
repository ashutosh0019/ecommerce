@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			<div class="col-12">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Complex headers (rowspan and colspan)</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<div id="complex_header_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row"><div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="complex_header_length">
                                        <label>Show <select name="complex_header_length" aria-controls="complex_header" class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="complex_header_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="complex_header"></label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="complex_header" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="complex_header_info">
                                            <thead>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Name</th>
                                                    <th rowspan="1" colspan="1">Position</th>
                                                    <th rowspan="1" colspan="1">Salary</th>
                                                    <th rowspan="1" colspan="1">Office</th>
                                                    <th rowspan="1" colspan="1">Extn.</th>
                                                    <th rowspan="1" colspan="1">E-mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>							
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">AShutosh</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Name</th>
                                                    <th rowspan="1" colspan="1">Position</th>
                                                    <th rowspan="1" colspan="1">Salary</th>
                                                    <th rowspan="1" colspan="1">Office</th>
                                                    <th rowspan="1" colspan="1">Extn.</th>
                                                    <th rowspan="1" colspan="1">E-mail</th>
                                                </tr>
                                            </tfoot>
							            </table>
                        
                        
                                    </div>
                                </div>

                    
                    
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="complex_header_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="complex_header_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="complex_header_previous">
                                                    <a href="#" aria-controls="complex_header" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>                                              
                                                
                                                <li class="paginate_button page-item next" id="complex_header_next">
                                                    <a href="#" aria-controls="complex_header" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>		
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

@endsection