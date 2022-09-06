<a href="{{ route($element.'.edit',$id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
<form style="display: inline;" id="form-{{$id}}" action="{{ route($element.'.destroy', $id) }}" class="delete-form" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger delete-form" data-form="form-{{$id}}" type="button"><i class="fas fa-times"></i></button>
</form>