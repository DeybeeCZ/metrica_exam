<?php

namespace Application\Model;

use Application\Object\Developer;
use Zend\Config\Writer\Xml;
/**
*
*/
class DeveloperModel
{

    protected $emailByFilter='';
    protected $salaryMin=0;
    protected $salaryMax=0;

    public function getAll()
    {
        $developers=[];
        $developersJson = $this->getData();
        foreach ($developersJson as $developer) {
            $developers[]=new Developer($developer);
        }

        return $developers;
    }

    public function getById($id)
    {
        $developers=$this->getData();
        $index = array_search($id, array_column($developers, 'id'));

        return new Developer($developers[$index]);
    }

    public function setEmailByFilter($email)
    {
        $this->emailByFilter=$email;
        return $this;
    }

    public function getEmailByFilter()
    {
        return $this->emailByFilter;
    }

    public function filterByEmail($email)
    {
        $this->setEmailByFilter($email);
        $developers=$this->getData();
        $developersFilter=[];

        $filterArray = array_filter($developers, function ($current) {
            return (is_int(strpos($current['email'], $this->getEmailByFilter())));
        });

        if(count($filterArray)>0){
            foreach ($filterArray as $developer) {
                $developersFilter[] = new Developer($developer);
            }
        }

        return $developersFilter;
    }

    public function filterBySalary($min,$max)
    {
        $this->setSalaryMin($min);
        $this->setSalaryMax($max);

        $developers=$this->getData();
        $developersFilter=[];

        $filterArray = array_filter($developers, function ($current) {

            $salary = floatval(str_replace(['$',','],'',$current['salary']));

            return ($salary>=$this->getSalaryMin() && $salary<=$this->getSalaryMax());
        });

        if(count($filterArray)>0){
            foreach ($filterArray as $developer) {
                $developersFilter[] = $developer;
            }
        }

        return $developersFilter;
    }

    public function generateXML($developers)
    {

        $xml = new \SimpleXMLElement('<developers/>');
        foreach ($developers as $index => $developer) {
            $developerChild = $xml->addChild('developer');
            foreach ($developer as $key => $value) {
                # code...
                if(!is_array($value)){
                    $developerChild->addChild($key,$value);
                }else{
                    $skills = $developerChild->addChild($key);
                    foreach ($value as $i => $item) {
                        $key_int = key($item);
                        $skills->addChild($key_int,$item[$key_int]);
                    }
                }
            }
        }

        return $xml;
    }

    public function setSalaryMin($min)
    {
        $this->salaryMin=$min;
        return $this;
    }

    public function setSalaryMax($max)
    {
        $this->salaryMax=$max;
        return $this;
    }

    public function getSalaryMin()
    {
        return $this->salaryMin;
    }

    public function getSalaryMax()
    {
        return $this->salaryMax;
    }


    public function getData()
    {
        $str = file_get_contents(__DIR__.'/../../../../public/json/employees.json');

        return json_decode($str, true);
    }



}
