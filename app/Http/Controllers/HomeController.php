<?php

namespace App\Http\Controllers;

use App\Models\Campeoes;
use App\Models\Confronto;
use App\Models\Time;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $times = Time::all();

        $length = count($times);
        for ($i = 0; $i < $length; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                //compara os pontos
                if ($times[$j]->pts > $times[$min]->pts) {
                    $min = $j;
                } elseif ($times[$j]->pts == $times[$min]->pts) {
                    //compara as vitórias
                    if ($times[$j]->v > $times[$min]->v) {
                        $min = $j;
                    } elseif ($times[$j]->v == $times[$min]->v) {
                        //compara saldo de gols
                        if ($times[$j]->sg > $times[$min]->sg) {
                            $min = $j;
                        } elseif ($times[$j]->sg == $times[$min]->sg) {
                            //compara gols pró
                            if ($times[$j]->gp > $times[$min]->gp) {
                                $min = $j;
                            } elseif ($times[$j]->gp == $times[$min]->gp) {
                                //compara comfrontos diretos
                                $confrontos_casa = Confronto::where([['id_casa','=',$times[$j]->id],['id_fora','=', $times[$min]->id]])
                                ->get();

                                $confrontos_visitante = Confronto::where([['id_casa','=',$times[$min]->id],['id_fora','=', $times[$j]->id]])
                                ->get();

                                $v_casa = 0;
                                $v_fora = 0;

                                foreach ($confrontos_casa as $confronto) {
                                    if ($confronto->gols_casa > $confronto->gols_fora) {
                                        $v_casa++;
                                    } elseif ($confronto->gols_casa < $confronto->gols_fora) {
                                        $v_fora++;
                                    }
                                }

                                foreach ($confrontos_visitante as $confronto) {
                                    if ($confronto->gols_casa > $confronto->gols_fora) {
                                        $v_fora++;
                                    } elseif ($confronto->gols_casa < $confronto->gols_fora) {
                                        $v_casa++;
                                    }
                                }

                                if ($v_casa > $v_fora) {
                                    $min = $j;
                                } elseif ($v_casa == $v_fora) {
                                    //compara cartões vermelhos
                                    if ($times[$j]->cv < $times[$min]->cv) {
                                        $min = $j;
                                    } elseif ($times[$j]->cv == $times[$min]->cv) {
                                        //compara cartões amarelos
                                        if ($times[$j]->ca < $times[$min]->ca) {
                                            $min = $j;
                                        } elseif ($times[$j]->ca == $times[$min]->ca) {
                                            $number = rand(1, 2);
                                            if ($number = 1) {
                                                $min = $j;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $tmp = $times[$min];
            $times[$min] = $times[$i];
            $times[$i] = $tmp;
        }


        return view('home', compact('times'));
    }

    public function atualizar()
    {
        $times = Time::all();

        $length = count($times);
        for ($i = 0; $i < $length; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $length; $j++) {
                //compara os pontos
                if ($times[$j]->pts > $times[$min]->pts) {
                    $min = $j;
                } elseif ($times[$j]->pts == $times[$min]->pts) {
                    //compara as vitórias
                    if ($times[$j]->v > $times[$min]->v) {
                        $min = $j;
                    } elseif ($times[$j]->v == $times[$min]->v) {
                        //compara saldo de gols
                        if ($times[$j]->sg > $times[$min]->sg) {
                            $min = $j;
                        } elseif ($times[$j]->sg == $times[$min]->sg) {
                            //compara gols pró
                            if ($times[$j]->gp > $times[$min]->gp) {
                                $min = $j;
                            } elseif ($times[$j]->gp == $times[$min]->gp) {
                                //compara comfrontos diretos
                                $confrontos_casa = Confronto::where([['id_casa','=',$times[$j]->id],['id_fora','=', $times[$min]->id]])
                                ->get();

                                $confrontos_visitante = Confronto::where([['id_casa','=',$times[$min]->id],['id_fora','=', $times[$j]->id]])
                                ->get();

                                $v_casa = 0;
                                $v_fora = 0;

                                foreach ($confrontos_casa as $confronto) {
                                    if ($confronto->gols_casa > $confronto->gols_fora) {
                                        $v_casa++;
                                    } elseif ($confronto->gols_casa < $confronto->gols_fora) {
                                        $v_fora++;
                                    }
                                }

                                foreach ($confrontos_visitante as $confronto) {
                                    if ($confronto->gols_casa > $confronto->gols_fora) {
                                        $v_fora++;
                                    } elseif ($confronto->gols_casa < $confronto->gols_fora) {
                                        $v_casa++;
                                    }
                                }

                                if ($v_casa > $v_fora) {
                                    $min = $j;
                                } elseif ($v_casa == $v_fora) {
                                    //compara cartões vermelhos
                                    if ($times[$j]->cv < $times[$min]->cv) {
                                        $min = $j;
                                    } elseif ($times[$j]->cv == $times[$min]->cv) {
                                        //compara cartões amarelos
                                        if ($times[$j]->ca < $times[$min]->ca) {
                                            $min = $j;
                                        } elseif ($times[$j]->ca == $times[$min]->ca) {
                                            $number = rand(1, 2);
                                            if ($number = 1) {
                                                $min = $j;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $tmp = $times[$min];
            $times[$min] = $times[$i];
            $times[$i] = $tmp;
        }

        $gSeis = array_slice($times->toArray(), 0, 6);

        $arrayGSeis = [];
        foreach ($gSeis as $seis) {
            array_push($arrayGSeis, $seis['id']);
        }

        $campeoes = Campeoes::find('1');
        $arrayCampeoes = [$campeoes->libertadores,$campeoes->copa_brasil,$campeoes->sul_americana];
        $arrayCampeoes = array_unique($arrayCampeoes);

        $somar = 0;
        foreach ($arrayCampeoes as $campeao) {
            if (in_array($campeao, $arrayGSeis)) {
                $somar++;
            }
        }

        $tabela = '';
        $no = 1;
        foreach ($times as $time) {
            if ($no == 1) {
                $cor = '#DAA520';
            } elseif (($no >= 2) && ($no <= (6 + $somar))) {
                $cor = '#2E8B57';
            } elseif (($no >= (7 + $somar)) && ($no <= (13 + $somar))) {
                $cor = '#4682B4';
            } elseif ($no >= 17) {
                $cor = '#A52A2A';
            } else {
                $cor = '#DCDCDC';
            }

            $tabela .= '<tr>';
            $tabela .= '<td  style="border-left: 15px solid ' . $cor . '" scope="row">' . $no++ . '°</td>';
            $tabela .= '<td><img width="24px" src="img/' . $time->imagem . '" alt=""> ' . $time->nome . '</td>';
            $tabela .= '<th>' . $time->pts . '</th>';
            $tabela .= '<td>' . $time->j . '</td>';
            $tabela .= '<td>' . $time->v . '</td>';
            $tabela .= '<td>' . $time->e . '</td>';
            $tabela .= '<td>' . $time->d . '</td>';
            $tabela .= '<td>' . $time->gp . '</td>';
            $tabela .= '<td>' . $time->gc . '</td>';
            $tabela .= '<td>' . $time->sg . '</td>';
            $tabela .= '</tr>';
        }

        return response()->json($tabela);
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        Confronto::create($dados);

        $casa = Time::find($dados['id_casa']);
        $fora = Time::find($dados['id_fora']);

        if ($dados['gols_casa'] > $dados['gols_fora']) {
            //vitoria casa
            $dados_casa['pts'] = $casa->pts + 3;
            $dados_casa['v'] = $casa->v + 1;
            $dados_casa['d'] = $casa->d;
            $dados_casa['e'] = $casa->e;

            $dados_fora['pts'] = $fora->pts;
            $dados_fora['v'] = $fora->v;
            $dados_fora['d'] = $fora->d + 1;
            $dados_fora['e'] = $fora->e;
        } elseif ($dados['gols_casa'] < $dados['gols_fora']) {
            //derrota casa
            $dados_casa['pts'] = $casa->pts;
            $dados_casa['v'] = $casa->v;
            $dados_casa['d'] = $casa->d + 1;
            $dados_casa['e'] = $casa->e;

            $dados_fora['pts'] = $fora->pts + 3;
            $dados_fora['v'] = $fora->v + 1;
            $dados_fora['d'] = $fora->d;
            $dados_fora['e'] = $fora->e;
        } else {
            //empate
            $dados_casa['pts'] = $casa->pts + 1;
            $dados_casa['v'] = $casa->v;
            $dados_casa['d'] = $casa->d;
            $dados_casa['e'] = $casa->e + 1;

            $dados_fora['pts'] = $fora->pts + 1;
            $dados_fora['v'] = $fora->v;
            $dados_fora['d'] = $fora->d;
            $dados_fora['e'] = $fora->e + 1;
        }

        $dados_casa['j'] = $casa->j + 1;
        $dados_casa['gp'] = $casa->gp + $dados['gols_casa'];
        $dados_casa['gc'] = $casa->gc + $dados['gols_fora'];
        $dados_casa['sg'] = $casa->sg + ($dados['gols_casa'] - $dados['gols_fora']);
        $dados_casa['cv'] = $casa->cv + $dados['cv_casa'];
        $dados_casa['ca'] = $casa->ca + $dados['ca_casa'];

        $dados_fora['j'] = $fora->j + 1;
        $dados_fora['gp'] = $fora->gp + $dados['gols_fora'];
        $dados_fora['gc'] = $fora->gc + $dados['gols_casa'];
        $dados_fora['sg'] = $fora->sg + ($dados['gols_fora'] - $dados['gols_casa']);
        $dados_fora['cv'] = $fora->cv + $dados['cv_fora'];
        $dados_fora['ca'] = $fora->ca + $dados['ca_fora'];

        Time::find($dados['id_casa'])->update($dados_casa);
        Time::find($dados['id_fora'])->update($dados_fora);

        return response()->json($dados);
    }
}
