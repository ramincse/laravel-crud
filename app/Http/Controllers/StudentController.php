<?php

namespace App\Http\Controllers;

use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Show Insert Form
     public function showForm() {
        return view('student.index');
     }
    //Show Data Paga
    public function showDataPage() {
        return view('student.all');
    }

    public function insertStudent(Request $request){
        //Validation
        $this -> validate($request, [
            'name'  => 'required',
            'email' => 'required | unique:students',
            'uname' => 'required | min:6 | max:10 | unique:students',
            'cell'  => 'required | unique:students',
        ]);

        /**
         * Student Data sent to Table , [
        //     'name.required'  => 'Apnar naam nei',
        // ]
         */
        Student::create([
            'name'  => $request -> name,
            'email' => $request -> email,
            'cell'  => $request -> cell,
            'uname' => $request -> uname,
            //'photo' => $val -> photo,
        ]);
        return redirect() -> back();
    }
}
