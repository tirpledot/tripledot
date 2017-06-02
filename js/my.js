$(document).ready(function(){
    $('#battle_info').scrollbar();
});
function hiddenform(){
    $('#checkbtn').on('click', function(evt) {
        if($('#nickname').val()){
          $('div.role').hide();
          console.log("123");
        }
    })
}
function damage(){
    var mon = $('#mon_info').attr('mon');
    var mon_hp = parseInt($('#mon_info').attr('hp'));
    var mon_atk = parseInt($('#mon_info').attr('atk'));
    var hp = parseInt($('#role_info').attr('hp'));
    var atk = parseInt($('#role_info').attr('atk'));

    var battle_info = $("<h5></h5>").text("對"+mon+"造成 "+atk+" 點傷害");
    var battle_info2 = $("<h5></h5>").text("你受到 "+mon_atk+" 點傷害");
    $('#mon_info').attr({'hp':mon_hp-atk});
    $('#role_info').attr({'hp':hp-mon_atk});
    $('#battle_info').append(battle_info,battle_info2);
    if(mon_hp - atk <= 0){
        var battle_info = $("<h5></h5>").text(" 戰鬥勝利 ");
        $('#battle_info').append(battle_info);
    }
    else if(hp - mon_atk <= 0){
        var battle_info = $("<h5></h5>").text(" 你死了 ");
        $('#battle_info').append(battle_info);
    }
    $('#battle_info').scrollTop($('#battle_info')[0].scrollHeight);
    //$('#battle_info').animate({
      //  scrollTop: $('#battle_info')[0].scrollHeight}, 1000);
    console.log(mon_hp,mon_atk,hp,atk);
}
