@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-uppercase">Editando servidor - {{$servidor->servidor}} - {{  date("d-m-Y H:i:s") }}</div>
                <div class="panel-body">
					<div class="row">
						<div class="col-md-9 col-md-offset-3">

					 	<form method="POST" action="/editarServidor/{{$servidor->id}}">
							{{ method_field('PATCH') }}
	        			<div class="row">
            				<div class="col-md-5">
							<label for="servidor" style="text-transform: uppercase;" class="label label-info">SERVIDOR:</label>
							<input type="text" name="servidor"  style="text-transform: uppercase;"  class="form-control input-sm"  maxlength="40" value="{{$servidor->servidor}}">
							</div>

            				<div class="col-md-4">
							<label for="ip" class="label label-info">IP:</label>
							<input type="text" name="ip" value="{{$servidor->ip}}" class="form-control input-sm"  maxlength="15" placeholder="0.0.0.0">

							 		
							 		<input class="input-sm" type="hidden" name="id_usuario" value="1">
							 		
							 		<input class="input-sm" type="hidden" name="updated_at" value="{{ date('Y-m-d H:i:s') }}">
							 		<input class="input-sm" type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>
					 	</div><br>
					 	<div class="row">
					 		<div class="col-lg-5">
					 			<button type="submit" class="btn btn-primary btn-xs">Salvar</button>
					 		</div>
					 	</div>
					 	</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop