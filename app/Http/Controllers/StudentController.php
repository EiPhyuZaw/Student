<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Grade;
use App\Section;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::pluck('name','name');
        
        return view('student.index',compact('grades'));
    }

    public function data(Request $request) {
        $model = new Collection;

        if($request->ajax()) {
            $datas = Student::all();
            foreach($datas as $value) {
                $model->push([
                    'id' => $value->id,
                    'name' => $value->name,
                    'father_name' => $value->father_name,
                    'phone_no' => $value->phone_no,
                    'address' => $value->address,
                    'grade' => $value->grade,
                    'section' => $value->section,
                ]);
            }

            return Datatables::of($model)
            ->editColumn("grade", function($model) {
                    $grade = Grade::where('id', $model['grade'])->first();
                    return $grade->name;
                })
            ->editColumn("section", function($model) {
                    $section = Section::where('id', $model['section'])->first();
                    return $section->name;
                })
            ->addColumn('edit', function($model) {
                return view('student.edit_button', compact('model'))->render();
            })
            ->addColumn('delete', function($model) {
                return view('student.delete_button', compact('model'))->render();
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
        }

        return abort(404);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        return view('student.create',compact('grades','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'grade' => $request->grade,
            'section' => $request->section,
        ]);
        return redirect('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('id',$id)->get();
        $grades = Grade::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        return view('student.edit',compact('id','grades','sections','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Student::where('id', $id)->update([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'grade' => $request->grade,
            'section' => $request->section,
        ]);
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('students');
        
    }
}
