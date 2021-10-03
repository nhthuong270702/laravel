<?php

namespace App\Services;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;


class StudentService
{
    //tao
    public function saveStudent(StoreStudentRequest $request){
        return Student::create($request->all());
    }
    //sua
    public function updateStudent(UpdateStudentRequest $request, $id){
        $student = Student::find($id);
        return $student->update($request->all());
    }
    //show/id
    public function getById($id) {
        return Student::find($id);
    }
    //showall
    public function getAll() {
        return Student::all();
    }
    //delete
    public function deleteById($id)
    {
        return Student::find($id)->delete();
    }
    //count
    public function countStudent($student) {
        return $student->count();
    }
}
