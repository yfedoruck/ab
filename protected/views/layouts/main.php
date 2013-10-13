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
/*
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1em; height: 12px; }
*/
  
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  </style>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.editinplace.js"></script>
        <script>
            $(function() {
/*
                $( "#sortable" ).sortable();
                $( "#sortable" ).disableSelection();
*/
                
                $("#selectable").selectable({
                    selected: function(event, ui) {
                        $(ui.selected).addClass("ui-selected").siblings().removeClass("ui-selected").each(
                            function(key,value){ $(value).find('*').removeClass("ui-selected"); }
                        );
                    }                   
                });
            });
        </script>
        <div class="”container”">
            <h1><a href="”#”">Bootstrap Site</a></h1>
            <div class="row">
                 <div class="span4">
                    <form>
                      <fieldset>
                        <input id="search" type="text" placeholder="Search your contacts">
                      </fieldset>
                    </form>
                    <?php $groups  = Ugroup::model()->findAllByAttributes( array('user_id' => 1) ); ?>
                    <?php $contacts  = Contact::model()->findAllByAttributes( array('user_id' => 1) ); ?>
                        <select id="groups" class="nav-header">
                            <option data-grpid="-1" >All contacts<i class="icon-arrow-down"></i></option>
                            <?php foreach ($groups as $group) { ?>
                                <option data-grpid="<?php echo $group->id; ?>" ><?php echo $group->groupname; ?></option>
                            <?php } ?>
                        </select>
                    <ul  id="selectable" class="nav nav-list">
                        <?php foreach($contacts as $contact){ ?>
                            <li class="ui-widget-content" data-cntid="<?php echo $contact->getAttribute('id') ?>" data-cnt-grpid="<?php echo $contact->getAttribute('group_id') ?>">
                                <span class="editme1"><a href="#"><?php echo $contact->getAttribute('firstname') .'  '. $contact->getAttribute('lastname'); ?></a></span>
                            </li>
                            <?php } ?>
                        <!-- li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Our Clients</a></li>
                        <li class="nav-header">Our Friend</li>
                        <li><a href="#">Google</a></li -->
                    </ul>
                    <p class="text-center">
                         <button id="add-new" class="btn">Add</button>&nbsp;
                         <button id="rm-contact" class="btn">Remove</button>
                     </p>
                 </div>
                 <div class="span8">
                     <?php //var_dump( get_class_methods( User::model() ) ); ?>

                     <div class="editme1">photo Name</div>
                     <div>
                     <table border="1">
                         <tr>
                            <td>email</td>
                            <td></td>
                        </tr>
                         <tr>
                            <td>phone</td>
                            <td></td>
                        </tr>
                     </table>
                     </div>
                 </div>
             </div>
        </div>
        
    <form id="new-user-form" style="display:none" >
        Username: <input type="text" name="firstname" /><br>
        Lastname: <input type="text" name="lastname" /><br>
        Phone: <input type="text" name="phone" /><br>
        EMail: <input type="text" name="email" /><br>
        <button>Submit</button>
    </form>
    </body>
</html>
<script>
$(document).ready(function(){
    function l(x) {
        return console.log(x);
    }
    // All examples use the commit to function interface for ease of demonstration.
    // If you want to try it against a server, just comment the callback: and 
    // uncomment the url: lines.
    
    // The most basic form of using the inPlaceEditor
    //$(".editme1").editInPlace({
        //callback: function(unused, enteredText) { return enteredText; },
        // url: './server.php',
        //show_buttons: true
    //});
    $('#add-new').click(function(){
        $( "#new-user-form" ).dialog();
    });
    
    $('#new-user-form button').click( function(e){
        var q = e.target.value;
        var data = $('form#new-user-form').serialize();
        console.log(data);
        $.ajax({
            url: window.location.protocol + '//' + window.location.host + '/abook/adduser',
            type: 'get',
            dataType: 'json',
            data: data,
            success: function(data) {
                $('#selectable li').last().after(
                '<li class="ui-widget-content" data-cntid="' + data.id + '">' + 
                    '<span class="editme1"><a href="#">' + data.firstname + '  '  + data.lastname +  '</a></span>' + 
                '</li>');
            }
        });
        return false;
    });
    
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

    //console.log(

    $('#groups').change( function(e) {
        
        var asked = $('#search').val();
        
        var grpid = $('#groups option:selected').attr('data-grpid');
/*
        if( grpid === '-1' ){
            $('#selectable li').show();     //show all
            return;
        }
        $('#selectable li[data-cnt-grpid='+grpid+']').siblings().hide();
        $('#selectable li[data-cnt-grpid='+grpid+']').show();
*/
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