<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class UsuariosController extends BaseController
{
    private const TIPOS_SUSCRIPCION = ['free', 'silver', 'gold'];

    public function showUsuarios(): void
    {
        $data = array(
            'titulo' => 'Alta Usuario',
            'breadcrumb' => ['Usuarios', 'Nuevo usuario'],
            'seccion' => '/usuarios/new',
            'tiposSuscripcion' => self::TIPOS_SUSCRIPCION
        );
        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }

    public function doUsuarios(): void
    {
        $data = array(
            'titulo' => 'Alta Usuario',
            'breadcrumb' => ['Usuarios', 'Nuevo usuario'],
            'seccion' => '/usuarios/new',
            'tiposSuscripcion' => self::TIPOS_SUSCRIPCION
        );
        $data['errors'] = $this->checkErrors($_POST);
        $data['exito'] = empty($data['errors']);
        $data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $data['input']['tipo_suscripcion'] = $_POST['tipo_suscripcion'];
        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);
    }

    private function checkErrors(array $data): array
    {
        $errors = [];
        if (!preg_match('/^[\p{L}\p{N}_]+$/iu', $data['username'])) {
            $errors['username'] = 'El nombre de usuario debe estar formado por letras, números o _';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Introduzca un email válido';
        }
        if (!in_array($data['tipo_suscripcion'], self::TIPOS_SUSCRIPCION)) {
            $errors['tipo_suscripcion'] = 'Seleccione un tipo de suscripción válida';
        }
        if (!empty($data['num_tarjeta'])) {
            if (!preg_match('/^\d{16}$/', $data['num_tarjeta'])) {
                $errors['num_tarjeta'] = 'Inserte un número de tarjeta válido';
            }
        } else {
            if (in_array($data['tipo_suscripcion'], ['gold', 'silver'])) {
                $errors['tipo_suscripcion'] = 'Este tipo de suscripción requiere dar de alta una tarjeta';
            }
        }
        if (!isset($data['acepto'])) {
            $errors['acepto'] = 'Debe aceptar los términos y condiciones';
        }
        return $errors;
    }
}