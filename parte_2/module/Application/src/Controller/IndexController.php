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
use Zend\Http\Request;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $developerModel = new DeveloperModel();
        $request = $this->getRequest();

        if($request->isPost()){

            $email = $this->params()->fromPost('searchEmail','');
            $developers = $developerModel->filterByEmail($email);

        }else{

            $email='';
            $developers = $developerModel->getAll();

        }

        return new ViewModel(['developers'=>$developers,'email'=>$email]);
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id', -1);
        $developerModel = new DeveloperModel();
        $developer = $developerModel->getById($id);

        return new ViewModel(['developer'=>$developer]);
    }

}
