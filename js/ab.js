//function l(x) { return console.log(x); }
$(document).ready(function(){
    $("#selectable").selectable({
        selected: function(event, ui) {
            $( "#new-user-form" ).dialog( "close" );
            var cntid = $(ui.selected).attr('data-cntid');
            
            //fill left part
            $.ajax({
                url: window.location.protocol + '//' + window.location.host + '/abook/contact',
                type: 'get',
                dataType: 'json',
                data: { contact_id: cntid },
                success: function(data) {
                    $('#email').text(data.email);
                    $('#phone').text(data.phone);
                    $('#firstname').text(data.firstname);
                    $('#lastname').text(data.lastname);
                }
            });
            $(ui.selected).addClass("ui-selected").siblings().removeClass("ui-selected").each(
                function(key,value){
                    $(value).find('*').removeClass("ui-selected");
                }
            );
        }                   
    });

    /* add new user */
    $('#add-new').click(function(){
        //clear fields
        $('#new-user-form input[name="contact_id"]').val('0');
        $('#new-user-form input[name="email"]').val('');
        $('#new-user-form input[name="phone"]').val('');
        $('#new-user-form input[name="firstname"]').val('');
        $('#new-user-form input[name="lastname"]').val('');
        $('#add-to-group option[data-grpid="-1"]').attr('selected','selected');

        $( "#new-user-form" ).dialog();
    });
    
    $('#new-user-form button').click( function(e){
        var q = e.target.value;
        var data = $('form#new-user-form').serializeArray();
        data.push({name: 'group_id', value: $('#add-to-group option:selected').attr('data-grpid') });
        console.log(data);
        $.ajax({
            url: window.location.protocol + '//' + window.location.host + '/abook/adduser',
            type: 'get',
            dataType: 'json',
            data: data,
            success: function(data) {
                if(!data.updated){
                    $('#selectable li').last().after(
                    '<li class="ui-widget-content ui-selectee" data-cntid="' + data.id + '" data-cnt-grpid="'+ data.group_id +'">' +
                        '<span ui-selectee"><a href="#" class="ui-selectee">' + data.firstname + '  '  + data.lastname +  '</a></span>' +
                    '</li>');
                    $( "#new-user-form" ).dialog( "close" );
                }else{
                    document.location.href = "index.php";
                }
            }
        });
        return false;
    });

    /* edit contact */

    $('#edit-contact').click(function(){
        fill_form();
        $( "#new-user-form" ).dialog();
    });

    

    /* remove user */
    $('#rm-contact').click( function(e){
        var id = $('#selectable').find('.ui-selected').attr('data-cntid');
        $.ajax({
            url: window.location.protocol + '//' + window.location.host + '/abook/rmuser',
            type: 'get',
            dataType: 'json',
            data: {contact_id : id},
            success: function(res) {
                console.log(res);
                $('li[data-cntid="'+id+'"]').remove();
            }
        });
    });

    $('#groups').change( function(e) {
        var grpid = $('#groups option:selected').attr('data-grpid');
        var asked = $('#search').val();
        search_cnts (asked, grpid);
    });
    
    $('#search').keyup( function(e){
            var grpid = $('#groups option:selected').attr('data-grpid');
            var asked = e.target.value;
            search_cnts(asked, grpid);
    });
    function search_cnts (asked, grpid) {
       if(asked == ''){
            if( grpid === '-1' ){
                $('#selectable li').show();     //show all
                return;
            }
            $('#selectable li[data-cnt-grpid='+grpid+']').siblings().hide();
            $('#selectable li[data-cnt-grpid='+grpid+']').show();
            return;
        }
        $('#selectable li span a').each( function(k,v){
            var finded = $(v).text().match(asked);
            var grpfinded = $(v).parent().parent().attr('data-cnt-grpid');
            if( !finded ){
                $(v).parent().parent().hide();      //hide
                return;
            }
            if( grpid === '-1' ){
                $(v).parent().parent().show();
                return;
            }
            if(grpfinded === grpid){
                $(v).parent().parent().show();
                return;
            }
            $(v).parent().parent().hide();
        });
    }
    function fill_form(){
        var grp = $('.ui-selected').attr('data-cnt-grpid');
        var contact_id = $('.ui-selected').attr('data-cntid');
        var email = $('#email').text();
        var phone = $('#phone').text();
        var firstname = $('#firstname').text();
        var lastname = $('#lastname').text();

        $('#new-user-form input[name="contact_id"]').val(contact_id);
        $('#new-user-form input[name="email"]').val(email);
        $('#new-user-form input[name="phone"]').val(phone);
        $('#new-user-form input[name="firstname"]').val(firstname);
        $('#new-user-form input[name="lastname"]').val(lastname);
        $('#add-to-group option[data-grpid="'+grp+'"]').attr('selected','selected');
    }
});