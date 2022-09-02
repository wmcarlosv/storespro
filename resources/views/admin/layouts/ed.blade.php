<a href="{{ route($element.'.edit',$id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
<form style="display: inline;" action="{{ route($element.'.destroy', $id) }}" class="delete-form" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
</form>