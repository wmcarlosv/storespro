@extends('layouts.contentLayoutMaster')

@section('title',$title)

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3><i class="fas fa-users"></i> {{ $title }}</h3>
			</div>
			<div class="card-body">
				@include('admin.layouts.new',['element'=>'clients'])
				<table class="table table-striped table-bordered">
					<thead>
						<th>ID</th>
						@foreach($columns as $column)
							<th>{{ $column }}</th>
						@endforeach
						<th>Actions</th>
					</thead>
					<tbody>
						@foreach($data as $d)
							<tr>
								<td>{{ $d->id }}</td>
								<td>{{ $d->rut }}</td>
								<td>{{ $d->name }}</td>
								<td>{{ $d->social_razon }}</td>
								<td>{{ $d->address }}</td>
								<td>
									@include('admin.layouts.ed',['element'=>'clients','id'=>$d->id])
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	@include('admin.layouts.messages')
@stop