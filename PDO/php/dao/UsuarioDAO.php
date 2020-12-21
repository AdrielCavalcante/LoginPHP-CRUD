<?php

namespace dao;

use Factory\Connect;
use model\Usuario;

$u = new usuario();

class usuarioDAO{
    public function Create(Usuario $u){
        $sql = "INSERT INTO usuario (nome, login, email, idade, senha) VALUES (?,?,?,?,?)";
        $stmt = Connect::GetConexao()->prepare($sql);
        
        $stmt->bindValue(1, $u->getNome());
        $stmt->bindValue(2, $u->getLogin());
        $stmt->bindValue(3, $u->getEmail());
        $stmt->bindValue(4, $u->getIdade());
        $stmt->bindValue(5, $u->getSenha());

        $stmt->execute();
    }

    public function Select(){
        $sql = "SELECT * FROM usuario";
        $stmt = Connect::GetConexao()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount()):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;
    }

    public function Update(Usuario $u){
        $sql = "UPDATE usuario SET nome=?, login=?, email=?, idade=?, senha=? WHERE id=?";
        $stmt = Connect::GetConexao()->prepare($sql);
        
        $stmt->bindValue(1, $u->getNome());
        $stmt->bindValue(2, $u->getLogin());
        $stmt->bindValue(3, $u->getEmail());
        $stmt->bindValue(4, $u->getIdade());
        $stmt->bindValue(5, $u->getSenha());
        $stmt->bindValue(6, $u->getId());
        $stmt->execute();
    }

    public function Delete($id){
        $sql = "DELETE FROM usuario WHERE id=?";
        $stmt = Connect::GetConexao()->prepare($sql);
        
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
?>