<?php

namespace Admin\Service;

use Core\Service\Service;
use Admin\Model\Informativo as Model;

class Informativo extends Service
{
    public function fetchAll($search = null)
    {
        $select = $this->getObjectManager()->createQueryBuilder()
                ->select('Inf.id','Inf.titulo','Inf.descricao as descinf',
                'Inf.texto','Inf.cadastro', 'Status.descricao', 
                'Status.id as status','Inf.imagem','Inf.extensao')
                ->from('Admin\Model\Informativo','Inf')
                ->join('Inf.status','Status')
                ->where('Inf.titulo LIKE ?1 OR Inf.descricao LIKE ?1 OR Inf.texto LIKE ?1')
                ->setParameter(1,"%" . $search['search'] . "%");;;
        return $select->getQuery()->getResult();
    }

    public function saveInformativo($values)
    {
        if ($values['id'] != 0) {
            $informativo = $this->getObjectmanager()->find('Admin\Model\Informativo', $values['id']);
        } else {
            $informativo = new Model();
        }
        $imagem = explode('.',$values['imagem']['tmp_name']);
        $informativo->setTitulo($values['titulo']);
        $informativo->setTexto($values['texto']);
        $informativo->setStatus($this->getObjectManager()->find('Admin\Model\Status',$values['status']));
        $informativo->setDescricao($values['descricao']);
        $informativo->setCadastro(new \DateTime('now'));
        $informativo->setImagem(str_replace('public', '', $imagem[0]));
        $informativo->setExtensao($imagem[1]);
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
