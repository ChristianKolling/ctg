<?php

namespace Admin\Service;

use Core\Service\Service;
use Admin\Model\Informativo as Model;

class Informativo extends Service
{
    public function fetchAll()
    {
        $select = $this->getObjectManager()->createQueryBuilder()
                ->select('Inf.id','Inf.titulo','Inf.descricao as descinf','Inf.texto','Inf.cadastro','Inf.alteracao','Status.descricao', 'Status.id as status')
                ->from('Admin\Model\Informativo','Inf')
                ->join('Inf.status','Status');
        return $select->getQuery()->getResult();
    }

    public function saveInformativo($values)
    {
        if ($values['id'] != 0) {
            $informativo = $this->getObjectmanager()->find('Admin\Model\Informativo', $values['id']);
        } else {
            $informativo = new Model();
        }
        
        $informativo->setTitulo($values['titulo']);
        $informativo->setTexto($values['texto']);
        $informativo->setStatus($this->getObjectManager()->find('Admin\Model\Status',$values['status']));
        $informativo->setDescricao($values['descricao']);
        $informativo->setCadastro(new \DateTime('now'));
        $informativo->setAlteracao(null);
        $this->getObjectManager()->persist($informativo);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new \Exception('Erro ao cadastrar informativo');
        }
    }
    
    public function populate($id, $form)
    {
        $informativo = $this->getObjectManager()->find('Admin\Model\Informativo',$id);
        
        $form->get('id')->setValue($informativo->getId());
        $form->get('titulo')->setValue($informativo->getTitulo());
        $form->get('descricao')->setValue($informativo->getDescricao());
        $form->get('texto')->setValue($informativo->getTexto());
        $form->get('status')->setValue($informativo->getStatus());
        return $form;
    }
    
    public function delete($id)
    {
        $informativo = $this->getObjectManager()->find('Admin\Model\Informativo', $id);
        $this->getObjectManager()->remove($informativo);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new \Exception('O registro não pode ser excluido, por favor tente mais tarde.');
        }
    }
}
