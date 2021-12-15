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
                <h3 class="text-center"><span class="text-danger">Hii...</span><strong>{{Auth::user()->name}} </strong> Update Your Profile</h3>
                
                <div class="card-body">
                <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
						@csrf

						<div class="form-group">
							<label class="info-title">Name </label>
							<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" >
							
						</div>
						<div class="form-group">
							<label class="info-title">Email Address </label>
							<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" >
							
						</div>
						
						<div class="form-group">
							<label class="info-title">Phone Number </label>
							<input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
							
						</div>

                        <div class="form-group">
							<label class="info-title">User Image </label>
							<input type="file" class="form-control" id="profile_photo_path" name="profile_photo_path" >
							
						</div>

						<div class="form-group">
                            <button type="submit" class="btn-upper btn btn-danger checkout-page-button">Update Profile</button>
                        </div>
						
					</form>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection