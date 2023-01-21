<?php
class curso{
    private $idCurso;
    private $nomeCurso;
    private $descricaoCurso;
    private $conceitoEnade;
    private $dataInicioNaIES;
    private $idArea;
    private $idInstituicao;

    public function getIdCurso(){
        return $this->idCurso;
    }
    public function setIdCurso($idCurso){
        $this->idCurso = $idCurso;
    }
    public function getNomeCurso(){
        return $this->nomeCurso;
    }
    public function setNomeCurso($nomeCurso){
        $this->nomeCurso = $nomeCurso;
    }
    public function getDescricaoCurso(){
        return $this->descricaoCurso;
    }
    public function setDescricaoCurso($descricaoCurso){
        $this->descricaoCurso = $descricaoCurso;
    }
    public function getConceitoEnade(){
        return $this->conceitoEnade;
    }
    public function setConceitoEnade($conceitoEnade){
        $this->conceitoEnade = $conceitoEnade;
    }
    public function getDataInicioNaIES(){
        return $this->dataInicioNaIES;
    }
    public function setDataInicioNaIES($dataInicioNaIES){
        $this->dataInicioNaIES = $dataInicioNaIES;
    }
    public function getIdArea(){
        return $this->idArea;
    }
    public function setIdArea($idArea){
        $this->idArea = $idArea;
    }

    public function getIdInstituicao(){
        return $this->idInstituicao;
    }
    public function setIdInstituicao($idInstituicao){
        $this->idInstituicao = $idInstituicao;
    }
}
?>