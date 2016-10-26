<?php

$mensajes = array(
    "SIN_CONEXION" => array("tipo" => "2", "mensaje" => "Lo sentimos pero en este momento estamos teniendo problemas con nuestra conexión."),
    "REGISTRO_EXISTENTE" => array("tipo" => "2", "mensaje" => "Lo sentimos pero ya existe ese registro en nuestro sistema."),
    "REGISTRO_EXITOSO_AGENTE" => array("tipo" => "1", "mensaje" => "Felicidades, El agente se ha registrado con éxito. En breve él recibirá un correo electrónico para acceder a su cuenta."),
    "REGISTRO_EXITOSO_FACILIDAD" => array("tipo" => "1", "mensaje" => "Felicidades, Se ha registrado la facilidad."),
    "REGISTRO_ACTUALIZADO_AGENTE" => array("tipo" => "1", "mensaje" => "Felicidades, se actualizó la información del Agente"),
    "REGISTRO_EXITOSO_PROYECTO" => array("tipo" => "1", "mensaje" => "Felicidades,  Tu Proyecto ser publicado pronto. <br>Te enviaremos un email de confirmación tan pronto como verifiquemos la información suministrada."),
    "REGISTRO_EXITOSO_EMPRESA" => array("tipo" => "1", "mensaje" => "Felicidades, la Empresa ha sido creada con éxito y se envió un correo electrónico con la invitación."),
    "REGISTRO_EXITOSO_CONTACTO" => array("tipo" => "1", "mensaje" => " En las Próximas horas un agente te contactará para brindarte más información."),
    "REGISTRO_EXITOSO_FAVORITOS" => array("tipo" => "1", "mensaje" => "Tus Proyectos favoritos fueron guardados con éxito y estarán disponibles la próxima vez que inicies sesion con Facebook.")
  
  
);

function getMessage($mensajes,$mensaje){
  return $mensajes[$mensaje]; 
}
?>