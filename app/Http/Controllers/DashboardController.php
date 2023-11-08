<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $totalFuncionarios = Funcionario::where('status', 'on')->count();
        $totalCargos = Cargo::all()->count();
        $totalDepartamentos = Departamento::all()->count();
        $totalSalario = Funcionario::where('status', 'on')->sum('salario');

        // Dados dos departamentos
        $departamentos = Departamento::all()->sortBy('nome');
        foreach($departamentos AS $departamento){
            $nomeDepartamento[] = "'".$departamento->nome."'";
        }
        return view('dashboard.index', compact('totalFuncionarios', 'totalCargos', 'totalDepartamentos', 'totalSalario'));
    }
}
