<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 4:02 PM
 */

namespace Main\Entity\Que;

/**
 * @Entity
 * @Table(name="dep")
 */
class Dep extends BaseEntity {
    /** @Column(type="string") */
    protected $name;

    /** @Column(type="string") */
    protected $picture_path;

    /** @Column(type="string") */
    protected $g_speak;

    /** @Column(type="string") */
    protected $g_speak_path;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $g_speak
     */
    public function setGSpeak($g_speak)
    {
        $this->g_speak = $g_speak;
    }

    /**
     * @return mixed
     */
    public function getGSpeak()
    {
        return $this->g_speak;
    }

    /**
     * @param mixed $g_speak_path
     */
    public function setGSpeakPath($g_speak_path)
    {
        $this->g_speak_path = $g_speak_path;
    }

    /**
     * @return mixed
     */
    public function getGSpeakPath()
    {
        return $this->g_speak_path;
    }

    /**
     * @param mixed $picture_path
     */
    public function setPicturePath($picture_path)
    {
        $this->picture_path = $picture_path;
    }

    /**
     * @return mixed
     */
    public function getPicturePath()
    {
        return $this->picture_path;
    }
}