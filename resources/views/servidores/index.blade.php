@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-uppercase">Servidores - {{  date("d-m-Y H:i:s") }}</div>
                <div class="panel-body">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">

						<table class="table table-condensed ">
						<tr>
							<th> Servidor</th>
							<th> Ip</th>
							<th> Atualizado em</th>
							<th> Usu&aacute;rio	atual</th>
							<th>	&nbsp;	 </th>
							<th>	&nbsp;	 </th>
						</tr>

						@foreach ($servers as $serve) 
							<tr>
								<td  class="text-uppercase"> {{$serve -> servidor}}</td>
								<td> {{$serve -> ip}}</td>
								<td> 
									@if ($serve -> updated_at != null)
										{{date('d-m-Y H:i:s', strtotime($serve -> updated_at))}}
									@else
										&nbsp;
									@endif
								</td>

								<td>
									{!! $Usuario = App\User::all()->find($serve->id_usuario)->name !!}
								 
								 </td>
								 <td>
									<form  class="form-inline" method="POST" action="/servidores/{{ $serve->id }}">
									{{ method_field('PATCH') }}
							 		<input class="input-sm" type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
							 		<input class="input-sm" type="hidden" name="updated_at" value="{{ date("Y-m-d H:i:s") }}">
							 		<input class="input-sm" type="hidden" name="_token" value="{{ csrf_token() }}">
							 		<button type="submit" class="btn btn-xs btn-warning">Entrar</button>
									</form>
								 </td>
								 <td>
									<form  class="form-inline" method="POST" action="/servidores/{{ $serve->id }}">
									{{ method_field('PATCH') }}
							 		<input type="hidden" name="id_usuario" value="1">
							 		<input type="hidden" name="updated_at" value="{{ date("Y-m-d H:i:s") }}">
							 		<input type="hidden" name="_token" value="{{ csrf_token() }}">
							 		<button type="submit" class="btn btn-xs btn-success">Sair</button>
									</form>
								 </td>
							</tr>
						@endforeach
						</table>
					
					</div>
					<div class="col-md-12">
					* Antes de entrar 
					<input class="btn btn-xs btn-primary" type="button" value="atualize" onclick="window.location.reload()"> 
					o navegador
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop