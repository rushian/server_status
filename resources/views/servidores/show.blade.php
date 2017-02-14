@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-uppercase">Servidores - {{  date("d-m-Y H:i:s") }}</div>
                <div class="panel-body">
					<div class="row">
					    <div class="col-lg-10 col-md-offset-1 margin-tb">
					        <div class="pull-right">
					            <a class="btn btn-success btn-xs" href="servidores.create"> Cadastrar novo servidor</a>
					        </div>
					    </div>
					</div>	
					<br>
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
								<td class="text-uppercase"> {{$serve -> servidor}}</td>
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
							 		<a class="btn btn-xs btn-warning" href="/servidores/{{ $serve->id }}/edit">Editar</a>
								 </td>
								 <td>
									<form  class="form-inline" method="POST" action="/servidores/{{ $serve->id }}" onsubmit="confirm('Tem certeza que deseja excluir?')">
									{{ method_field('DELETE') }}
							 		<input type="hidden" name="_token" value="{{ csrf_token() }}">
							 		<button type="submit" class="btn btn-xs btn-danger"'>Excluir</button>
									</form>
									

								 </td>
							</tr>
						@endforeach
						</table>
					
					</div>
					<div class="col-md-12">
					*Não há confirmação para exclusão
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop