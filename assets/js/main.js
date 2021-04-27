//myTable
$(document).ready( function () {
  $('#myTable').DataTable();
} );

//QualificationDelete
$('.QualificationDelete').click(function(){
  let id = $(this).attr("data-id");
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Poof! Your data has been deleted!", {
        icon: "success",
      });
      window.setTimeout(function(){
        window.location.href = 'qualification-delete.php?id='+id;
      }, 3000)
    } 
    else {
      swal("Your data is safe!");
    }
  });

});