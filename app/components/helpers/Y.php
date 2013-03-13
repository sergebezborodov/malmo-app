<?php


/**
 * Shortcut class for frequently used methods
 *
 * Based on Leonid Svyatov <leonid@svyatov.ru> Yii-shortcut
 */
class Y
{
    /**
     * @static
     * @return CApplication
     */
    public static function app()
    {
        return Yii::app();
    }

    /**
     * Return value from global $_GET array
     * If value with those key doesn't exists, return value from $defaultValue
     *
     * @param string $name param name or nested param separated by dot
     * Example, param value with key 'Post.post_text' will find in $_GET['Post']['post_text']
     * @param mixed $defaultValue
     * @return mixed
     */
    public static function getGet($name, $defaultValue = null)
    {
        return self::_getValueByComplexKeyFromArray($name, $_GET, $defaultValue);
    }

    /**
     * Return value from global $_POST array
     * If value with those key doesn't exists, return value from $defaultValue
     *
     * @param string $name param name or nested param separated by dot
     * Example, param value with key 'Post.post_text' will find in $_GET['Post']['post_text']
     * @param mixed $defaultValue
     * @return mixed
     */
    public static function getPost($name, $defaultValue = null)
    {
        return self::_getValueByComplexKeyFromArray($name, $_POST, $defaultValue);
    }

    /**
     * Return value from global $_REQUEST array
     * If value with those key doesn't exists, return value from $defaultValue
     *
     * @param string $name param name or nested param separated by dot
     * Example, param value with key 'Post.post_text' will find in $_GET['Post']['post_text']
     * @param mixed $defaultValue
     * @return mixed
     */
    public static function getRequest($name, $defaultValue = null)
    {
        return self::_getValueByComplexKeyFromArray($name, $_REQUEST, $defaultValue);
    }

    /**
     * Возвращает относительный URL приложения
     * @param bool $absolute Вернуть ли абсолютный URL, по умолчанию false (@since 1.1.0)
     * @return string
     */
    public static function baseUrl($absolute = false)
    {
        return Yii::app()->getComponent('request')->getBaseUrl($absolute);
    }

    /**
     * Returns true if current request is secure (over HTTPS)
     *
     * @return bool
     */
    public static function isSecureConnection()
    {
        return Yii::app()->getComponent('request')->getIsSecureConnection();
    }

    /**
     * Returns true if current request is AJAX
     *
     * @return bool
     */
    public static function isAjaxRequest()
    {
        return Yii::app()->getComponent('request')->getIsAjaxRequest();
    }

    /**
     * Returns true if current request is PUT
     *
     * @return bool
     */
    public static function isPutRequest()
    {
        return Yii::app()->getComponent('request')->getIsPutRequest();
    }

    /**
     * Returns true if current request is DELETE
     *
     * @return bool
     */
    public static function isDeleteRequest()
    {
        return Yii::app()->getComponent('request')->getIsDeleteRequest();
    }

    /**
     * Returns true if current request is POST
     *
     * @return bool
     */
    public static function isPostRequest()
    {
        return Yii::app()->getComponent('request')->getIsPostRequest();
    }



    /**
     * Removes cookie by Cookie Manager components
     *
     * @param string $alias $cookie name
     */
    public static function cookieRemove($alias)
    {
        Yii::app()->getCookieManager()->removeCookie($alias);
    }

    /**
     * Returns cookie value else $default value
     * Uses Cookie Manager component
     *
     * @param string $alias cookie alias
     * @param mixed $default
     * @return mixed
     */
    public static function cookieGet($alias, $default = null)
    {
        $value = Yii::app()->getCookieManager()->getCookie($alias);
        return $value !== null ?  $value : $default;
    }

    /**
     * Sets cookie value by Cookie Manager Component
     */
    public static function cookieSet($alias, $value)
    {
        Yii::app()->getCookieManager()->setCookie($alias, $value);
    }

    /**
     * Outputs text and end application (for ajax actions)
     * @param string $text text for output
     */
    public static function end($text = '')
    {
        echo $text;
        Yii::app()->end();
    }


    /**
     * Check is current user has access to $roleName
     *
     * @param string $roleName
     * @return boolean
     */
    public static function hasAccess($roleName)
    {
        return Yii::app()->getComponent('user')->checkAccess($roleName);
    }

    /**
     * Return true if user is authed
     *
     * @return boolean
     */
    public static function isAuthed()
    {
        return !Yii::app()->getComponent('user')->getIsGuest();
    }

    /**
     * Return true if current user is guest and doesn't authed
     * @return boolean
     */
    public static function isGuest()
    {
        return Yii::app()->getComponent('user')->getIsGuest();
    }

    /**
     * Return user param from config
     *
     * @param string $key param name or nested param separated by dot
     * Example, 'Media.Foto.thumbsize' converts to ['Media']['Foto']['thumbsize']
     * @param mixed $defaultValue default value is key doesn't exists
     * @return mixed
     */
    public static function param($key, $defaultValue = null)
    {
        return self::_getValueByComplexKeyFromArray($key, Yii::app()->getParams(), $defaultValue);
    }

    /**
     * Redirect to route
     *
     * @param string $route
     * @param array $params
     */
    public static function redir($route, $params = array())
    {
        Yii::app()->getComponent('request')->redirect(self::url($route, $params));
    }

    /**
     * Redirect to route if user is authed
     * Also can set flash message
     *
     * @param string $route
     * @param array $params
     * @param string|null $flashMessage
     * @param string|null $flashType
     */
    public static function redirAuthed($route, $params = array(), $flashMessage = null, $flashType = 'success')
    {
        if (!Yii::app()->getComponent('user')->getIsGuest()) {
            Yii::app()->getComponent('user')->setFlash($flashMessage, $flashType);
            Yii::app()->getComponent('request')->redirect(self::url($route, $params));
        }
    }

    /**
     * Redirect if user is guest
     * Also can set flash message
     *
     * @param string $route
     * @param array $params
     * @param string|null $flashMessage
     * @param string|null $flashType
     */
    public static function redirGuest($route, $params = array(), $flashMessage, $flashType = 'success')
    {
        if (Yii::app()->getComponent('user')->getIsGuest()) {
            Yii::app()->getComponent('user')->setFlash($flashMessage, $flashType);
            Yii::app()->getComponent('request')->redirect(self::url($route, $params));
        }
    }

    /**
     * Return request application component
     * @return CHttpRequest
     */
    public static function request()
    {
        return Yii::app()->getComponent('request');
    }

    /**
     * Outputs application usage statistic
     *
     * @param boolean $return return or output data
     * @return string
     */
    public static function stats($return = false)
    {
        $stats   = '';
        $dbStats = Yii::app()->getDb()->getStats();

        if (is_array($dbStats)) {
            $stats = 'Queries: ' . $dbStats[0] . ' (time ' . round($dbStats[1], 5) . ' sec.)<br />';
        }

        $logger = Yii::getLogger();
        $memory = round($logger->getMemoryUsage() / 1048576, 3);
        $time   = round($logger->getExecutionTime(), 3);

        $stats .= 'Used memory: ' . $memory . ' Mb<br />';
        $stats .= 'Execution time: ' . $time . ' sec.';

        if ($return) {
            return $stats;
        }

        echo $stats;
    }

    /**
     * Creates and return url
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public static function url($route, $params = array())
    {
        if (is_object($controller = Yii::app()->getController())) {
            return $controller->createUrl($route, $params);
        }

        return Yii::app()->createUrl($route, $params);
    }

    /**
     * Return user application component
     *
     * @return CWebUser
     */
    public static function user()
    {
        return Yii::app()->getComponent('user');
    }

    /**
     * Return current authed user id
     * @return mixed
     */
    public static function userId()
    {
        return Yii::app()->getComponent('user')->getId();
    }

    /**
     * Returns key value in given array
     * @param string $key key or keys separated by dot
     * Example 'Media.Foto.thumbsize' will coverts in ['Media']['Foto']['thumbsize']
     * @param array $array values array
     * @param mixed $defaultValue default value if value for key doesn't found
     * @return mixed
     */
    private static function  _getValueByComplexKeyFromArray($key, $array, $defaultValue = null)
    {
        if (strpos($key, '.') === false) {
            return (isset($array[$key])) ? $array[$key] : $defaultValue;
        }

        $keys = explode('.', $key);

        if (!isset($array[$keys[0]])) {
            return $defaultValue;
        }

        $value = $array[$keys[0]];
        unset($keys[0]);

        foreach ($keys as $k) {
            if (!isset($value[$k]) && !array_key_exists($k, $value)) {
                return $defaultValue;
            }
            $value = $value[$k];
        }

        return $value;
    }

    /**
     * Check current user has role
     *
     * @param string $roleName
     * @return bool
     * @throws AppException
     */
    public static function checkAccess($roleName)
    {
        return Yii::app()->user->checkAccess($roleName);
    }

    /**
     * Return main MDbConnection
     *
     * @static
     * @return MDbConnection
     */
    public static function db()
    {
        return Yii::app()->db;
    }

    /**
     * Returns MDbCommand
     *
     * @static
     * @param int $cacheLife время жизни кеша
     * @param null|string|array|object $dependency if string or array given it used as cache tags
     * else if object of ICacheDependency - used as cache dependency
     * @return MDbCommand
     */
    public static function dbc($cacheLife = 0, $dependency = null)
    {
        if ($dependency !== null && !is_object($dependency)) {
            $dependency = new MTagsDependency($dependency);
        }

        return Yii::app()->db->cache($cacheLife, $dependency)->createCommand();
    }

    /**
     * Returns CNumberFormatter
     *
     * @static
     * @return CNumberFormatter
     */
    public static function nf()
    {
        return Yii::app()->getNumberFormatter();
    }

    /**
     * Returns CDateFormatter
     *
     * @return CDateFormatter
     */
    public static function df()
    {
        return Yii::app()->getDateFormatter();
    }

    /**
     * Returns CClientScript
     *
     * @return CClientScript
     */
    public static function cs()
    {
        return Yii::app()->getComponent('clientScript');
    }
}
