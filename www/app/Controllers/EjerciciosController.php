<?php
declare(strict_types=1);
namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class EjerciciosController extends BaseController
{
    public function showFormularioNombre(): void
    {
        $data = array(
            'titulo' => 'Formulario Nombre',
            'breadcrumb' => ['Ejercicios', 'Formulario Nombre'],
            'seccion' => '/test'
        );
        $this->view->showViews(array('templates/header.view.php', 'form-nombre.view.php', 'templates/footer.view.php'), $data);
    }

    public function doFormularioNombre(): void
    {
        $data = array(
            'titulo' => 'Formulario Nombre',
            'breadcrumb' => ['Ejercicios', 'Formulario Nombre'],
            'seccion' => '/test'
        );
        $data['errors'] = $this->checkErrorFormNombre($_POST);
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        //$data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($data['errors'])) {
            $data['nombreAnterior'] = $data['input']['nombre'];
        }

        $this->view->showViews(array('templates/header.view.php', 'form-nombre.view.php', 'templates/footer.view.php'), $data);
    }

    private function checkErrorFormNombre(array $data): array{
        $errors = array();
        if(!preg_match('/[\p{L}]/iu', $data['nombre'])){
            $errors['nombre'] = 'El nombre debe contener al menos una letra';
        }
        return $errors;
    }
}