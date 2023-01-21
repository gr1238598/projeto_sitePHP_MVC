<?php
include("pessoa.php");
class aluno extends pessoa{
    private $turma;
    private $ra;
    
    public function getRA(){
        return $this->ra;
    }
    public function setRA($ra){
        $this->ra = $ra;
    }
    public function getTurma(){
        return $this->turma;
    }
    public function setTurma($turma){
        $this->turma = $turma;
    }

}
?>