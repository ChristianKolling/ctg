<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="plataforma")
 */
class Plataforma
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=50)
     * 
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="date")
     *
     */
    protected $cadastro;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCadastro() {
        return $this->cadastro;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCadastro($cadastro) {
        $this->cadastro = $cadastro;
    }

}