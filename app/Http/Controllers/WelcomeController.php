<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    //funcion para reemplazar caracteres
    public function str_replace_first($from, $to, $content)
    {
        $from = '/'.preg_quote($from, '/').'/';

        return $this->preg_replace($from, $to, $content, 1);
    }

    //funcion obtener mayor ocurrencua caracter
    function getMaxOccuringChar($str)  
    {  
        //variable para el tamaño
        $tamano_ascii = 256; 
          
        // array para caracteres individuales
        $count = array_fill(0, $tamano_ascii, NULL);  
      
        // cuento los caracteres desde el input (request)  
        $len = strlen($str);  
        $max = 0; // init cero  
      
        // recorro el string, manteniendo la cuenta de cada caracter 
        for ($i = 0; $i < ($len); $i++)  
        {  
            $count[ord($str[$i])]++;  
            if ($max < $count[ord($str[$i])])  
            {  
                $max = $count[ord($str[$i])];  
                $result = $str[$i];  
            }  
        }  
      
        return $result;  
    }  

    public function index(Request $request)
    {   
        $resultados = Result::all();
        return view('welcome', compact($resultados));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //string acontrolar
        $string = 'abcdefghhgfedecba';
        //lo reasigno
        $arr2str =$string;
        //array letras
        $letras = [];
        //range of letras a - z
        foreach (range('a', 'z') as $letra) {
            if (substr_count($string, $letra)) {
                $letras[] = substr_count($string, $letra);
            }
        }
        //valores max y min de lestras
        $maximo = max($letras);
        $minimo = min($letras);

        //para las occurencias
        $arr1 = str_split($string);
        $ocurrencias = array_count_values($arr1);
        $letraMax = max(array_flip($ocurrencias));
        $letraMin = min(array_flip($ocurrencias));
        
        //verificaciones
        if ($maximo == $minimo) {
            return "Valido ".$string;

        }elseif ((($maximo - $minimo) >1) && ($minimo==1)) {
            $ltemp = str_replace_first(self::getMaxOccuringChar($letraMin), '', $string);
            $letras_temp = [];
            foreach (range('a', 'z') as $letra2) {
                if (substr_count($ltemp, $letra2)) {
                    $letras_temp[] = substr_count($ltemp, $letra2);
                }
            }
            $maximo_t = max($letras_temp);
            $minimo_t = min($letras_temp);
            if ($maximo_t == $minimo_t) {
                return 'siii' .'  asi: '.$ltemp;
            }else{
                return 'noooooooo' .'  aso: '.$ltemp;
            }
        }elseif (($maximo - $minimo)==1 && ($minimo==1)) {
            $ltemp = str_replace_first(self::getMaxOccuringChar($letraMin), '', $string);
            $letras_temp = [];
            foreach (range('a', 'z') as $letra2) {
                if (substr_count($ltemp, $letra2)) {
                    $letras_temp[] = substr_count($ltemp, $letra2);
                }
            }
            $maximo_t = max($letras_temp);
            $minimo_t = min($letras_temp);
            if ($maximo_t == $minimo_t) {
                return 'siii' .'  asi: '.$ltemp;
            }else{
                return 'noooooooo' .'  aso: '.$ltemp;
            }
        }
        elseif (($maximo - $minimo)==1 && ($minimo > 1)) {
            $ltemp = str_replace_first(self::getMaxOccuringChar($letraMin), '', $string);
            $letras_temp = [];
            foreach (range('a', 'z') as $letra2) {
                if (substr_count($ltemp, $letra2)) {
                    $letras_temp[] = substr_count($ltemp, $letra2);
                }
            }
            $maximo_t = max($letras_temp);
            $minimo_t = min($letras_temp);
            if ($maximo_t == $minimo_t) {
                return 'siii' .'  asi: '.$ltemp;
            }else{
                return 'noooooooo' .'  asi aca 3: '.$ltemp;
            }
        }elseif (($maximo - $minimo)>1) {
            // dd($letraMin);
            $ltemp = str_replace_first(self::getMaxOccuringChar($letraMax), '', $string);
            $letras_temp = [];
            foreach (range('a', 'z') as $letra2) {
                if (substr_count($ltemp, $letra2)) {
                    $letras_temp[] = substr_count($ltemp, $letra2);
                }
            }
            $maximo_t = max($letras_temp);
            $minimo_t = min($letras_temp);
            if ($maximo_t == $minimo_t) {
                return 'siii' .'  asi: '.$ltemp;
            }else{
                return 'noooooooo' .'  asi ultumo: '.$ltemp;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
