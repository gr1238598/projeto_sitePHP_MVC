<?php
class instituicaoEnsino{
    private $idinstituicaoEnsino;
    private $nomeInstituicaoEnsino;
    private $cnpj;

    public function getIdinstituicaoEnsino(){
        return $this->idinstituicaoEnsino;
    }
    public function setIdinstituicaoEnsino($idinstituicaoEnsino){
        $this->idinstituicaoEnsino = $idinstituicaoEnsino;
    }
    public function getNomeInstituicaoEnsino(){
        return $this->nomeInstituicaoEnsino;
    }
    public function setNomeInstituicaoEnsino($nomeInstituicaoEnsino){
        $this->nomeInstituicaoEnsino = $nomeInstituicaoEnsino;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    
}
?>