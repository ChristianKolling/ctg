<?php

namespace Admin\Service;

use Core\Service\Service;

class Agenda extends Service
{
    public function fetchAll()
    {
        $select = $this->getObjectManager()->createQueryBuilder()
                ->select('Agenda.id','Agenda.evento','Agenda.local','Agenda.horario','Agenda.data','Status.descricao','Status.id as status')
                ->from('Admin\Model\Agenda','Agenda')
                ->join('Agenda.status','Status');
        return $select->getQuery()->getResult();
    }
}