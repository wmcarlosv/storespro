<script>
var table;
$(document).ready(function(){
	 table = $("table.table").DataTable();

	$("body").on('click','button.delete-form', function(){
		let id = $(this).attr("data-form");
		Swal.fire({
		  title: 'Estas seguro de eliminar este Registro?',
		  showCancelButton: true,
		  confirmButtonColor: 'green',
  		  cancelButtonColor: 'red',
		  confirmButtonText: '<i class="fas fa-check"></i>',
		  cancelButtonText: '<i class="fas fa-times"></i>',
		  icon: 'question',
		}).then((result) => {
		  if (result.isConfirmed) {
		    $("#"+id).submit();
		  }
		});
		event.preventDefault();
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