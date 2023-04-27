<?php
    class Materia extends Conectar{

        /* TODO: Obtener todos los registros */
        public function get_materia(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_materia WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Insert Registro*/
        public function insert_materia($cat_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_materia (cat_id, cat_nom, est) VALUES (NULL,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Update Registro*/
        public function update_materia($cat_id,$cat_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_materia set
                cat_nom = ?
                WHERE
                cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Delete Registro*/
        public function delete_materia($ID_materia){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM materias
                WHERE 
                ID_materia = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID_materia);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /* TODO:Registro x id */
        public function get_materia_x_id($ID_materia){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM materias WHERE ID_materia = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID_materia);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>