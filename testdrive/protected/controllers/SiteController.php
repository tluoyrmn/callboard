<?php

class SiteController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $model = new Promo();
        if(isset($_POST['Promo']))
        {
            $model->setAttributes($_POST['Promo']);
            $model->setAttribute('user_id', Yii::app()->user->id);
            if($model->validate()) {
                if($model->save()) {
                    $image = CUploadedFile::getInstance($model, 'photo');
                    if (!empty($image)) {
                        $sourcePath = pathinfo($image->getName());
                        $imageName = time().'.'.$sourcePath['extension'];

                        $imagepath = realpath(Yii::app()->basePath . '/../images');
                        $path = $imagepath . DIRECTORY_SEPARATOR . $imageName;
                        $image->saveAs($path);
                        $model->photo = $imageName;
                        $model->save();
                    }
                    $this->redirect(array('index'));
                }
            }
        }

        $dataProvider=new CActiveDataProvider(
            'Promo',
            array(
                'pagination'=>array(
                    'pageSize'=>20
                )
            )
        );
        $this->render('index',array(
            'model' => $model,
            'isLogin' => !Yii::app()->user->isGuest,
            'dataProvider' => $dataProvider,
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}