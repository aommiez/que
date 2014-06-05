<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 2:10 PM
 */

namespace Main\Entity\Que;

/**
 * @MappedSuperclass
 */
class BaseEntity {
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /** @Column(type="datetime") */
    protected $created_at;

    /** @Column(type="datetime") */
    protected $updated_at;

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /** @PrePersist */
    public function prePersist(BaseEntity $entity){
        $now = new \DateTime();
        $entity->setCreatedAt($now);
    }

    /** @PreUpdate */
    public function preUpdate(BaseEntity $entity){
        $now = new \DateTime();
        $entity->setUpdatedAt($now);
    }




    public function toArray(){
        return get_object_vars($this);
    }
} 