<?php

namespace App\Http\Controllers;

use App\Models\Campeoes;
use App\Models\Time;
use Illuminate\Http\Request;

class CampeoesController extends Controller
{
    public function index()
    {
        $campeoes = Campeoes::all();
        $times = Time::all();

        return view('campeoes', compact('campeoes', 'times'));
    }

    public function atualizar()
    {
        $campeoes = Campeoes::all();
        $times = Time::all();
        $tabela = '';

        foreach ($campeoes as $campeao) {
            $tabela .= '<tr><td><select required class="form-control col-md-10" id="libertadores" name="libertadores"><option value="0">Fora do Brasil</option>';

            foreach ($times as $time) {
                $tabela .= '<option value="' . $time->id . '" ';
                if ($campeao->libertadores == $time->id) {
                    $tabela .= 'selected';
                }
                $tabela .= '>' . $time->nome . '</option>';
            }
            $tabela .= '</select></td>';

            $tabela .= '<td><select required class="form-control col-md-10" id="copa_brasil" name="copa_brasil"><option value="0">Fora do Brasil</option>';

            foreach ($times as $time) {
                $tabela .= '<option value="' . $time->id . '" ';
                if ($campeao->copa_brasil == $time->id) {
                    $tabela .= 'selected';
                }
                $tabela .= '>' . $time->nome . '</option>';
            }
            $tabela .= '</select></td>';

            $tabela .= '<td><select required class="form-control col-md-10" id="sul_americana" name="sul_americana"><option value="0">Fora do Brasil</option>';

            foreach ($times as $time) {
                $tabela .= '<option value="' . $time->id . '" ';
                if ($campeao->sul_americana == $time->id) {
                    $tabela .= 'selected';
                }
                $tabela .= '>' . $time->nome . '</option>';
            }
            $tabela .= '</select></td></tr>';

            return response()->json($tabela);
        }
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        Campeoes::find('1')->update($dados);

        return response()->json($dados);
    }
}
