@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Le formulaire d'envoi du message</title>
</head>
<body>

	@if (session()->has('text'))
	<p>{{ session('text') }}</p>
	@endif
	<div class="container">
		<form url="{{ route('send.message.google') }}" method="POST" >
			<label for="message" >Message</label>
			{{ @csrf_field() }}
			<p>
				<textarea name="message" id="message" rows="4" placeholder="Message à envoyer ici" ></textarea>
				{{ $errors->first('message', ":message")}}
			</p>
			<button type="submit" >Envoyer</button>
		</form>
	</div>
	

</body>
</html>
@endsection