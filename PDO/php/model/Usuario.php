<?php

namespace model;

class Usuario{
    private $id;
    private $nome;
    private $login;
    private $email;
    private $idade;
    private $senha;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome=$nome;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login=$login;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade=$idade;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }

}
?>