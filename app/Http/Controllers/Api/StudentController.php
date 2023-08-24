<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Client\Request;
use Illuminate\Validation\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students -> count() > 0) {
            return response() -> json([
                "status" => 200,
                "students" => $students
            ], 200);
        } else {
            return response() -> json([
                "status" => 404,
                "message" => "Record not found"
            ], 404);
        }
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required|string|max:100',
            'course' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|digit:10',
            'image' => 'required|max:100',

        ]);

        if($validator->fails()) {
            return response()->json([
                "status"=>400,
                "message"=>$validator->messages()
            ], 400);
    
        }else {

        $student = Student::create([
            'name' => $request->name,
            'course' => $request->course,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
        ]);
        if ($student) {
            return response() -> json([
                "status" => 200,
                "message" =>"Successfully created"
            ], 200);
            # code...
        }else {
            return response() -> json([
                "status" => 500,
                "message" => "something went wrong"
            ], 500);
        }
    }
}
}