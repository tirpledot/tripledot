function hiddenform(){
    $('#checkbtn').on('click', function(evt) {
        if($('#nickname').val()){
          $('div.role').hide();
          console.log("123");
        }
    })
}
