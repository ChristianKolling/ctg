<?php

namespace Admin\Service;

use Core\Service\Service;
use Admin\Model\Agenda as ModelAgenda;

class Agenda extends Service
{
    public function fetchAll($search = null)
    {
        $select = $this->getObjectManager()->createQueryBuilder()
                ->select('Agenda.id','Agenda.evento','Agenda.local','Agenda.horario','Agenda.data','Status.descricao','Status.id as status')
                ->from('Admin\Model\Agenda','Agenda')
                ->join('Agenda.status','Status')
                ->where('Agenda.evento LIKE ?1 OR Agenda.local LIKE ?1')
                ->setParameter(1,"%" . $search['search'] . "%");;
        return $select->getQuery()->getResult();
    }
    
    public function saveAgenda($values)
    {
        if($values['id'] != 0){
            $agenda = $this->getObjectManager()->find('Admin\Model\Agenda',$values['id']);    
        } else {
            $agenda = new ModelAgenda();
        }
        $agenda->setStatus($this->getObjectManager()->find('Admin\Model\Status',$values['status']));
        $agenda->setLocal($values['local']);
        $agenda->setHorario($values['horario']);
        $agenda->setEvento($values['nome-evento']);
        $agenda->setData(new \DateTime($values['data']));
        $this->getObjectManager()->persist($agenda);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new Exception('Erro ao cadastrar evento na agenda');
        }
    }
    
    public function populate($id, $form)
    {
        $agenda = $this->getObjectManager()->find('Admin\Model\Agenda',$id);
        
        $form->get('id')->setValue($agenda->getId());
        $form->get('nome-evento')->setValue($agenda->getEvento());
        $form->get('local')->setValue($agenda->getLocal());
        $form->get('data')->setValue($agenda->getData()->format('d-m-Y'));
        $form->get('horario')->setValue($agenda->getHorario());
        $form->get('status')->setValue($agenda->getStatus());
        return $form;
    }
}