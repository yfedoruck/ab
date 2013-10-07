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
                                <span><a href="#"><?php echo $contact->getAttribute('firstname') .'  '. $contact->getAttribute('lastname'); ?></a></span>
                            </li>
                            <?php } ?>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Our Clients</a></li>
                        <li class="nav-header">Our Friend</li>
                        <li><a href="#">Google</a></li>
                    </ul>
                    <p class="text-center">
                         <button class="btn">Add</button>&nbsp;
                         <button class="btn">Remove</button>
                     </p>
                 </div>
                 <div class="span8">
                     <?php //var_dump( get_class_methods( User::model() ) ); ?>

                     <div>photo <span>Name</span></div>
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
    </body>
</html>
