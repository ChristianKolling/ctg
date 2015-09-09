<?php

namespace App\Service;

use Core\Service\Service as Service;
use App\Model\Usuario as ModelUsuario;

class Usuario extends Service
{
    public function saveUsuario($values)
    {
        if($values['id'] == NULL){
            $usuario = new ModelUsuario();
            $usuario->setNome($values['nome']);
            $usuario->setEmail($values['email']);
            $usuario->setSenha(md5($values['senha']));
            $usuario->setConfirmarsenha(md5($values['confirmarsenha']));
            $usuario->setSexo($this->getObjectManager()->find('App\Model\Sexo',1));
            $usuario->setStatus($this->getObjectManager()->find('App\Model\Status',1));
            $usuario->setCadastro(new \DateTime('now'));
            $this->getObjectManager()->persist($usuario);
            try {
                $this->getObjectManager()->flush();
            } catch (\Exception $ex) {
                die($ex->getMessage());exit;
                throw new \Exception('Erro: ' . $ex->getMessage());
            }
        }
    }
}