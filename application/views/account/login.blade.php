@layout('templates.main')

@section('main')
{{ Form::open('login') }}

	@if (Session::has('login_errors'))
		<span class="error">Username or password incorrect</span>
	@endif

	<p>{{ Form::label('email', 'Email') }}</p>
	<p>{{ Form::text('email') }}</p>

	<p>{{ Form::label('password', 'Password') }}</p>
	<p>{{ Form::password('password') }}</p>

	<p>{{ Form::submit('Login') }}</p>

{{ Form::close() }}
@endsection