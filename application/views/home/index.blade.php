@layout('templates.main')

@section('main')
{{ Form::open('/') }}

		<!-- title field -->
		<p>{{ Form::label('thwip', 'Enter your Thwip code') }}</p>
		{{ $errors->first('thwip', '<p class="error">:message</p>') }}
		<p>{{ Form::text('thwip', null, array('id' => 'thwipbox', 'size' => '5', 'maxlength' =>'5', 'autocomplete' => 'off')) }}</p>

		<!-- submit button -->
		<p>{{ Form::submit('thwip me') }}</p>

{{ Form::close() }}
@endsection