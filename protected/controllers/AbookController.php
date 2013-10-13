<?php

class AbookController extends Controller
{
    public function actionAdduser()
    {
        $user = User::model()->findByPk(Yii::app()->session['user_id']);
        $updated = 0;
        if( $_GET['contact_id'] )
        {
            $contact = Contact::model()->findByPk($_GET['contact_id']);
            $updated = 1;
        }else{
            $contact = new Contact();
        }
        $contact->attributes = $_GET;
        $contact->user_id = Yii::app()->session['user_id'];

        try{
            $contact->save();
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $data = $contact->attributes;
        $data['updated'] = $updated;
        $this->renderJSON($data);
    }
    
    public function actionRmuser()
    {
        //Yii::app()->session['user_id']
        $contact = Contact::model()->findByPk($_GET['contact_id']);
        try{
            $res = $contact->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }

        $this->renderJSON($res);
    }

    public function actionContact()
    {
        //Yii::app()->session['user_id']
        $contact = Contact::model()->findByPk($_GET['contact_id']);
        $this->renderJSON($contact);
    }
    public function actionEditcontact()
    {
        //Yii::app()->session['user_id']
        $contact = Contact::model()->findByPk($_GET['contact_id']);
        $this->renderJSON($contact);
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}
