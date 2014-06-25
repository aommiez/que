<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 5:02 PM
 */

namespace Main\Entity\View;

/**
 * @Entity
 * @Table(name="q_visit")
 */
class QVisit extends BaseEntity {
    /**
     * @Id
     * @Column(type="integer")
     */
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

    /** @Column(type="string") */
    protected $time;

    /** @Column(type="boolean") */
    protected $dru;

    /** @Column(type="boolean") */
    protected $cas;

    /** @Column(type="string") */
    protected $pttype;

    /**
     * @param mixed $pttype
     */
    public function setPttype($pttype)
    {
        $this->pttype = $pttype;
    }

    /**
     * @return mixed
     */
    public function getPttype()
    {
        return $this->pttype;
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

    /**
     * @param mixed $cas
     */
    public function setCas($cas)
    {
        $this->cas = $cas;
    }

    /**
     * @return mixed
     */
    public function getCas()
    {
        return $this->cas;
    }

    /**
     * @param mixed $dru
     */
    public function setDru($dru)
    {
        $this->dru = $dru;
    }

    /**
     * @return mixed
     */
    public function getDru()
    {
        return $this->dru;
    }


} 