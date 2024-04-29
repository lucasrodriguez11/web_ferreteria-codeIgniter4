<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('vista_login');
    }
        
    public function Validar_Usuario()
    {
        //valido los datos enviados por la vista_login
        //validacion de Codeigniter 
        $this->validacion->setRules([
            "usuario" => [
                "label" => "Usuario",
                "rules" => "required|min_length[5]",
                "errors" => [
                    "required" => "El campo Usuario es requerido",
                    "min_length" => "El campo Usuario debe tener al menos 5 caracteres"
                ]
            ],
            "clave" => [
                "label" => "Clave",
                "rules" => "required|min_length[5]",
                "errors" => [
                    "required" => "El campo Contraseña es requerido",
                    "min_length" => "El campo Contraseña debe tener al menos 5 caracteres"
                ]
            ]
        ]);
        // valido y si no pasa las validaciones, que retorne errores
        if(!$this->validacion->withRequest($this->request)->run()){
            $respuesta = array(
                "respuesta"=>0,
                "mensaje"=>$this->validacion->listErrors(),
                "clase_css"=>"alert alert-danger alert-dismissible"
            );
            return json_encode($respuesta);
        }
        $usuario = $this->request->getPost("usuario");
        $clave = $this->request->getPost("clave");

        //preparo los datos para buscar en la bd
        $admUsuario = array(
            "usuario"=>$usuario,
            "clave"=>$clave
        );
        $usuarioEncontrado = $this->usuarioModel->traerUsuarioLogin($admUsuario);
        //si no hay coincidencias que muestre errores
        if(!$usuarioEncontrado){
            $respuesta = array(
                "respuesta"=>0,
                "mensaje"=>"Los datos ingresados son incorrectos",
                "clase_css"=>"alert alert-danger alert-dismissible"
            );
            echo json_encode($respuesta);
            return; //evito la continuacion de la ejecucion del codigo
        }
    }
}
