<?php
namespace App\Entity;

class Usuario extends BaseService
{
  protected $numeroCuenta;
  protected $password;

  public function getNumeroCuenta(): string {
   return $this -> numeroCuenta;
  }

  public function setNumeroCuenta($numeroCuenta) {
   $this -> numeroCuenta = $numeroCuenta;
  }

  public function getPassword(): string {
   return $this -> password;
  }

  public function setPassword($password) {
   $this -> password = $password;
  }

  public function login(string $numeroCuenta, string $password): bool {
    if(count($this->db->fetchAll("SELECT numeroCuenta FROM Usuario WHERE numeroCuenta='$numeroCuenta' AND contrasenia='$password';"))==1){
      return true;
    }
    return false;
  }
}
?>
