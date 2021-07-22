<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $formData)
    {
        $desarrollo =[];

        if(! $formData->input('order_numeric') || ! $formData->filled('numbers') ){
            return view('dev.index', compact('desarrollo') );
        }
        $desarrollo = explode(',',$formData->numbers);
        $nveces= count($desarrollo);

        // $this->validate($formData,[
        //     'numbers' => 'required'
        // ]);
        $desarrollo1 = $this->clasificationOrder ($formData->order_numeric , $nveces, $desarrollo);
        return view('dev.index')->with(['desarrollo'=>$desarrollo1]) ;

    }

    function clasificationOrder ($order_numeric, $nveces, $desarrollo) {

        for($i=0;$i<$nveces;$i++){
            $pos=$i;
            $aux = $desarrollo[$i];
            $operador = '';
            while(($pos>0) && ($this->generateStruct($order_numeric, $desarrollo[$pos-1], $aux))){
                $desarrollo[$pos] = $desarrollo[$pos-1];
                $pos--;
            }
                $desarrollo[$pos] = $aux;
        }
        return $desarrollo;
    }

    private function generateStruct($order,$pos, $aux ){
            switch ($order) {
                case 'descendente':
                    return $pos < $aux;
                    break;
                    case 'ascendente':
                    return $pos > $aux;
                    break;
            }
    }
}