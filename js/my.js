$(window).load(function() {
    $('#battle_log').scrollTop($('#battle_log')[0].scrollHeight);
});
function damage(){
    var mon = $('#mon_info').attr('mon');
    var mon_hp = parseInt($('#mon_info').attr('hp'));
    var mon_atk = parseInt($('#mon_info').attr('atk'));
    var hp = parseInt($('#role_info').attr('hp'));
    var atk = parseInt($('#role_info').attr('atk'));
    var round = parseInt($('#role_info').attr('round'))+1;
    var cur_mhp = mon_hp-atk;
    var cur_rhp = hp-mon_atk;

    //first attack is user
    var battle_info = $('<h5/>',{
      class:'text-center',
      text :'對'+mon+'造成 '+atk+' 點傷害'
    }).appendTo('#battle_info');
    //change GUI hp text
    $('#mon_hp').text("血量 :\t"+cur_mhp);
    // check win or not
    if(cur_mhp <= 0){
        var battle_info = $('<h5/>',{
          class:'text-center',
          text :' 戰鬥勝利 '
        }).appendTo('#battle_info');
        $('button').remove();
        var result =$('<form/>',{
          action:'main.php',
          method :'POST',
          style :'text-align:center;'
        });
        $('#battle_info').after(result);
        $('<button/>',{
          type : 'submit',
          text : '按這裡繼續遊戲',
          class : 'btn btn-default',
          style :'width:15%;',
          name : 'win'
        }).appendTo(result);
        $('<input/>',{
          type : 'hidden',
          name : 'round',
          value : round
        }).appendTo(result);
    }else{
        // if win not get mon attack
        var battle_info2 = $('<h5/>',{
          class:'text-center',
          text :'你受到 '+mon_atk+' 點傷害'
        }).appendTo('#battle_info');
        $('#role_hp').text("血量 :\t"+cur_rhp);
    }

    $('#mon_info').attr({'hp': cur_mhp});
    $('#role_info').attr({'hp': cur_rhp});

    if(cur_rhp <= 0){
      var battle_info = $('<h5/>',{
        class:'text-center',
        text :' 你已陣亡 '
      }).appendTo('#battle_info');
        $('button').remove();
        $('#battle_info').append(battle_info);
        var result =$('<form/>',{
          action:'main.php',
          method :'POST',
          style :'text-align:center;'
        });
        $('#battle_info').after(result);
        $('<button/>',{
          type : 'submit',
          text : '按這裡繼續遊戲',
          class : 'btn btn-default',
          style :'width:15%;',
          name : 'lose'
        }).appendTo(result);
        $('<input/>',{
          type : 'hidden',
          name : 'round',
          value : round
        }).appendTo(result);
    }
    // battle_info scroll
    $('#battle_info').scrollTop($('#battle_info')[0].scrollHeight);

    //round count
    $('#role_info').attr({'round': round});
    console.log(cur_mhp,mon_atk,cur_rhp,atk);
}
