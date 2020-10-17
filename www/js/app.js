
$(function(){

  $('.delete').click(function(){
    if(!confirm("Voulez vous vraiment modifier cet enregistrement ?")){
      return false;
    }
  });
  $('.edit').click(function(){
    if(!confirm("Voulez vous vraiment modifier cet enregistrement ?")){
      return false;
    }
  });
});
