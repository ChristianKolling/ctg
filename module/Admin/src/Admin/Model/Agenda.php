<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="agenda")
 */
class Agenda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     * 
     */
    protected $evento;
    
    /**
     * @ORM\Column(type="string", length=100)
     * 
     */
    protected $local;
    
    /**
     * @ORM\Column(type="string", length=6)
     * 
     */
    protected $horario;
    
    /**
     * @ORM\Column(type="datetime")
     *
     */
    protected $data;
        
    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     * 
     */
    protected $status;    
    
    /**
     * @ORM\Column(type="string")
     */
    protected $imagem;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $extensao;

    
    function getId() {
        return $this->id;
    }

    function getEvento() {
        return $this->evento;
    }

    function getLocal() {
        return $this->local;
    }

    function getHorario() {
        return $this->horario;
    }

    function getData() {
        return $this->data;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEvento($evento) {
        $this->evento = $evento;
    }

    function setLocal($local) {
        $this->local = $local;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getExtensao() {
        return $this->extensao;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setExtensao($extensao) {
        $this->extensao = $extensao;
    }


}   