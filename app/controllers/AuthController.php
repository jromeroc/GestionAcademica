<?php

class AuthController extends BaseController {

    public function showLogin()
    {
        // Check if we already logged in
        if (Auth::check())
        {
            // Redirect to homepage
            return Redirect::to('')->with('success', 'Usted ya esta registrado');
        }

        // Show the login page
        return View::make('auth/login');
    }

    public function postLogin()
    {
        // Se obtienen los valores de los campos
        // id is used for login, username is used for validation to return correct error-strings
        $userdata = array(
            'nick' => Input::get('username'),
            'password' => Input::get('password')
        );

        // Declaramos las reglas para la validación.
        $rules = array(
            'nick'  => 'Required',
            'password'  => 'Required',
        );

        // Valida los campos del formulario.
        $validator = Validator::make($userdata, $rules);

        // Se verifican los campos del formulario.
        if ($validator->passes())
        {
            // Se comprueban los datos para iniciar sesion
            if (Auth::attempt($userdata))
            {
                // se redireciona a la pagina principal
                $infoUser = new User();
                Session::put('tipo', Auth::user()->type);
                Session::put('role', Auth::user()->role);

                return Redirect::to('')->with(array('ok' => 'Usted se ha logeado correctamente'));
            }
            else
            {
                // Se redireciona ala pagina de login.
                return Redirect::to('login')->withErrors(array('password' => 'Clave erronea', 'active' => 'Usuario inactivo'))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }

    public function getLogout()
    {
        Session::forget('role');
        Session::forget('tipo');
        // Log out
        Auth::logout();

        // Redirect to homepage
        return Redirect::to('/')->with('success', 'You are logged out');
    }
}

?>