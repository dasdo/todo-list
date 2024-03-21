<?php

class Alert
{
    /**
     * @var array
     */
    public $get = [];

    /**
     * @param $_GET $get
     */
    public function __construct($get)
    {
        $this->get = $get;
    }

    /**
     * Display errors and success
     */
    public function getMessage()
    {
        if (!isset($this->get['m'])) {
            return "";
        }

        switch ($this->get['m']) {
            case 'Error':
                echo '<div class="alert alert-danger" role="alert">
                Error al procesar la informacion
              </div>';
                break;
            case 'Success':
                echo '<div class="alert alert-success" role="alert">
               Accion realizada correctamente
              </div>';
            default:
                # code...
                break;
        }
    }
}
