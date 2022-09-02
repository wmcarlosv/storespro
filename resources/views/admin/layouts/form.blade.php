@if($type=='new')
    <form action="{{ route($element.'.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @method('POST')
@else
    <form action="{{ route($element.'.update',$data->id) }}" autocomplete="off" method="POST" enctype="multipart/form-data">
        @method('PUT')
@endif
    @csrf