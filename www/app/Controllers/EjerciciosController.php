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

    public function showFormularioAnagrama(): void
    {
        $data = array(
            'titulo' => 'Formulario Anagrama',
            'breadcrumb' => ['Ejercicios', 'Formulario Anagrama'],
            'seccion' => '/anagrama'
        );
        $this->view->showViews(array('templates/header.view.php', 'form-anagrama.view.php', 'templates/footer.view.php'), $data);
    }

    public function showFormularioMismasLetras(): void
    {
        $data = array(
            'titulo' => 'Formulario Mismas Letras',
            'breadcrumb' => ['Ejercicios', 'Formulario Mismas Letras'],
            'seccion' => '/mismasLetras'
        );
        $this->view->showViews(array('templates/header.view.php', 'form-mismas-letras.view.php', 'templates/footer.view.php'), $data);
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
        if (empty($data['errors'])) {
            $data['nombreAnterior'] = $data['input']['nombre'];
        }

        $this->view->showViews(array('templates/header.view.php', 'form-nombre.view.php', 'templates/footer.view.php'), $data);
    }

    public function doFormularioAnagrama(): void
    {
        $data = array(
            'titulo' => 'Ejercicio anagrama',
            'breadcrumb' => ['Ejercicios', 'Anagrama'],
            'seccion' => '/anagrama'
        );
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $data['errors'] = $this->checkAnagramaErrors($_POST);
        if (empty($data['errors'])) {
            $data['resultado'] = $this->comprobarAnagrama($_POST['texto1'], $_POST['texto2']);
        }
        $this->view->showViews(
            array('templates/header.view.php', 'anagrama.view.php', 'templates/footer.view.php'),
            $data
        );
    }

    private function comprobarAnagrama(string $texto1, string $texto2): bool
    {
        $a1 = mb_str_split($texto1);
        $a2 = mb_str_split($texto2);
        sort($a1);
        sort($a2);
        return $a1 === $a2;
    }

    public function doFormularioMismasLetras(): void
    {
        $data = array(
            'titulo' => 'Formulario Mismas Letras',
            'breadcrumb' => ['Ejercicios', 'Formulario Mismas Letras'],
            'seccion' => '/mismas-letras'
        );
        $data['errors'] = $this->checkErrorFormAnagrama($_POST);
        $data['input'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        //$data['input'] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($data['errors'])) {
            $palabra1 = $data['input']['palabra1'];
            $palabra2 = $data['input']['palabra2'];
            if(mb_strlen($palabra1) > mb_strlen($palabra2)){
                $palabraMasLarga = $palabra1;
                $palabraCorta = $palabra2;
            }else{
                $palabraMasLarga = $palabra2;
                $palabraCorta = $palabra1;
            }
            $mismasLetras = true;
            $i = 0;
            while ($mismasLetras == true && $i < mb_strlen($palabraMasLarga)) {
                $caracter = substr($palabraMasLarga, $i, 1);
                if (!str_contains($palabraCorta, $caracter)) {
                    $mismasLetras = false;
                }
                $i++;
            }
            $data['mismasLetras'] = $mismasLetras;
        }

        $this->view->showViews(array('templates/header.view.php', 'form-mismas-letras.view.php', 'templates/footer.view.php'), $data);
    }

    private function checkErrorFormNombre(array $data): array
    {
        $errors = array();
        if (!preg_match('/[\p{L}]/iu', $data['nombre'])) {
            $errors['nombre'] = 'El nombre debe contener al menos una letra';
        }
        return $errors;
    }

    private function checkErrorFormAnagrama(array $data): array
    {
        $errors = array();
        if (!preg_match('/[\p{L}]/iu', $data['palabra1'])) {
            $errors['palabra1'] = 'La palabra tiene que contener al menos una letra';
        }
        if (!preg_match('/[\p{L}]/iu', $data['palabra2'])) {
            $errors['palabra2'] = 'La palabra tiene que contener al menos una letra';
        }
        return $errors;
    }

    private function checkErrorFormMismasLetras(array $data): array
    {
        $errors = array();
        if (!preg_match('/[\p{L}]/iu', $data['palabra1'])) {
            $errors['palabra1'] = 'La palabra tiene que contener al menos una letra';
        }
        if (!preg_match('/[\p{L}]/iu', $data['palabra2'])) {
            $errors['palabra2'] = 'La palabra tiene que contener al menos una letra';
        }
        return $errors;
    }
}
