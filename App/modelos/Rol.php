<?php

    class Rol {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


       






        public function obtenerRoles(){
            $this->db->query("SELECT * FROM roles");

            return $this->db->registros();
        }


        public function agregarRol($datos){
            $this->db->query("INSERT INTO roles (rol) 
                                        VALUES (:rol)");

            //vinculamos los valores
            $this->db->bind(':rol',$datos['rol']);




            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function obtenerRolId($id){
            $this->db->query("SELECT * FROM roles WHERE id_rol = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }


        public function actualizarRol($datos){
            $this->db->query("UPDATE roles SET rol=:rol
                                                WHERE id_rol = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['id_rol']);
            $this->db->bind(':rol',$datos['rol']);


            $test = "test";
            echo $test;

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function borrarRol($id){
            $this->db->query("DELETE FROM roles WHERE id_rol = :id");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

///////////////////////////////////////////////// Sesion //////////////////////////////////////////////

        public function obtenerSesionesRol($id){
            $this->db->query("SELECT * FROM sesiones 
                                        WHERE id_rol = :id
                                        ORDER BY fecha_inicio");
            $this->db->bind(':id',$id);

            return $this->db->registros();
        }


        public function cerrarSesion($id_sesion){
            $this->db->query("UPDATE sesiones SET fecha_fin = NOW()  
                                    WHERE id_sesion = :id_sesion");

            $this->db->bind(':id_sesion',$id_sesion);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
