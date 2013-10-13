<!DOCTYPE html>
<html>
    <head></head>
        <meta charset="utf-8">
        <title>Address book</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"  type="text/css"/>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" /> 
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="/resources/demos/style.css" />
  <style>
  .info { display:inline-block; background:lightblue }
  #selectable .ui-selecting { background: lightblue; }
  #selectable .ui-selected { background: lightblue; }
  #selectable { list-style-type: none; margin: 0; padding: 0; overflow-y:scroll; height:300px;}
  .centered { text-align:center; padding:20px 0 }
/*
.container {
    box-sizing: border-box;
    -moz-box-sizing: border-box;  /* FireFox requires the -moz- prefix */
    width: 952px;
    padding: 5px;
    border: 1px solid blue;
}
*/
  </style>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.editinplace.js"></script>
        <script>
            function l(x) {
                return console.log(x);
            }
            $(function() {
/*
                $( "#sortable" ).sortable();
                $( "#sortable" ).disableSelection();
*/
                
                $("#selectable").selectable({
                    selected: function(event, ui) {
                        var cntid = $(ui.selected).attr('data-cntid');
        $.ajax({
            url: window.location.protocol + '//' + window.location.host + '/abook/contact',
            type: 'get',
            dataType: 'json',
            data: { contact_id: cntid },
            success: function(data) {
                $('#email').text(data.email);
                $('#phone').text(data.phone);
                $('#cntname').text(data.firstname + '  ' + data.lastname);
            }
        });
                        $(ui.selected).addClass("ui-selected").siblings().removeClass("ui-selected").each(
                            function(key,value){
                                $(value).find('*').removeClass("ui-selected");
                            }
                        );
                    }                   
                });
            });
        </script>
        <div class="container">
            <div class="row">
                <div class="span4">
                    <input id="search" type="text" placeholder="Search your contacts">
                </div>
                <div class="span8">&nbsp;&nbsp;</div>
            </div>
            <div class="row">
                 <div class="span3">
                    <?php $groups  = Ugroup::model()->findAllByAttributes( array('user_id' => 1) ); ?>
                    <?php $contacts  = Contact::model()->findAllByAttributes( array('user_id' => 1) ); ?>
                        <select id="groups">
                            <option data-grpid="-1" >All contacts<i class="icon-arrow-down"></i></option>
                            <?php foreach ($groups as $group) { ?>
                                <option data-grpid="<?php echo $group->id; ?>" ><?php echo $group->groupname; ?></option>
                            <?php } ?>
                        </select>
                    <ul  id="selectable" class="nav nav-list" >
                        <?php foreach($contacts as $contact){ ?>
                            <li class="ui-widget-content" data-cntid="<?php echo $contact->getAttribute('id') ?>" data-cnt-grpid="<?php echo $contact->getAttribute('group_id') ?>">
                                <span class="editme1"><a href="#"><?php echo $contact->getAttribute('firstname') .'  '. $contact->getAttribute('lastname'); ?></a></span>
                            </li>
                            <?php } ?>
                    </ul>
                    <div class="centered">
                         <button id="add-new" class="btn">Add</button>&nbsp;
                         <button id="rm-contact" class="btn">Remove</button>
                    </div>
                 </div>
                 <div class="span9">
                     <div class="row">
                        <div class="span1"><img src = "<?php echo Yii::app()->request->baseUrl; ?>/img/placeholder.png"></img></div>
                        <div class="span7" id="cntname">&nbsp;&nbsp;</div>
                     </div>
                     <div class="row">
                            <div class="span1" ><i class="icon-envelope"></i></div>
                            <div class="span1" >email</div>
                            <div class="span7" id="email">&nbsp;&nbsp;</div>

                            <div class="span1" ><i class="icon-home"></i></div>
                            <div class="span1" >phone</div>
                            <div class="span7" id="phone">&nbsp;&nbsp;</div>
                     </div>

                 </div>
             </div>
        </div>
        
    <form id="new-user-form" style="display:none" >
        Username: <input type="text" name="firstname" /><br>
        Lastname: <input type="text" name="lastname" /><br>
        Phone: <input type="text" name="phone" /><br>
        EMail: <input type="text" name="email" /><br>
        Group:
            <select id="add-to-group" class="nav-header">
                <?php foreach ($groups as $group) { ?>
                    <option data-grpid="<?php echo $group->id; ?>" ><?php echo $group->groupname; ?></option>
                <?php } ?>
            </select>
        <br>
        <button>Submit</button>
    </form>
    </body>
</html>
<script>
$(document).ready(function(){

    // All examples use the commit to function interface for ease of demonstration.
    // If you want to try it against a server, just comment the callback: and 
    // uncomment the url: lines.
    
    // The most basic form of using the inPlaceEditor
    //$(".editme1").editInPlace({
        //callback: function(unused, enteredText) { return enteredText; },
        // url: './server.php',
        //show_buttons: true
    //});
    
    /* add new user */
    $('#add-new').click(function(){
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
                $('#selectable li').last().after(
                '<li class="ui-widget-content ui-selectee" data-cntid="' + data.id + '" data-cnt-grpid="'+ data.group_id +'">' +
                    '<span class="editme1 ui-selectee"><a href="#" class="ui-selectee">' + data.firstname + '  '  + data.lastname +  '</a></span>' +
                '</li>');

            }
        });
        return false;
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
});

</script>