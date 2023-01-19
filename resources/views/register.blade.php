@extends('layouts.app')

@section('title','Register')

@section('contents')
<br>
<h1>Register Account</h1>
<br>
    <table>
        <tr>
          <td>
						<form action="{{ route('registerLogin') }}" method="POST">
							@csrf
							<input type="text" name="nameEt" placeholder="name">
							<br>
							@error('nameEt')
									{{ $message }}
							@enderror
							<br>
							<input type="text" name="emailEt" placeholder="email">
							<br>
							@error('emailEt')
									{{ $message }}
							@enderror
							<br>
                            <input type="password" name="passwordEt" placeholder="password">
							<br>
							@error('passwordEt')
									{{ $message }}
							@enderror
							<br>
							<button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Insert</button> 

						</form>
						<i class=''><a href="/signup">Login</a></i> 
          </td>
          <td>
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $err)
										<li>{{ $err }}</li>  
									@endforeach                
								</ul>
							</div>
						@endif
					</td>
        </tr>
    </table>
@endsection