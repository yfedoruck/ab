<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function beforeAction($action){
        parent::beforeAction($action);
        $app = Yii::app();
        $id = $app->request->getQuery('user_id');
        if( !$id && !Yii::app()->session['user_id'] ){
            echo 'user_id not defined';
            return false;
        }
        if( !Yii::app()->session['user_id'] ) {
            Yii::app()->session['user_id'] = $id;
        }
        $user = User::model()->findByPk(Yii::app()->session['user_id']);
        if( !$user ){
            throw new CHttpException(404, 'User not exists.');
        }
        $data = $user->getAttributes();
        if( !$data['username'] ){
            throw new CHttpException(404, 'Username not exists.');
        }
        Yii::app()->session['username'] = $data['username'];
        return true;
    }

    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo CJSON::encode($data);
        Yii::app()->end();
    }
}