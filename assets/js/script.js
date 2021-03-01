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