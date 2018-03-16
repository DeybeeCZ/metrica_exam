<?php

namespace Application\Object;
/**
 * Developer Model
 */
use Application\Object\Person;

class Developer extends Person
{
    /**
     * online status
     *
     * @var boolean
     */
    protected $online = false;

    /**
     * developer's salary
     *
     * @var string
     */
    protected $salary = false;

    /**
     * developer's skills
     *
     * @var array
     */
    protected $skills = [];

    public function __construct($params){

        $this->setId($params['id']);
        $this->setIsOnline($params['isOnline']);
        $this->setSalary($params['salary']);
        $this->setAge($params['age']);
        $this->setPosition($params['position']);
        $this->setName($params['name']);
        $this->setGender($params['gender']);
        $this->setEmail($params['email']);
        $this->setPhone($params['phone']);
        $this->setAddress($params['address']);
        $this->setSkills($params['skills']);

        return $this;
    }

    /**
     * @param  boolean $status
     * @return Developer
     */
    public function setIsOnline($status){
        $this->isOnline = $status;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsOnline()
    {
        return $this->isOnline;
    }

    /**
     * @param  string $salary
     * @return Developer
     */
    public function setSalary($salary){
        $this->salary = $salary;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param  array $skills
     * @return Developer
     */
    public function setSkills($skills){
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }



}

 ?>
