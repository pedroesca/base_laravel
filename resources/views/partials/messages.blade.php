@if(count($errors)>0)
	<p></p>

	<div class="alert alert-danger alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	    <h4><i class="icon fa fa-ban"></i> Imposible guardar</h4>
	   	<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>

@endif


@if (Session::has('create'))
	<p></p>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{Session::get('create')}}</strong>
	</div>
@endif

@if (Session::has('update'))
	<p></p>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{Session::get('update')}}</strong>
	</div>
@endif


@if (Session::has('delete'))
	<p></p>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{Session::get('delete')}}</strong>
	</div>
@endif
