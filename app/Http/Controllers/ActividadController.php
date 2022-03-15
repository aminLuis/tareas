<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\actividad;

class ActividadController extends Controller
{
    public function list($id_user){
        //return actividad::where('id_user',$id_user)->get();
        return actividad::get();
    }

    public function save(Request $request){
        actividad::insert($request->all());
    }

    public function update(Request $request, $id){
        actividad::where('id','=',$id)->update($request->all());
    }

    public function delete($id){
        actividad::destroy($id);
    }
}
