<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 2:10 PM
 */

namespace Main\Entity\View;

/**
 * @MappedSuperclass
 */
class BaseEntity {
    public function toArray(){
        return get_object_vars($this);
    }
} 