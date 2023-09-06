<?php

namespace Core\Form;

use Core\Form\FormError;

class FormResult
{
    private array $form_errors = [];

    // On déclare le constructeur avec un parametre par defaut
    public function __construct(private string $success_message = '')
    {
    }

    // On créer son getter
    public function getSuccess_message(): string
    {
        return $this->success_message;
    }


    public function getErrors(): array
    {
        return $this->form_errors;
    }

    // On regarde si on a des erreurs
    public function hasError(): bool
    {
        return !empty($this->form_errors);
    }

    public function addError(FormError $error)
    {
        $this->form_errors[] = $error;
    }
}
