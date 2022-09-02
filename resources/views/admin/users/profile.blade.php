@extends('layouts.contentLayoutMaster')

@section('title','Profile')

@section('content')
@include('admin.layouts.messages-errors')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3><i class="fas fa-user"></i> Profile</h3>
			</div>
			<form action="{{ route('change_profile') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group">
						<label for="rut">Rut</label>
						<input type="text" class="form-control" value="{{ Auth::user()->rut }}" name="rut">
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone">
					</div>
				</div>
				<div class="card-footer">
					@include('admin.layouts.buttons',['routeCancel'=>'dashboard'])
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3><i class="fas fa-key"></i> Change Passworsd</h3>
			</div>
			<form action="{{ route('change_password') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label for="password_confirmation">Password Confirmation</label>
						<input type="password" class="form-control" name="password_confirmation">
					</div>
				</div>
				<div class="card-footer">
					@include('admin.layouts.buttons',['routeCancel'=>'dashboard'])
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
	@include('admin.layouts.messages')
@stop