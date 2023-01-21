<?php
class sala{
    private $idSala;
    private $capacidade;
    private $recursosMultimidia;
    private $descricao;
    

    public function getIdSala(){
        return $this->idSala;
    }
    public function setIdSala($idSala){
        $this->idSala = $idSala;
    }
    public function getCapacidade(){
        return $this->capacidade;
    }
    public function setCapacidade($capacidade){
        $this->capacidade = $capacidade;
    }
    public function getRecursosMultimidia(){
        return $this->recursosMultimidia;
    }
    public function setRecursosMultimidia($recursosMultimidia){
        $this->recursosMultimidia = $recursosMultimidia;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }    
}
?>