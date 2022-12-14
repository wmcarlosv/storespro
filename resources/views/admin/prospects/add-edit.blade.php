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
			@include('admin.layouts.form',['element'=>'prospects','id'=>@$data->id])
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
						<label for="social_razon">Social Razon:</label>
						<input type="text" class="form-control" name="social_razon" value="{{ @$data->social_razon }}">
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<textarea class="form-control" name="address">{{ @$data->social_razon }}</textarea>
					</div>
					<div class="form-group">
						<label for="phone">Phone:</label>
						<input type="text" maxlength="9" minlength="9" class="form-control" name="phone" value="{{ @$data->phone }}">
					</div>
					<div class="form-group">
						<label for="contact_name">Contact Name:</label>
						<input type="text" class="form-control" name="contact_name" value="{{ @$data->contact_name }}">
					</div>
					<div class="form-group">
						<label for="contact_email">Contact Email:</label>
						<input type="text" class="form-control" name="contact_email" value="{{ @$data->contact_email }}">
					</div>
					<div class="form-group">
						<label for="contact_phone">Phone:</label>
						<input type="text" maxlength="9" minlength="9" class="form-control" name="contact_phone" value="{{ @$data->contact_phone }}">
					</div>
					<div class="form-group">
						<label for="requirement">Requirements:</label>
						<textarea class="form-control" name="requirement">{{ @$data->requirement }}</textarea>
					</div>
				</div>
				<div class="card-footer">
					@include('admin.layouts.buttons',['routeCancel'=>'prospects.index'])
				</div>
			</form>
		</div>
	</div>
</div>
@endsection