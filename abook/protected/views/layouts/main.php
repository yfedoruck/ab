<!DOCTYPE html>
<html>
    <head></head>
        <meta charset="utf-8">
        <title>Address book</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"  type="text/css"/>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
        <div class="”container”">
            <h1><a href="”#”">Bootstrap Site</a></h1>
            <div class="row">
                 <div class="span4">
                    <form>
                      <fieldset>
                        <input type="text" placeholder="Search your contacts">
                      </fieldset>
                    </form>
                    <ul class="nav nav-list">
                        <li class="nav-header">All contacts<i class="icon-arrow-up"></i></li>
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
                     
                 </div>
             </div>
        </div>
    </body>
</html>
