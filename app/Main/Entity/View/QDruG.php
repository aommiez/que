<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/10/14
 * Time: 1:46 AM
 */

namespace Main\Entity\View;

/**
 * @Entity
 * @Table(name="q_drug")
 */
class QDrug extends BaseEntity {
    /**
     * @Id
     * @Column(type="integer")
     */
    protected $ser;

    /** @Column(type="integer") */
    protected $vn_id;

    /** @Column(type="string") */
    protected $time;

    /**
     * @param mixed $ser
     */
    public function setSer($ser)
    {
        $this->ser = $ser;
    }

    /**
     * @return mixed
     */
    public function getSer()
    {
        return $this->ser;
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
}