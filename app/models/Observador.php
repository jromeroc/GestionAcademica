<?php

class Observador extends Eloquent
{

    protected $table = 'obsv_alumnos';
    
    protected $fillable = array('fecha', 'id_profesor');

    public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            return true;
        }

        else
        {

        $this->errors = $validator->errors();
        return false;
        }

        }

    }