@extends('layouts.app')


@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<h1>Servidores</h1>
	<table class="table table-condensed table-striped">
	
	@foreach ($servers as $serve) 
		<tr>
			<td> {{$serve -> servidor}}</td>
			<td> {{$serve -> ip}}</td>
			<td> @if($serve->status == "0")
					Livre
				 @else
					Ocupado
					@endif	
			</td>
			<td> 
				<?php $user =  DB::table('users')->where('id','=',$serve->id_usuario)->get() ;?>

				@foreach ($user as $u)
						{{$u -> name}}
				@endforeach	
			 </td>
		</tr>
	@endforeach
	</table>
</div>
@stop