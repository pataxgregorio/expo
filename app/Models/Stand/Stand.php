<?php

namespace App\Models\Stand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stand extends Model
{
    use HasFactory;
    protected $table = 'stand';
    protected $fillable = [
        'nombre',
        'ubicacion',
        'costo',
        'zona',
        'status',

    ];
    public function total_stand1()
    {
        try {
            $stand = DB::table('stand')->where('zona', 'LANCEROS')->get();
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }

    public function total_stand2()
    {
        try {
            $stand = DB::table('stand')->where('zona', 'CENTAURO')->get();
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }
    public function total_stand3()
    {
        try {
            $stand = DB::table('stand')->where('zona', 'COLEADORES')->get();
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }
    public function total_stand4()
    {
        try {
            $stand = DB::table('stand')->where('zona', 'GENERAL')->get();
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }
    public function total_stand10()
    {
        try {
            $stand = DB::table('stand')->where('zona', 'ESPIGA')->get();
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }
    public function total_stand11()
    {
        try {
            $stand = DB::table('stand')->where('zona', 'CATIRE')->get();
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }
    public function total_stand5($valornumero)
    {
        try {
            switch ($valornumero) {
                case 1:
                    $stand = DB::table('stand')->where('zona', 'T1')->get();
                    break;
                case 2:
                    $stand = DB::table('stand')->where('zona', 'T2')->get();
                    break;
                case 3:
                    $stand = DB::table('stand')->where('zona', 'T3')->get();
                    break;
                case 4:
                    $stand = DB::table('stand')->where('zona', 'T4')->get();
                    break;
                case 5:
                    $stand = DB::table('stand')->where('zona', 'T5')->get();
                    break;
                case 6:
                    $stand = DB::table('stand')->where('zona', 'T6')->get();
                    break;
                case 7:
                    $stand = DB::table('stand')->where('zona', 'T7')->get();
                    break;
                case 8:
                    $stand = DB::table('stand')->where('zona', 'T8')->get();
                    break;
                case 9:
                    $stand = DB::table('stand')->where('zona', 'T9')->get();
                    break;
                case 10:
                    $stand = DB::table('stand')->where('zona', 'T10')->get();
                    break;
                case 11:
                    $stand = DB::table('stand')->where('zona', 'P1')->get();
                    break;
                case 12:
                    $stand = DB::table('stand')->where('zona', 'P2')->get();
                    break;
                case 13:
                    $stand = DB::table('stand')->where('zona', 'P3')->get();
                    break;
                case 14:
                    $stand = DB::table('stand')->where('zona', 'P4')->get();
                    break;
                default:
                    // Código a ejecutar si $variable no coincide con ningún caso anterior
                    break;
            }
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }
    public function total_stand6($valornumero)
    {
        try {
            switch ($valornumero) {
                case 0:
                    $stand = DB::table('stand')->where('zona', 'ARCO0')->get();
                    break;
                case 1:
                    $stand = DB::table('stand')->where('zona', 'ARCO1')->get();
                    break;
                case 2:
                    $stand = DB::table('stand')->where('zona', 'ARCO2')->get();
                    break;
                case 3:
                    $stand = DB::table('stand')->where('zona', 'ARCO3')->get();
                    break;
                default:
                    // Código a ejecutar si $variable no coincide con ningún caso anterior
                    break;
            }
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }

    public function total_stand7($valornumero)
    {
        try {
            switch ($valornumero) {
                case 1:
                    $stand = DB::table('stand')->where('zona', 'COMIDA')->get();
                    break;
                default:
                    // Código a ejecutar si $variable no coincide con ningún caso anterior
                    break;
            }
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }
    public function total_stand8()
    {
        try {
            $stand = DB::table('stand')->where('zona', 'COMIDA')->get();
            return $stand;
        } catch (Throwable $e) {
            $solicitud = [];
            return $stand;
        }

    }

    public function total_pagado()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'LANCEROS')->where('status', 'PAGADO')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_pagado5()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('status', 'PAGADO')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function totalesfull() {
        $resultados = DB::table('stand')
            ->select(
                DB::raw('SUM(CASE WHEN status IN ("PAGADO", "RESERVADO") THEN 1 ELSE 0 END) AS TOTAL_STAND'),
                DB::raw('SUM(CASE WHEN status = "PAGADO" THEN 1 ELSE 0 END) AS TOTAL_PAGADAS'),
                DB::raw('SUM(CASE WHEN status = "RESERVADO" THEN 1 ELSE 0 END) AS TOTAL_RESERVADAS'),

                DB::raw('SUM(CASE WHEN status = "PAGADO" AND zona = "COLEADORES" THEN 1 ELSE 0 END) AS PAGADAS_COLEADORES'),
                DB::raw('SUM(CASE WHEN status = "RESERVADO" AND zona = "COLEADORES" THEN 1 ELSE 0 END) AS RESERVADAS_COLEADORES'),

                DB::raw('SUM(CASE WHEN status = "PAGADO" AND zona = "GENERAL" THEN 1 ELSE 0 END) AS PAGADAS_GENERAL'),
                DB::raw('SUM(CASE WHEN status = "RESERVADO" AND zona = "GENERAL" THEN 1 ELSE 0 END) AS RESERVADAS_GENERAL'),

                DB::raw('SUM(CASE WHEN status = "PAGADO" AND zona = "CATIRE PAEZ" THEN 1 ELSE 0 END) AS PAGADAS_CATIRE_PAEZ'),
                DB::raw('SUM(CASE WHEN status = "RESERVADO" AND zona = "CATIRE PAEZ" THEN 1 ELSE 0 END) AS RESERVADAS_CATIRE_PAEZ'),

                DB::raw('SUM(CASE WHEN status = "PAGADO" AND zona = "LANCEROS" THEN 1 ELSE 0 END) AS PAGADAS_LANCEROS'),
                DB::raw('SUM(CASE WHEN status = "RESERVADO" AND zona = "LANCEROS" THEN 1 ELSE 0 END) AS RESERVADAS_LANCEROS'),

                DB::raw('SUM(CASE WHEN status = "PAGADO" AND zona = "ESPIGA" THEN 1 ELSE 0 END) AS PAGADAS_ESPIGA'),
                DB::raw('SUM(CASE WHEN status = "RESERVADO" AND zona = "ESPIGA" THEN 1 ELSE 0 END) AS RESERVADAS_ESPIGA'),

                DB::raw('SUM(CASE WHEN status = "PAGADO" AND zona = "CENTAURO" THEN 1 ELSE 0 END) AS PAGADAS_CENTAURO'),
                DB::raw('SUM(CASE WHEN status = "RESERVADO" AND zona = "CENTAURO" THEN 1 ELSE 0 END) AS RESERVADAS_CENTAURO')
            )
            ->first();

        return $resultados;
    }

    public function total_reservado5()
    {

        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }
    }
    // public function total_reservado7($valornumero)
    // {
    //     switch ($valornumero) {
    //         case 1:
    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 2:

    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 3:
    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 4:
    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 5:

    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 6:

    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 7:

    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 8:
    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 9:
    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         case 10:
    //             $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->get();

    //             foreach ($reservado as $reservado2) {
    //                 $valor = property_exists($reservado2, 'reservado');

    //                 if ((isset($valor))) {

    //                     $total = $reservado2->reservado;
    //                     return $total;
    //                 } else {
    //                     $total = 0;
    //                     return $total;
    //                 }

    //             }
    //             break;
    //         default:
    //             // Código a ejecutar si $variable no coincide con ningún caso anterior
    //             break;
    //     }

    // }

    public function total_reservado()
    {

        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'LANCEROS')->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }
    }

    public function total_disponible()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'LANCEROS')->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_disponible5()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_disponible2()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'CENTAURO')->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_disponible3()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'COLEADORES')->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_pagado2()
    {
        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'CENTAURO')->where('status', 'PAGADO')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }


    }
    public function total_reservado2()
    {
        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'CENTAURO')->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }


    }
    public function total_pagado3()
    {
        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'COLEADORES')->where('status', 'PAGADO')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_reservado3()
    {
        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'COLEADORES')->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }
    }
    public function total_disponible4()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'GENERAL')->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_disponible10()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'ESPIGA')->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_disponible11()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'CATIRE')->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_pagado4()
    {
        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'GENERAL')->where('status', 'PAGADO')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_pagado10()
    {
        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'ESPIGA')->where('status', 'PAGADO')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_pagado11()
    {
        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'CATIRE')->where('status', 'PAGADO')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'pagado')) {

                $total = $pagado2->pagado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
    public function total_reservado4()
    {
        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'GENERAL')->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }
    }
    public function total_reservado10()
    {
        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'ESPIGA')->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }
    }
    public function total_reservado11()
    {
        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'CATIRE')->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }
    }
    public function total_reservado6($valornumero)
    {


        switch ($valornumero) {
            case 1:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T1')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 2:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T2')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }

                break;
            case 3:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T3')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 4:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T4')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 5:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T5')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }

                break;
            case 6:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T6')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }

                break;
            case 7:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T7')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }

                break;
            case 8:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T8')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }

                break;
            case 9:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T9')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }

                break;
            case 10:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'T10')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 11:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'P1')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 12:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'P2')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 13:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'P3')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 14:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'P4')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            default:
                // Código a ejecutar si $variable no coincide con ningún caso anterior
                break;

        }
    }

    public function total_reservado8($valornumero)
    {
        switch ($valornumero) {
            case 0:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'ARCO')->where('status', 'RESERVADO')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }

                }
                break;
            case 1:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('zona', 'ARCO1')->where('status', 'RESERVADO')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }

                }
                break;
            case 2:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'ARCO2')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }

                break;
            case 3:
                $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->where('zona', 'ARCO3')->get();

                foreach ($reservado as $reservado2) {
                    $valor = property_exists($reservado2, 'reservado');

                    if ((isset($valor))) {

                        $total = $reservado2->reservado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            default:
                // Código a ejecutar si $variable no coincide con ningún caso anterior
                break;

        }
    }

    public function total_reservado9()
    {

        $reservado = DB::table('stand')->select(DB::raw('COUNT(id) as reservado'))->where('status', 'RESERVADO')->get();

        foreach ($reservado as $reservado2) {
            $valor = property_exists($reservado2, 'reservado');

            if ((isset($valor))) {

                $total = $reservado2->reservado;
                return $total;
            } else {
                $total = 0;
                return $total;
            }

        }
    }


    public function total_pagado6($valornumero)
    {


        switch ($valornumero) {
            case 1:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T1')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 2:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T2')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 3:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T3')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 4:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T4')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 5:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T5')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 6:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T6')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 7:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T7')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 8:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T8')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 9:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T9')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 10:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'T10')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 11:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'P1')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 12:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'P2')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 13:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'P3')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 14:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'P4')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;

        }
    }


    public function total_pagado7($valornumero)
    {


        switch ($valornumero) {
            case 0:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'ARCO0')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 1:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'ARCO1')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 2:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'ARCO2')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 3:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'ARCO3')->where('status', 'PAGADO')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'pagado')) {

                        $total = $pagado2->pagado;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;

            }
        }

        public function total_pagado8()
        {

            $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as pagado'))->where('zona', 'COMIDA')->where('status', 'PAGADO')->get();
            foreach ($pagado as $pagado2) {

                if (property_exists($pagado2, 'pagado')) {

                    $total = $pagado2->pagado;
                    return $total;
                } else {
                    $total = 0;
                    return $total;
                }
            }

        }
    public function total_disponible6($valornumero)
    {


        switch ($valornumero) {
            case 1:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T1')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 2:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T2')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 3:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T3')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 4:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T4')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 5:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T5')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 6:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T6')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 7:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T7')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 8:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T8')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 9:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T9')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 10:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'T10')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 11:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'P1')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 12:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'P2')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 13:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'P3')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 14:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'P4')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;

        }
    }
    public function total_disponible7($valornumero)
    {


        switch ($valornumero) {
            case 0:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'ARCO0')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 1:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'ARCO1')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 2:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'ARCO2')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
            case 3:
                $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'ARCO3')->where('status', 'DISPONIBLE')->get();
                foreach ($pagado as $pagado2) {

                    if (property_exists($pagado2, 'disponible')) {

                        $total = $pagado2->disponible;
                        return $total;
                    } else {
                        $total = 0;
                        return $total;
                    }
                }
                break;
        }
    }
    public function total_disponible8()
    {

        $pagado = DB::table('stand')->select(DB::raw('COUNT(id) as disponible'))->where('zona', 'COMIDA')->where('status', 'DISPONIBLE')->get();
        foreach ($pagado as $pagado2) {

            if (property_exists($pagado2, 'disponible')) {

                $total = $pagado2->disponible;
                return $total;
            } else {
                $total = 0;
                return $total;
            }
        }

    }
}



