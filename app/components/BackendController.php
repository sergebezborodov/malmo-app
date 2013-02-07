<?php

/**
 * Base application backend controller
 */
class BackendController extends Controller
{
    public $layout = 'column2';

    /**
     * @var array actions that doesn't require auth in backend
     */
    protected $notAuthActions = array(
        'user/login',
        'user/logout',
        'site/error',
    );

    /**
     * @return null|string controller title for user
     */
    protected function getControllerTitle()
    {
        return null;
    }

    /**
     * @return bool true if current action doesn't require auth
     */
    protected function isNoAuthAction()
    {
        $action = $this->id . '/' . $this->action->id;
        return in_array($action, $this->notAuthActions);
    }

    /**
     * Sets page title and add element into breadcrumbs
     *
     * @param string $title
     */
    protected function setTitle($title)
    {
        $this->breadcrumbs[] = $this->pageTitle = $title;
    }

    /**
     * Add item to top menu
     *
     * @param array $item
     */
    protected function addMenuitem($item)
    {
        $this->menu[] = $item;
    }

    /**
     * Add item to left menu
     *
     * @param $item
     */
    protected function addLeftMenuItem($item)
    {
        $this->leftMenu[] = $item;
    }

    /**
     * Add element into breadcrumbs
     *
     * @param string       $title
     * @param array|string $url
     * @return void
     */
    protected function addBreadcrumbs($title, $url = null)
    {
        if ($url === null) {
            $this->breadcrumbs[] = $title;
        } else {
            $this->breadcrumbs[$title] = $url;
        }
    }

    /**
     * Check user auth and set main menu
     *
     * @param CAction $action
     * @return bool
     */
    public function beforeAction($action)
    {
        // uncomment this when user auth system will be ready
        /*if (Y::isGuest() && !$this->isNoAuthAction()) {
            $this->redirect(array('/user/login'));
        }*/

        $this->breadcrumbs = array('Admin' => '/');
        if (($title = $this->getControllerTitle()) !== null) {
            $path = '';
            if (($module = $this->getModule()) !== null) {
                $path = '/'. $module->getName() . '/';
            }
            $this->breadcrumbs[$title] = array('/'.$path.$this->id.'/index');
        }

        // ---
        parent::beforeAction($action);
        Yii::app()->theme = 'backend';


        $id = $this->id;
        $moduleId = $this->getModule() ? $this->getModule()->id : null;

        $this->menu = array(
            array(
                'label' => 'Home',
                'url' => array('/site/index'),
                'active' => $id == 'site',
            ),
            array(
                'label' => 'Test',
                'url' => array('/test/index'),
                'active' => $id == 'test',
            ),
        );

        return true;
    }
}
