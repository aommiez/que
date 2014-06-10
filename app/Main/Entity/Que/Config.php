<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/9/14
 * Time: 3:06 PM
 */

namespace Main\Entity\Que;

/**
 * @Entity
 * @Table(name="config")
 */
class Config extends BaseEntity {
    /** @Column(type="string") */
    protected $name;

    /** @Column(type="string") */
    protected $deps_id;

    /**
     * @param mixed $deps_id
     */
    public function setDepsId($deps_id)
    {
        $this->deps_id = $deps_id;
    }

    /**
     * @return mixed
     */
    public function getDepsId()
    {
        return $this->deps_id;
    }

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
}