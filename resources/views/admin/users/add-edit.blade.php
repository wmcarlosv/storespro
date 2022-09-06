@extends('layouts.contentLayoutMaster')

@section('title',$title)

@section('content')
@include('admin.layouts.messages-errors')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3><i class="fas fa-user"></i> {{ $title }}</h3>
			</div>
			@include('admin.layouts.form',['element'=>'users','id'=>@$data->id])
				<div class="card-body">
					<div class="form-group">
						<label for="rut">Rut:</label>
						<input type="text" class="form-control" name="rut" value="{{ @$data->rut }}">
					</div>
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" name="name" value="{{ @$data->name }}">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="email" value="{{ @$data->email }}">
					</div>

					@if($type == 'new')
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					@endif
				
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" maxlength="9" minlength="9" required class="form-control" value="{{ @$data->phone }}" name="phone">
					</div>
				</div>
				<div class="card-footer">
					@include('admin.layouts.buttons',['routeCancel'=>'users.index'])
				</div>
			</form>
		</div>
	</div>
</div>
@endsection