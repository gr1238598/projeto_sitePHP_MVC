<?php
class pessoa{
    private $nome;
    private $sexo;
    private $telefone;
    private $cpf;
    private $cep;
    private $cidadeorigem;
    private $estadoorigem;
    private $login;
    private $senha;

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function getEstadoorigem(){
        return $this->estadoorigem;
    }
    public function setEstadoorigem($estadoorigem){
        $this->estadoorigem = $estadoorigem;
    }
    public function getCidadeorigem(){
        return $this->cidadeorigem;
    }
    public function setCidadeorigem($cidadeorigem){
        $this->cidadeorigem = $cidadeorigem;
    }
    public function getCPF(){
        return $this->cpf;
    }
    public function setCPF($cpf){
        $this->cpf = $cpf;
    }
    public function getCEP(){
        return $this->cep;
    }
    public function setCEP($cep){
        $this->cep = $cep;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
}
?>