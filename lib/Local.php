<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 10:16 AM
 */

class Local {
    private static $em = null, $vem = null;

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getEM()
    {
        if(is_null(self::$em))
            self::loadEM();
        return self::$em;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getVEM()
    {
        if(is_null(self::$vem))
            self::loadVEM();
        return self::$vem;
    }

    private static function loadEM(){
        $paths = array('app/Main/Entity/Que');
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, true);
        self::$em = \Doctrine\ORM\EntityManager::create(array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '111111',
            'dbname'   => 'que',
            'charset'  => 'utf8'
        ), $config);
    }

    private static function loadVEM(){
        $paths = array('app/Main/Entity/View');
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, true);
        self::$vem = \Doctrine\ORM\EntityManager::create(array(
            'host'     => '10.0.0.1',
            'driver'   => 'pdo_mysql',
            'user'     => 'que',
            'password' => 'que01',
            'dbname'   => 'hph'
        ), $config);
    }
}