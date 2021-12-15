@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="col-md-2">
            <br>
            <img class="card-img-top" src="{{ (!empty($user->profile_photo_path))? 
										url('upload/user_images/'.$user->profile_photo_path):
                                        url('upload/no_image.jpg') }}" style="width:150px; height:150px; border-radius:50%; margin-left:5px;" alt="User Avatar">
                                        <br><br>
                <ul class="list-group list-group-flush">
                  <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                  <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>  
                  <a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                  <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-6">

            <div class="card">
                <h3 class="text-center"><span class="text-danger">Hii...</span><strong>{{Auth::user()->name}} </strong> Change Password</h3>
                
                <div class="card-body">
                <form class="register-form outer-top-xs" role="form" method="POST" action="{{route('user.password.update')}}">
						@csrf
                        <div class="row">
                                    
                            <div class="form-group">
                                <h5>Current Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="current_password" name="oldpassword" class="form-control">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <h5>New Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="password" name="password" class="form-control"> 
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <h5>Confirm Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="password_confirmation" name="password_confirmation" data-validation-match-match="password" class="form-control"> 
                                </div>
                            </div>                                     
                              
                            <div class="form-group">
                                <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Change Password</button>
                            </div>
                        </div>
						
					</form>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection