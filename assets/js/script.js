// Table filter
$("#search").keydown(function() {
  let keyword = $(this).val().toLowerCase();
  $("table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
  });
});
//add person
$("#add_person").submit(function(e){
  e.preventDefault();
  let formData = $(this).serialize();
  $.post({
    url:"./add_person.php",
    data: formData,
    success:function(res){
      if(res != 0){
        let data=JSON.parse(res);
        $("#staticBackdrop").modal('toggle');
        $('table tbody').append(`<tr>
        <th scope="row">${data['id']}</th>
        <td>${data['firstname']}</td>
        <td>${data['lastname']}</td>
        <td>${data['email']}</td>
        <td>${data['adresse']}</td>
        <td>${data['phone']}</td>
        <td>${data['inlineRadioOptions']}</td>
        <td><a href="#">Edit</a></td>
        <td scope="col"><i class="fas fa-times-circle"></i></td>
      </tr>`);
      }
      console.log(res);
    },
    error:function(err){
      console.error(err);
    }
  });
});

// delete row 
function deleteRow(id){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: ["Cancel", "Delete"],
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
  $.post({
    url:"./delete.php",
    data:{"id":id},
    success: function(res){
      if(res == 1){
        $('tr[data-id="'+id+'"]').fadeOut(600);
        setTimeout(() => {
          $('tr[data-id="'+id+'"]').remove(); 
      }, 600);
      swal("Contact supprimé avec succès!", {icon: "success",});
    }
      },
    
    error:function(err){
      console.error(err);
    }
    
  })
}
});
}
