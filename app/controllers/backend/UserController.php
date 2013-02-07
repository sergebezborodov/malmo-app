<?php

/**
 * User manage controller
 */
class UserController extends BackendController
{
    public $layout = 'login';

    /**
     * LOgin into backend action
     */
    public function actionLogin()
    {
        $this->render('login');
    }

    /**
     * Logout from backend
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}
