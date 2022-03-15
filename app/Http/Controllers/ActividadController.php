<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\actividad;

class ActividadController extends Controller
{
    public function list($id){
        return actividad::where('id_user',$id)->get();
    }

    public function save(Request $request){
        if(!$request->ajax()){
            return redirect('/');
        }
        actividad::insert($request->all());
    }

    public function update(Request $request, $id){
        if(!$request->ajax()){
            return redirect('/');
        }
        actividad::where('id','=',$id)->update($request->all());
    }

    public function delete($id){
        actividad::destroy($id);
    }
}
