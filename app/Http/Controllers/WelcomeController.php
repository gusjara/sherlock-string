<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function str_replace_first($from, $to, $content)
    {
        $from = '/'.preg_quote($from, '/').'/';

        return $this->preg_replace($from, $to, $content, 1);
    }

    function getMaxOccuringChar($str)  
    {  
        global $ASCII_SIZE; 
        $ASCII_SIZE = 256; 
          
        // Create array to keep the count  
        // of individual characters and  
        // initialize the array as 0  
        $count = array_fill(0, $ASCII_SIZE, NULL);  
      
        // Construct character count array  
        // from the input string.  
        $len = strlen($str);  
        $max = 0; // Initialize max count  
      
        // Traversing through the string  
        // and maintaining the count of  
        // each character  
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

    public function index()
    {   
        //$ASCII_SIZE = 256;
        //string to control
        $string = 'aabbc';
        $asise =$string;
        // return str_replace('a', '-', $string);
        //array of letters
        $letras = [];
        //range of letter a to z;
        foreach (range('a', 'z') as $letra) {
            if (substr_count($string, $letra)) {
                $letras[] = substr_count($string, $letra);
            }
        }
        // $count = array_fill(0, $ASCII_SIZE, NULL);
        // // Construct character count array  
        // // from the input string.  
        // $len = strlen($string);  
        // $max = 0; // Initialize max count  
        
        // // Traversing through the string  
        // // and maintaining the count of  
        // // each character  
        // for ($i = 0; $i < ($len); $i++)  
        // {  
        //     $count[ord($string[$i])]++;  
        //     if ($max < $count[ord($string[$i])])  
        //     {  
        //         $max = $count[ord($string[$i])];  
        //         $result = $string[$i];  
        //     }  
        // }


        //maixmo que se repite una letra
        $maximo = max($letras);
        //minimo de veces que se repite una letra
        $minimo = min($letras);
        // $quitar = 0;
        // if ($maximo == $minimo) {
        //     $quitar = $maximo;
        // }
        //dd('Maximo = '.$maximo . ' & Minimo = '. $minimo);
        if ($maximo == $minimo) {
            return "Valido ".$string;//.'    a is ' . getMaxOccuringChar($string) ;
        } else if ((array_count_values($letras)[$minimo] == 1 && ($minimo == 1 || $minimo - $maximo == 1)) || (array_count_values($letras)[$maximo] == 1 && ($maximo == 1 || $maximo - $minimo == 1))) {
           return  "Valido ".$string. ' - se quita ' . self::getMaxOccuringChar($string) ." y se obtiene  ". str_replace_first(self::getMaxOccuringChar($asise), '', $string);
        } else {
           return  "Invalido " .$string. '    a is ' . self::getMaxOccuringChar($string) ." alver ". str_replace_first(self::getMaxOccuringChar($asise), '', $string);
        }



        // return view('welcome');
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
        //
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
