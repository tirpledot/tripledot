$(document).ready(function() {
    $('#battle_log').scrollTop($('#battle_log')[0].scrollHeight);

});
$('.count').each(function () {


});
function damage(){
    var monD = $('#mon_info');
        mon = monD.data('name'),
        mon_hp = monD.data('hp'),
        mon_atk = monD.data('atk'),
        roleD = $('#role_info'),
        hp = roleD.data('hp'),
        atk = roleD.data('atk'),
        round = roleD.data('round')+1;
    var cur_mhp = mon_hp-atk;
    //first attack is user
    var cur_rhp = hp-mon_atk;
    var battle_info = $('<h5/>',{
      class:'text-center',
      text :'對'+mon+'造成 '+atk+' 點傷害'
    }).appendTo('#battle_info');
    //change GUI hp text
    //$('#mon_hp').text("血量 :\t"+cur_mhp);
    monD.data('hp', cur_mhp);
    $('#mon_hp').prop('Counter',mon_hp).animate({
        Counter: cur_mhp
        }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {
            $('#mon_hp').text(Math.ceil(now));
        }
    });
    // check win or not
    if(cur_mhp <= 0){
        var battle_info = $('<h5/>',{
          class:'text-center',
          text :' 戰鬥勝利 '
        }).appendTo('#battle_info');
        $('button').remove();
        cur_rhp = hp;
        countf($('#mon_ep'),$('#mon_ep').text(),0);
        countf($('#mon_gold'),$('#mon_gold').text(),0);
        countf($('#role_gold'),$('#role_gold').text(),parseInt($('#role_gold').text()) + parseInt($('#mon_gold').text()));
        var new_exp =  parseInt($('#role_ep').text()) + parseInt($('#mon_ep').text()),
            max_exp =  parseInt($('#role_maxep').text());
            countf($('#role_ep'),$('#role_ep').text(),new_exp);
        if (max_exp <= new_exp){
            cur_rhp = parseInt($('#role_maxhp').text())+100;
            var next_exp = $('#role_maxep').data('nep');
            var levelup  = $('<img/>',{
                              class : "levelup",
                              id : "levelup",
                              src : "img/assert/levelup.png",
                              style : "margin-left:5px;height:20px;width:50%;"
                            });
            $('#role_lv').after(levelup);
            countf($('#role_maxep'),$('#role_maxep').text(),next_exp);
            var lv = parseInt($('#role_lv').text())+1;
            $('#role_lv').text(lv);
            countf($('#role_hp',$('#role_hp').text(),parseInt($('#role_maxhp').text())+100));
            countf($('#role_maxhp',$('#role_maxhp').text(),parseInt($('#role_maxhp').text())+100));
            countf($('#role_mp',$('#role_mp').text(),parseInt($('#role_mp').text())+10));
            countf($('#role_atk',$('#role_atk').text(),parseInt($('#role_atk').text())+10));
          }
          $('<button/>',{
            type : 'submit',
            text : '按這裡繼續遊戲',
            class : 'btn btn-default',
            style :'width:15%;',
            name : 'win'
          }).appendTo($('#result'));
          $('#result').attr({'style': "text-align:center;"});

    }else{
        // if win not get mon attack
        var battle_info2 = $('<h5/>',{
          class:'text-center',
          text :'你受到 '+mon_atk+' 點傷害'
        }).appendTo('#battle_info');
        //$('#role_hp').text("血量 :\t"+cur_rhp);
        roleD.data('hp',cur_rhp);
        roleD.data('round',round);
        countf($('#role_hp'),hp,cur_rhp);
    }

    if(cur_rhp <= 0 && cur_mhp >= 0){
      var battle_info = $('<h5/>',{
        class:'text-center',
        text :' 你已陣亡 '
      }).appendTo('#battle_info');
        $('button').remove();
        $('#battle_info').append(battle_info);
        $('<button/>',{
          type : 'submit',
          text : '按這裡繼續遊戲',
          class : 'btn btn-default',
          style :'width:15%;',
          name : 'lose'
        }).appendTo($('#result'));
        $('#result').attr({'style': "text-align:center;"});
    }
    // battle_info scroll
    $('#battle_info').scrollTop($('#battle_info')[0].scrollHeight);

    //round count
    $('#role_info').attr({'round': round});
    $('#round').val(round);
    $('#leavehp').val(cur_rhp);
    console.log(cur_mhp,mon_atk,cur_rhp,atk);
}
function countf(who,from,to){
  who.prop('Counter',from).animate({
      Counter: to
      }, {
      duration: 1000,
      easing: 'linear',
      step: function (now) {
          who.text(Math.ceil(now));
      }
  });
}
