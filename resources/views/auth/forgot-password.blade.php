@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forgot Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container" >
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
				<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="">Forgot Password</h4>
					<p class="">Forgot Your Password? NO Problem</p>
					


						

					<form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.email') }}">
						@csrf
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
							<input type="email" id="email" name="email" class="form-control unicase-form-control text-input" >
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>
						
						
					
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">EMAIL PASSWORD RESET LINK</button>

						
					</form>	
    
					
					
				</div>
				<!-- forgot passworg-->
		
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')

	</div>        <!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection