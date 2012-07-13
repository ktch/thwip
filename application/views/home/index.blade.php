<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Thwip.me anywhere</title>
	<meta name="viewport" content="width=device-width">
</head>
<body>

{{ Form::open() }}

		<!-- title field -->
		<p>{{ Form::label('thwip', 'Enter your Thwip code') }}</p>
		{{ $errors->first('thwip', '<p class="error">:message</p>') }}
		<p>{{ Form::text('thwip') }}</p>

		<!-- submit button -->
		<p>{{ Form::submit('thwip me') }}</p>

{{ Form::close() }}

</body>
</html>