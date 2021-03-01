$("#add_person").submit(function(e){
  e.preventDefault();
  let formData = $(this).serialize();
  $.post({
    url:"./add_person.php",
    data: formData,
    success:function(res){
      if(res == 1){
        $('table tbody').append(`<tr>
        <th scope="row">3456754</th>
        <td>Abby</td>
        <td>Adam</td>
        <td>aby@anywhere.com</td>
        <td>Adresse1</td>
        <td>Phone</td>
        <td>family</td>
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