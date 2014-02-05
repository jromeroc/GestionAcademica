<?php

class Observador extends Eloquent
{

    protected $table = 'obsv_disciplinario';
    
    protected $fillable = array('fecha', 'id_docente','grupo','descripcion');

    public $errors;
    
    }