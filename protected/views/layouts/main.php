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
  #selectable { list-style-type: none; margin: 0; padding: 0; }
  #selectul { overflow-y:scroll; height:300px; }
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
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ab.js"></script>

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
                    <div id = "selectul">
                        <ul  id="selectable" class="nav nav-list" >
                            <?php foreach($contacts as $contact){ ?>
                                <li class="ui-widget-content" data-cntid="<?php echo $contact->getAttribute('id') ?>" data-cnt-grpid="<?php echo $contact->getAttribute('group_id') ?>">
                                    <span><a href="#"><?php echo $contact->getAttribute('firstname') .'  '. $contact->getAttribute('lastname'); ?></a></span>
                                </li>
                                <?php } ?>
                        </ul>
                    </div>
                    <div class="centered">
                         <button id="add-new" class="btn">Add</button>&nbsp;
                         <button id="edit-contact" class="btn">Edit</button>&nbsp;
                         <button id="rm-contact" class="btn">Remove</button>
                    </div>
                 </div>
                 <div class="span9">
                     <div class="row">
                        <div class="span1"><img src = "<?php echo Yii::app()->request->baseUrl; ?>/img/placeholder.png"></img></div>
                        <div class="span1" id="firstname">&nbsp;&nbsp;</div>
                        <div class="span1" id="lastname">&nbsp;&nbsp;</div>
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
        <input type="hidden" name="contact_id" value="0" />
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