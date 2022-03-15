<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tiempo;

class TiempoController extends Controller
{
    public function list($id_actividad){
        return tiempo::where('id_actividad',$id_actividad)->get();
    }

    public function save(Request $request){
        if(!$request->ajax()){
            return redirect('/');
        }
        tiempo::insert($request->all());
    }

    public function update(Request $request, $id){
        if(!$request->ajax()){
            return redirect('/');
        }
        tiempo::where('id','=',$id)->update($request->all());
    }

    public function delete($id){
        tiempo::destroy($id);
    }
}
