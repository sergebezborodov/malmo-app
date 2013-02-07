<?php
/**
 * Application base controller
 *
 * @property string pageTitle
 */
abstract class Controller extends MController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/1column.php'.
     */
    public $layout = '//layouts/column1';
    
    /**
     * @var array main menu see {@link CMenu::items}
     */
    public $menu = array();

    /**
     * @var array left menu see {@link CMenu::items}
     */
    public $leftMenu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();


    public function beforeAction($action)
    {
        parent::beforeAction($action);

        Yii::app()->theme = 'web';

        return true;
    }

}
