<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/12/14
 * Time: 12:47 PM
 */

namespace Main\Entity\Que;


/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks
 */
class BaseEntityCall {
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

    /** @Column(type="integer") */
    protected $vn_id;

    /** @Column(type="string") */
    protected $suffix_path;

    /** @Column(type="string") */
    protected $room_path;

    /** @Column(type="string") */
    protected $room_name = "";

    /**
     * @param mixed $room_path
     */
    public function setRoomPath($room_path)
    {
        $this->room_path = $room_path;
    }

    /**
     * @return mixed
     */
    public function getRoomPath()
    {
        return $this->room_path;
    }

    /**
     * @param mixed $suffix_path
     */
    public function setSuffixPath($suffix_path)
    {
        $this->suffix_path = $suffix_path;
    }

    /**
     * @return mixed
     */
    public function getSuffixPath()
    {
        return $this->suffix_path;
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
     * @param mixed $room_name
     */
    public function setRoomName($room_name)
    {
        $this->room_name = $room_name;
    }

    /**
     * @return mixed
     */
    public function getRoomName()
    {
        return $this->room_name;
    }

    /** @PrePersist */
    public function doStuffOnPrePersist(){
        $now = new \DateTime("now");
        $this->setCreatedAt($now);
        $this->setUpdatedAt($now);
    }

    /** @PreUpdate */
    public function doStuffOnPreUpdate(){
        $now = new \DateTime("now");
        $this->setUpdatedAt($now);
    }

    public function __construct($attr = array()){
        $this->importAttr($attr);
    }

    public function importAttr($attr = array()){
        foreach($attr as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function toArray(){
        return get_object_vars($this);
    }
}