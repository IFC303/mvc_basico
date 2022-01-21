<?php

    class Roles extends Controlador{

        public function __construct(){

            $this->rolModelo = $this->modelo('Rol');

            $this->datos['menuActivo'] = 2;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //Obtenemos los roles
            $roles = $this->rolModelo->obtenerRoles();

            $this->datos['roles'] = $roles;

            $this->vista('roles/inicio',$this->datos);
        }


        public function agregar(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $rolNuevo = [
                    'rol' => trim($_POST['rol']),
                ];




                if ($this->rolModelo->agregarRol($rolNuevo)){
                    redireccionar('/roles');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['rol'] = (object) [
                    'rol' => '',
                ];




                $this->datos['listaRoles'] = $this->rolModelo->obtenerRoles();

                $this->vista('roles/agregar_editar',$this->datos);
            }
        }


        public function editar($id){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $rolModificado = [
                    'id_rol' => $id,
                    'rol' => trim($_POST['rol']),
                ];




                if ($this->rolModelo->actualizarRol($rolModificado)){
                    redireccionar('/roles');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                //obtenemos información del rol y el listado de roles desde del modelo
                $this->datos['rol'] = $this->rolModelo->obtenerRolId($id);
                $this->datos['listaRoles'] = $this->rolModelo->obtenerRoles();

                $this->vista('roles/agregar_editar',$this->datos);
            }
        }


        public function borrar($id){
            //obtenemos información del rol desde del modelo
            $rol = $this->rolModelo->obtenerRolId($id);

            $this->datos['id_rol'] = $rol->id_rol;
            $this->datos['rol'] = $rol->rol;

            

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->rolModelo->borrarRol($id)){
                    redireccionar('/roles');
                } else {
                    die('Algo ha fallado!!!');
                }
            }
            $this->vista('roles/borrar',$this->datos);
        }


    }
