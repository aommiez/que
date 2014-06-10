<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/10/14
 * Time: 10:00 AM
 */

namespace Main\Entity\View;

/**
 * @Entity
 * @Table(name="p_image")
 */
class PImage {
    /** @Id
     * @Column(type="integer")
     */
    protected $hn_id;

    /** @Column(type="text") */
    protected $image;

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
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }


}