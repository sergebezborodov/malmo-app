<?php

/**
 * Cache helpers fuctions
 */
class C
{
    /**
     * Return cache component instance
     *
     * @return CCache
     */
    public static function cache()
    {
        return Yii::app()->getCache();
    }

    /**
     * Read value from cache
     *
     * @param string $id
     * @return mixed
     */
    public static function get($id)
    {
        return Yii::app()->getCache()->get($id);
    }

    /**
     * Write value to cache
     *
     * @param string $id the key identifying the value to be cached
     * @param mixed $value the value to be cached
     * @param integer $expire the number of seconds in which the cached value will expire. 0 means never expire.
     * @param ICacheDependency $dependency dependency of the cached item. If the dependency changes, the item is labeled invalid.
     * @return boolean true if the value is successfully stored into cache, false otherwise
     */
    public static function set($id, $value, $expire = 0, $dependency = null)
    {
        return Yii::app()->getCache()->set($id, $value, $expire, $dependency);
    }

    /**
     * Write value to cache with tags dependency
     *
     * @param string $id
     * @param mixed $value
     * @param int $expire
     * @param null|string|array $tags one or more tags as array
     * @return bool
     */
    public static function setWithTag($id, $value, $expire = 0, $tags = null)
    {
        $dep = null;
        if ($tags != null) {
            $dep = new MTagsDependency($tags);
        }
        return Yii::app()->getCache()->set($id, $value, $expire, $dep);
    }
}
