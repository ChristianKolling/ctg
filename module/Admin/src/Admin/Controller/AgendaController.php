<?php

namespace Admin\Controller;

use Core\Controller\ActionController;
use Zend\Paginator\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;
use Zend\View\Model\ViewModel;
use Admin\Form\Agenda as Form;

class AgendaController extends ActionController
{
    public function indexAction() 
    {
        $collection = new ArrayCollection($this->getService('Admin\Service\Agenda')->fetchAll());
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                  ->setItemCountPerPage(10);
        return new ViewModel(array(
            'agenda' => $paginator
        ));
    }
    
    public function novoAction()
    {
        $form = new Form($this->getObjectManager());
        
        
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
}