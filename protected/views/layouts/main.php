<!DOCTYPE html>
<html>
    <head></head>
        <meta charset="utf-8">
        <title>Address book</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"  type="text/css"/>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" /> 
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1em; height: 12px; }
  </style>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.editinplace.js"></script>
        <script>
            $(function() {
                $( "#sortable" ).sortable();
                $( "#sortable" ).disableSelection();
            });
        </script>
        <div class="”container”">
            <h1><a href="”#”">Bootstrap Site</a></h1>
            <div class="row">
                 <div class="span4">
                    <form>
                      <fieldset>
                        <input type="text" placeholder="Search your contacts">
                      </fieldset>
                    </form>
                    <?php $contacts  = Contact::model()->findAllByAttributes( array('user_id' => 1) ); ?>
                        <select class="nav-header">
                            <option>All contacts<i class="icon-arrow-down"></i></option>
                        </select>
                    <ul  id="sortable" class="nav nav-list">
                        <?php foreach($contacts as $contact){ ?>
                            <li class="ui-state-default">
                                <span class="editme1"><a href="#"><?php echo $contact->getAttribute('firstname') .'  '. $contact->getAttribute('lastname'); ?></a></span>
                            </li>
                            <?php } ?>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Our Clients</a></li>
                        <li class="nav-header">Our Friend</li>
                        <li><a href="#">Google</a></li>
                    </ul>
                    <p class="text-center">
                         <button id="add-new" class="btn">Add</button>&nbsp;
                         <button class="btn">Remove</button>
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
		Username: <input id = "" type="text" name="" /><br>
		Lastname: <input id = "" type="text" name="" /><br>
		Phone: <input id = "" type="text" name="" /><br>
		Email: <input id = "" type="text" name="" /><br>
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
	$(".editme1").editInPlace({
		callback: function(unused, enteredText) { return enteredText; },
		// url: './server.php',
		//show_buttons: true
	});
	$('#add-new').click(function(){
		$( "#new-user-form" ).dialog();
	});
	
	$('#new-user-form button').click( function(e){
		var q = e.target.value;
		var data = $('form#new-user-form').serializeArray();
		console.log(data);
		$.ajax({
			url: window.location.protocol + '//' + window.location.host + '/abook/adduser',
			type: 'get',
			dataType: 'json',
			data: data,
			success: function(data) {
			}
		});
		return false;
	});
	
});

</script>