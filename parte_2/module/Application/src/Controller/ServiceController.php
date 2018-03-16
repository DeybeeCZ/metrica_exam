<?php
/**
* @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
* @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
* @license   http://framework.zend.com/license/new-bsd New BSD License
*/

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\DeveloperModel;

class ServiceController extends AbstractActionController
{

    public function SearchDeveloperAction()
    {
        try {
            $request = $this->getRequest();

            if($request->isPost()){
                $developer = new DeveloperModel();
                $min = $this->params()->fromPost('min',0);
                $max = $this->params()->fromPost('max',0);
                $developers=$developer->filterBySalary($min,$max);
                $xml=$developer->generateXML($developers);
                $response = $this->getResponse();

                // Set the headers and content
                $response->getHeaders()->addHeaderLine('Content-Type', 'application/soap+xml');
                $response->setContent($xml->asXML());
                return $response;
            }else{
                return new ViewModel();
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}
