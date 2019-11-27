<?php

class huesped
{
  public $trato=$_POST['trato'];
  public $id=$_POST['id'];
  public $nombre=$_POST['nombre'];
  public $apellido=$_POST['apellido'];
  public $correo=$_POST['correo'];
  public $n_acompañantes=$_POST['n_acompañantes'];
  public $nacionalidad=$_POST['nacionalidad'];
  public $pasaporte=$_POST['pasaporte'];
  public $telefono=$_POST['telefono'];
  public function __construct($t,$i,$n,$a,$c,$num,$nac,$p,$tel)
  {
    $this->trato=$t;
    $this->id=$i;
    $this->nombre=$n;
    $this->apellido=$a;
    $this->correo=$c;
    $this->n_acompañantes=$num;
    $this->nacionalidad=$nac;
    $this->pasaporte=$p;
    $this->telefono=$tel;
  }
}


?>
