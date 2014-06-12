<?php
namespace Main\Entity\Que;

/**
 * @Entity @Table(name="user")
 */
class User{
	/**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     **/
    protected $id;

    /** @Column(type="string") */
    protected $name;

    /** @Column(type="string") */
    protected $email;

    /** @Column(type="string") */
    protected $password;

    /** @Column(type="integer") */
    protected $level;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }
}