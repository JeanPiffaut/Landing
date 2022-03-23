<?php

use JetBrains\PhpStorm\Pure;

class Form
{
    private string $id;
    private string $action;
    private string $target = "_self";
    private string $method = "POST";
    private bool $validate = true;
    private bool $autocomplete = true;
    private array $form_validations;
    private array $successful_validation;
    private array $failed_validation;

    /**
     * Configures a form with its basic features and allows you to print it in HTML format.
     * @param string $id
     * @param string $action
     * @param string $target
     * @param string $method
     * @param bool $validate
     * @param bool $autocomplete
     */
    public function __construct(
        string $id,
        string $action,
        string $method = "POST",
        string $target = "_self",
        bool $validate = true,
        bool $autocomplete = true
    ) {
        $this->setId($id);
        $this->setAction($action);
        $this->setTarget($target);
        $this->setMethod($method);
        $this->setValidate($validate);
        $this->setAutocomplete($autocomplete);
    }

    /**
     * Returns the start of the form tag applying all previously set configurations.
     * @return string
     */
    public function getFormStart(): string
    {
        $html = '<form name="' . $this->getId() . '" id="' . $this->getId() . '"';
        $html .= ' target="' . $this->getTarget() . '"';
        $html .= ' method="' . $this->getMethod() . '"';

        if ($this->isValidate()) {
            $html .= ' validate="on"';
            $html .= ' onsubmit="' . $this->getId() . '_validations(this);"';
        } else {
            $html .= ' validate="off"';
        }

        if ($this->isAutocomplete()) {
            $html .= ' autocomplete="on"';
        } else {
            $html .= ' autocomplete="off"';
        }

        $html .= '>';
        return $html;
    }

    /**
     * Returns the end of the form tag including the validation functions in case it is active.
     * @return string
     */
    #[Pure] public function getFormEnd(): string
    {
        $html = '</form>';

        if ($this->isValidate() == false) {
            return $html;
        }

        $html .= '<script>';

        // Function in charge of processing validations and their subsequent actions.
        $html .= '
            function ' . $this->getId() . '_validations(form) { 
                if(' . $this->getId() . '_form_validations(form)) { 
                    ' . $this->getId() . '_successful_actions(form); 
                    return true; 
                } else { 
                ' . $this->getId() . '_failed_actions(form);
                    return false; 
                }
            }';

        // Executes the validations set in the form
        $html .= '
            function ' . $this->getId() . '_form_validations(form) {';

        if (!empty($this->form_validations)) {
            foreach ($this->form_validations as $validation) {
                $html .= $validation;
            }
        }

        $html .= '
                return true;
            }';

        // Executes actions if validation is successful
        $html .= '
            function ' . $this->getId() . '_successful_actions(form) {';

        if (!empty($this->successful_validation)) {
            foreach ($this->successful_validation as $validation) {
                $html .= $validation;
            }
        }

        $html .= '
            }';

        // Executes actions if validation fails
        $html .= '
            function ' . $this->getId() . '_failed_actions(form) {';

        if (!empty($this->failed_validation)) {
            foreach ($this->failed_validation as $validation) {
                $html .= $validation;
            }
        }

        $html .= '
            }';
        $html .= '</script>';
        return $html;
    }

    /**
     * Adds validations to the form. These must be in Javascript language and will accumulate between them.
     * If none are added, only HTML validations will be performed.
     * @param string $script
     * @return void
     */
    public function addFormValidation(string $script)
    {
        $this->form_validations[] = $script;
    }

    /**
     * Adds actions upon successful validation. These must be in Javascript language and will accumulate between them.
     * If none are added, only HTML validations will be performed.
     * @param string $script
     * @return void
     */
    public function addSuccessfulValidation(string $script)
    {
        $this->successful_validation[] = $script;
    }

    /**
     * Adds actions on failed validation. These must be in Javascript language and will accumulate between them.
     * If none are added, only HTML validations will be performed.
     * @param string $script
     * @return void
     */
    public function addFailedValidation(string $script)
    {
        $this->failed_validation[] = $script;
    }



    #region Getter and Setter

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return bool
     */
    public function isValidate(): bool
    {
        return $this->validate;
    }

    /**
     * @param bool $validate
     */
    public function setValidate(bool $validate): void
    {
        $this->validate = $validate;
    }

    /**
     * @return bool
     */
    public function isAutocomplete(): bool
    {
        return $this->autocomplete;
    }

    /**
     * @param bool $autocomplete
     */
    public function setAutocomplete(bool $autocomplete): void
    {
        $this->autocomplete = $autocomplete;
    }

    /**
     * @return array
     */
    public function getFormValidations(): array
    {
        return $this->form_validations;
    }

    /**
     * @param array $form_validations
     */
    public function setFormValidations(array $form_validations): void
    {
        $this->form_validations = $form_validations;
    }

    /**
     * @return array
     */
    public function getSuccessfulValidation(): array
    {
        return $this->successful_validation;
    }

    /**
     * @param array $successful_validation
     */
    public function setSuccessfulValidation(array $successful_validation): void
    {
        $this->successful_validation = $successful_validation;
    }

    /**
     * @return array
     */
    public function getFailedValidation(): array
    {
        return $this->failed_validation;
    }

    /**
     * @param array $failed_validation
     */
    public function setFailedValidation(array $failed_validation): void
    {
        $this->failed_validation = $failed_validation;
    }

    #endregion Getter and Setter

}