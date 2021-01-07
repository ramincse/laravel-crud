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
    	 * Photo Upload System
    	 */
        if ( $request -> hasFile('photo') ) {
        	$image = $request -> file('photo');
	        //Photo Unique Name
	        $photo_name = md5( time() . rand() ) . '.' . $image -> getClientOriginalExtension();
	        $image -> move( public_path('media/students/'), $photo_name);
        }else{
        	$photo_name = '';
        }

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
            'photo' => $photo_name,
        ]);
        return redirect() -> back() -> with('success', 'Student added successfull');
    }

    /**
     * Show All Students
     */
    public function allStudent()
    {
    	$all_students = Student::latest() -> get(); // all() for ASC
    	// return view('student.all', [
    	// 	'students' => $all_students,
    	// ]);
    	return view('student.all', compact('all_students'));
    }

    /**
     * Single student data show
     */
    public function singleStudent($id)
    {
    	$student = Student::find($id);
    	return view('student.show', [
    		'single_student' => $student,
    	]);
    }

    /**
     * Delete single student data
     */
    public function deleteStudent($id)
    {
    	$delete_student = Student::find($id);
    	$delete_student -> delete();
    	unlink('media/students/' . $delete_student -> photo);
    	return redirect() -> back() -> with('success', 'Student data deleted successfull');
    }

    /**
     * Edit Student Data
     */
    public function editStudent($id)
    {
    	$edit_student = Student::find($id);
    	return view('student.edit', [
    		'edit_student' => $edit_student,
    	]);
    }

    /**
     * Update Single Student
     */
    public function updateStudent(Request $update, $id)
    {
    	$update_data = Student::find($id);

    	if ( $update -> hasFile('new_photo') ) {
    		$image = $update -> file('new_photo');
	        //Photo Unique Name
	        $photo_name = md5( time() . rand() ) . '.' . $image -> getClientOriginalExtension();
	        $image -> move( public_path('media/students/'), $photo_name);
	        unlink('media/students/' . $update -> old_photo);
    	}else{
    		$photo_name = $update -> new_photo;
    	}

    	$update_data -> name = $update -> name;
    	$update_data -> email = $update -> email;
    	$update_data -> cell = $update -> cell;
    	$update_data -> uname = $update -> uname;
    	$update_data -> photo = $photo_name;
    	//Data Update
    	$update_data -> update();
    	return redirect() -> back() -> with('success', 'Student data updated successfull');
    }
} //End of class StudentController extends Controller
