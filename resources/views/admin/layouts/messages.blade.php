<script>
var table;
$(document).ready(function(){
	 table = $("table.table").DataTable();

	$("body").on('submit','form.delete-form', function(){
		if(!confirm("Estas seguro de eliminar este Registro?")){
			return false;
		}
	});

	@if(Session::get('success'))
		Swal.fire(
		  'Success',
		  '{{ Session::get("success") }}',
		  'success'
		);
	@endif

	@if(Session::get('error'))
		Swal.fire(
		  'Error',
		  '{{ Session::get("error") }}',
		  'error'
		);
	@endif
});
</script>	