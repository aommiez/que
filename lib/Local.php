<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 10:16 AM
 */

class Local {
    private static $em = null;

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getEM()
    {
        if(is_null(self::$em))
            self::loadEM();
        return self::$em;
    }

    private static function loadEM(){
        $paths = array('app/Entity');
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, true);
        self::$em = \Doctrine\ORM\EntityManager::create(array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '111111',
            'dbname'   => 'queue'
        ), $config);
    }
} 