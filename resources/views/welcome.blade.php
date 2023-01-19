@extends('layouts.app')

@section('title','Welcome Laravel')

@section('contents')
<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
    <h1> {{ __('main.welcome') }} Form Etudiants</h1>
    <table>
        <tr>
          <td>
						<form action="{{ route('store') }}" method="POST">
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
							<input type="submit" value="Insert">
						</form>
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
    
    <br>

    <form action="" method="get">
        <center>
        <table border="1" style="width:90%;text-align:center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th colspan="2"></th>
            </tr>
            @foreach ($etudiants as $et)
            <tr>
                <td>{{ $et->id }}</td>
                <td>{{ $et->name }}</td>
                <td>{{ $et->email }}</td>
                <td>
                    <form action="{{ route('delete',$et->id) }}" method="POST">
                        @csrf
                        <input name="delete" type="submit" value="Delete">
                    </form>
                </td>              
                <td>
                    <a href="update/{{ $et->id }}"> Update  </a>
                </td>                   
            </tr> 
            @endforeach
            
        </table>
        </center>
    </form>
@endsection