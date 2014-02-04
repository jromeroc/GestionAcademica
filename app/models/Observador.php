<?php

class Observador extends Eloquent
{

    protected $table = 'obsv_disciplinario';
    
    protected $fillable = array('fecha', 'id_profesor');

    public $errors;
    
    }