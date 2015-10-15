<?php

namespace Admin\Controller;

use Core\Controller\ActionController;
use Core\Form\Busca as BuscaForm;
use Zend\View\Model\ViewModel;
use Admin\Form\Galeria as Form;
use Admin\Validator\Galeria as GaleriaValidaor;
use Zend\Paginator\Paginator;
use Doctrine\Common\Collections\ArrayCollection;
use DoctrineModule\Paginator\Adapter\Collection as Adapter;

class GaleriaDeFotosController extends ActionController {

    public function indexAction() {
        $form = new BuscaForm('Pesquisar por álbuns');
        if ($this->getRequest()->isPost()) {
            $search = $this->getRequest()->getPost();
            $form->setData($search);
            if ($form->isValid()) {
                $values = $form->getData();
            }
        }
        $collection = new ArrayCollection($this->getService('Admin\Service\Galeria')->fetchAll($values));
        $paginator = new Paginator(new Adapter($collection));
        $paginator->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                  ->setItemCountPerPage(8);
        return new ViewModel(array(
            'form' => $form,
            'galeria' => $paginator
        ));
    }

    public function adicionarAlbumAction() {
        $form = new Form($this->getObjectManager());
        $galeriaValidator = new GaleriaValidaor();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($galeriaValidator->getInputFilter());
            $form->setData(array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(), 
                    $this->getRequest()->getFiles()->toArray())
            );
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Admin\Service\Galeria')->saveGaleria($dados);
                    $this->flashMessenger()->addSuccessMessage('Álbum criaco com Sucesso.');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('Erro ao criar álbum, por favor tente novamente.');
                }
                return $this->redirect()->toUrl('/admin/galeria-de-fotos');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }

}
