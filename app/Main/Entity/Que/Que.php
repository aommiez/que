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

    /** @Column(type="string") */
    protected $pt_type;

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

    /** @Column(type="time") */
    protected $time_dru;

    /** @Column(type="string") */
    protected $remark = "";

    /** @Column(type="boolean") */
    protected $skip = false;

    /** @Column(type="boolean") */
    protected $skip_dru = false;

    /** @Column(type="boolean") */
    protected $hide = false;

    /** @Column(type="boolean") */
    protected $dru = false;

    /** @Column(type="boolean") */
    protected $cas = false;

    /** @Column(type="integer") */
    protected $last_ser = 0;

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

    /**
     * @param mixed $hide
     */
    public function setHide($hide)
    {
        $this->hide = $hide;
    }

    /**
     * @return mixed
     */
    public function getHide()
    {
        return $this->hide;
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
     * @param mixed $remark
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
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
     * @param mixed $time_dru
     */
    public function setTimeDru($time_dru)
    {
        $this->time_dru = $time_dru;
    }

    /**
     * @return mixed
     */
    public function getTimeDru()
    {
        return $this->time_dru;
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
     * @param mixed $skip_dru
     */
    public function setSkipDru($skip_dru)
    {
        $this->skip_dru = $skip_dru;
    }

    /**
     * @return mixed
     */
    public function getSkipDru()
    {
        return $this->skip_dru;
    }

    /**
     * @param mixed $last_ser
     */
    public function setLastSer($last_ser)
    {
        $this->last_ser = $last_ser;
    }

    /**
     * @return mixed
     */
    public function getLastSer()
    {
        return $this->last_ser;
    }

    /**
     * @param mixed $pt_type
     */
    public function setPtType($pt_type)
    {
        $this->pt_type = $pt_type;
    }

    /**
     * @return mixed
     */
    public function getPtType()
    {
        return $this->pt_type;
    }
}