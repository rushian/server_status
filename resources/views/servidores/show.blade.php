@extends('layout.app')


@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1> {{ $servidor->title }}</h1>
		<ul class="list-group">
			 @foreach ($servidor->notes as $servidor)
			 <li class="list-group-item"><a href='/notes/{{$note->id}}/edit'>{{ $note->body }}</a>
				<a href="#" class="pull-right">{{$note->user->name}}</a>
			 </li>
			 @endforeach
	 	</ul>
	 	<h3>Adicione uma nota nova</h3>
	 	<form method="POST" action="/cards/{{ $servidor->id }}/notes">
			{{ csrf_field() }}
	 		<div class="form-group">
	 		<textarea name="body" class="form-control"></textarea>
	 		</div>
	 		<div class="form-group">
	 		<button type="submit" class="btn btn-primary">Adicionar nota</button>
	 		</div>

	 	</form>

		<!--\{\{var_dump($errors)\}\}-->
		@if (count($errors))
			<ul>
				@foreach($errors->all() as $error)
					<li>
						{{ str_replace("body", "nota", $error) }}
					</li>
				@endforeach
			</ul>
		@endif
 	</div>
 </div>
@stop