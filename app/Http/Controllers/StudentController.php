<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Validator;
class StudentController extends Controller
{
    public function index(){
        $students = Student::get();
        return view('index', compact('students'));
    }

    public function studentStore(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'student_id' => 'required|numeric|unique:students',
            'email' => 'required|string|max:255|unique:students',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = new Student();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '_student_' . $file->getClientOriginalName();
            $file->move('avatar/', $name);
            $student->avatar = $name;
        }
        $student->student_id = $request->student_id;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->save();
        return redirect()->back()->with('success', 'Student registration success');
    }

    public function studentEdit($id){
        $student = Student::find($id);
        //return $student;
        return view('student_edit', compact('student'));
    }


    public function studentUpdate(Request $request, $id){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'student_id' => 'required|numeric',
            'email' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = Student::find($id);
        if ($request->hasFile('avatar')) {
            if ($student->avatar){
                unlink(public_path('avatar/').$student->avatar);
            }
            $file = $request->file('avatar');
            $name = time() . '_student_' . $file->getClientOriginalName();
            $file->move('avatar/', $name);
            $student->avatar = $name;
        }
        $student->student_id = $request->student_id;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return redirect('/')->with('success', 'Student update success');
    }

    public function studentDelete($id){
        $student = Student::find($id);
        if ($student->avatar){
            unlink(public_path('avatar/').$student->avatar);
        }
        $student->delete();
        return redirect()->back()->with('success', 'Student delete success');
    }

}
