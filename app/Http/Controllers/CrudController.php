<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Crud;

class CrudController extends Controller
{
    //Show Insert Form
     public function showForm() {
        return view('crud.index');
     }

    //Show Data Paga
    public function showDataPage() {
        return view('crud.all');
    }

    public function createCrudData(Request $val){
        //Validation
        $this -> validate($val, [
            'name'  => 'required',
            'email' => 'required | unique:cruds',
            'uname' => 'required | min:6 | max:10 | unique:cruds',
            'cell'  => 'required | unique:cruds',
        ], [
            'name.required'  => 'Apnar naam nei',
        ]);

        /**
         * Data sent to Table
         */
        Crud::create([
            'name'  => $val -> name,
            'email' => $val -> email,
            'cell'  => $val -> cell,
            'uname' => $val -> uname,
            //'photo' => $val -> photo,
        ]);
        return redirect() -> back();
    }
}
