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