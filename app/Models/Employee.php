<?php

namespace App\Models;

class Employee {
    public function __construct()
    {
    }

    /**
     * ObtenerPorRango Function
     * Use test soap service
     * @param object $request
     * @return object $employees
     */
    public function obtener($request){
        $minimo = $request->minimo;
        $maximo = $request->maximo;

        $file = file_get_contents("employees.json");

        $json = json_decode($file, true);

        $employees=[];
        foreach ($json as $key => $value)
        {
            $salary = str_replace(['$',','], "", $value['salary']);
            if ($minimo<=$salary && $salary<=$maximo) {
                array_push($employees ,$value);
            }
        }
        return $employees;
    }
}