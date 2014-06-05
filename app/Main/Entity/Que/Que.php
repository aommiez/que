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
 * @Table(name="que")
 */
class Que extends BaseEntity {
    /** @Column(type="integer") */
    protected $vn_id;

    /** @Column(type="integer") */
    protected $hn_id;

    /** @Column(type="string") */
    protected $p_name;

    /** @Column(type="string") */
    protected $p_surname;

    /** @Column(type="integer") */
    protected $dep_id;

    /** @Column(type="string") */
    protected $dep_name;

    /** @Column(type="date") */
    protected $date;

    /** @Column(type="time") */
    protected $time;

    /** @Column(type="boolean") */
    protected $complete = false;

    /** @Column(type="boolean") */
    protected $skip = false;

    /**
     * @param mixed $complete
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;
    }

    /**
     * @return mixed
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $dep_id
     */
    public function setDepId($dep_id)
    {
        $this->dep_id = $dep_id;
    }

    /**
     * @return mixed
     */
    public function getDepId()
    {
        return $this->dep_id;
    }

    /**
     * @param mixed $dep_name
     */
    public function setDepName($dep_name)
    {
        $this->dep_name = $dep_name;
    }

    /**
     * @return mixed
     */
    public function getDepName()
    {
        return $this->dep_name;
    }

    /**
     * @param mixed $hn_id
     */
    public function setHnId($hn_id)
    {
        $this->hn_id = $hn_id;
    }

    /**
     * @return mixed
     */
    public function getHnId()
    {
        return $this->hn_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $p_name
     */
    public function setPName($p_name)
    {
        $this->p_name = $p_name;
    }

    /**
     * @return mixed
     */
    public function getPName()
    {
        return $this->p_name;
    }

    /**
     * @param mixed $p_surname
     */
    public function setPSurname($p_surname)
    {
        $this->p_surname = $p_surname;
    }

    /**
     * @return mixed
     */
    public function getPSurname()
    {
        return $this->p_surname;
    }

    /**
     * @param mixed $skip
     */
    public function setSkip($skip)
    {
        $this->skip = $skip;
    }

    /**
     * @return mixed
     */
    public function getSkip()
    {
        return $this->skip;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $vn_id
     */
    public function setVnId($vn_id)
    {
        $this->vn_id = $vn_id;
    }

    /**
     * @return mixed
     */
    public function getVnId()
    {
        return $this->vn_id;
    }


}