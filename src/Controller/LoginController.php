<?php
namespace App\Controller;

use App\Entity\Usuario;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Conexion;

class LoginController extends AbstractController {
  
  /**
   * @Route("/login")
   */
  public function login(Request $request, Conexion $conn) {
    $user = new Usuario($conn);
    $userForm = $this -> createForm(UserType::class, $user);
    $userForm -> handleRequest($request);

    if ($userForm -> isSubmitted() && $userForm -> isValid()) {
      if ($user -> login($user -> getNumeroCuenta(), $user -> getPassword())) {
        return $this -> redirect('/home');
      }
     return $this -> redirect('/login');
    }
    return $this -> render('login.html.twig', ['form' => $userForm -> createView()]);
  }
}
?>
