<?php

class Observador extends Eloquent
{

    protected $table = 'obsv_disciplinario';
    
    protected $fillable = array('fecha', 'id_docente','grupo','descripcion');

    public $errors;
    
    //Enviar los datos al formulario de Editar
    

}