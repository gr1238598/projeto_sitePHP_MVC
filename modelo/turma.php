<?php
class turma{
    private $idTurma;
    private $numero;
    private $dataInicio;
    private $listadeAlunos;
    private $idCurso;

    public function getIdTurma(){
        return $this->idTurma;
    }
    public function setIdTurma($idTurma){
        $this->idTurma = $idTurma;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getDataInicio(){
        return $this->dataInicio;
    }
    public function setDataInicio($dataInicio){
        $this->dataInicio = $dataInicio;
    }
    public function getListadeAlunos(){
        return $this->listadeAlunos;
    }
    public function setListadeAlunos($listadeAlunos){
        $this->listadeAlunos = $listadeAlunos;
    }
    public function getIdCurso(){
        return $this->idCurso;
    }
    public function setIdCurso($idCurso){
        $this->idCurso = $idCurso;
    }
}
?>