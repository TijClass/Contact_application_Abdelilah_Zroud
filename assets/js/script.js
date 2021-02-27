$("#add_person").submit(function(e){
    e.preventDefault();
    let formData = $(this).serialize();
    $.post({
      url:"../../add_person.php",
      data: formData,
      success:function(res){
        console.log(res);
      },
      error:function(err){
        console.error(err);
      }
    });
  });