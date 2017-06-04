function damage(){
    var mon = $('#mon_info').attr('mon');
    var mon_hp = parseInt($('#mon_info').attr('hp'));
    var mon_atk = parseInt($('#mon_info').attr('atk'));
    var hp = parseInt($('#role_info').attr('hp'));
    var atk = parseInt($('#role_info').attr('atk'));

    var battle_info = $('<h5/>',{
      class:'text-center',
      text :'對'+mon+'造成 '+atk+' 點傷害'
    }).appendTo('#battle_info');
    var battle_info2 = $('<h5/>',{
      class:'text-center',
      text :'你受到 '+mon_atk+' 點傷害'
    }).appendTo('#battle_info');
    var cur_mhp = mon_hp-atk;
    var cur_rhp = hp-mon_atk;
    $('#mon_info').attr({'hp': cur_mhp});
    $('#mon_info').text('name : '+mon+' , mon_hp = '+cur_mhp+' , mon_atk = 2');
    $('#role_info').attr({'hp': cur_rhp});
    $('#role_info').text('hp =' +cur_rhp+  ', atk =' +atk);
    $('#battle_info').append(battle_info,battle_info2);
    if(cur_mhp <= 0){
        var battle_info = $('<h5/>',{
          class:'text-center',
          text :' 戰鬥勝利 '
        }).appendTo('#battle_info');

        $('#attack').text('按這裡繼續遊戲');
        $('#attack').attr({'onclick' : 'window.location.assign(\'main.php\');'});
    }
    else if(cur_rhp <= 0){
        var battle_info = $('<h5></h5>').text(' 你死了 ');
        $('#battle_info').append(battle_info);
    }
    $('#battle_info').scrollTop($('#battle_info')[0].scrollHeight);
    //$('#battle_info').animate({
      //  scrollTop: $('#battle_info')[0].scrollHeight}, 1000);
    console.log(cur_mhp,mon_atk,cur_rhp,atk);
}
