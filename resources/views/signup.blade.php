@extends('layouts.app')

@section('title','Sign Up')

@section('contents')
<form action="{{ route('login') }}" method="post">
	@csrf
	<div class="container mt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6">
				<div class="card px-5 py-5" id="form1">
					<div class="form-data" v-if="!submitted">
						<div class="forms-inputs mb-4"> 
							<span>Email or username</span> 
							<input type="text" name="email" >
							<div class="invalid-feedback">A valid email is required!</div>
						</div>
						<div class="forms-inputs mb-4"> 
							<span>Password</span> 
							<input type="password" name="password" >
							<div class="invalid-feedback">Password must be 8 character!</div>
						</div>
						<div class="mb-3"> 
							<button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Login</button> 
						</div>
					</div>
					<div class="success-data" v-else>
						<div class="text-center d-flex flex-column">
							<i class=''><a href="/register">Register</a></i> 
							<span style="color:rgb(255, 255, 255)" class="text-center fs-1">
								You have been logged in <br> Successfully
							</span> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection