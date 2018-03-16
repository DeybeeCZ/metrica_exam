<?php

namespace Application\Object;
/**
 * Person Model
 */

class Person
{
    /**
     * id by Person
     *
     * @var string
     */
    protected $id = '';

    /**
     * Person's age
     *
     * @var integer
     */
    protected $age = 0;

    /**
     * Person's position
     *
     * @var string
     */
    protected $position = '';

    /**
     * Person's name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Person's gender
     *
     * @var string
     */
    protected $gender = '';

    /**
     * Person's email
     *
     * @var string
     */
    protected $email = '';

    /**
     * Person's phone
     *
     * @var string
     */
    protected $phone = '';

    /**
     * Person's address
     *
     * @var string
     */
    protected $address = '';

    public function __construct($params){
        $this->setId($params.id);
        $this->setAge($params.age);
        $this->setPosition($params.position);
        $this->setName($params.name);
        $this->setGender($params.age);
        $this->setEmail($params.age);
        $this->setPhone($params.age);
        $this->setAddress($params.age);
    }

    /**
     * @param  string $id
     * @return Person
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  integer $age
     * @return Person
     */
    public function setAge($age){
        $this->age = $age;
        return $this;
    }

    /**
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param  string $position
     * @return Person
     */
    public function setPosition($position){
        $this->position = $position;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param  string $name
     * @return Person
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $gender
     * @return Person
     */
    public function setGender($gender){
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param  string $email
     * @return Person
     */
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param  string $phone
     * @return Person
     */
    public function setPhone($phone){
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param  string $address
     * @return Person
     */
    public function setAddress($address){
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

}

 ?>
