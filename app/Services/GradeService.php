<?php

namespace App\Services;

use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeService
{
    //tao
    public function saveGrade(StoreGradeRequest $request){
        return Grade::create($request->all());
    }
    //sua
    public function updateGrade(UpdateGradeRequest $request, $id){
        $grade = Grade::find($id);
        return $grade->update($request->all());
    }
    //show/id
    public function getById($id) {
        return Grade::find($id);
    }
    //showall
    public function getAll() {
        return Grade::all();
    }
    //delete
    public function deleteById($id)
    {
        return Grade::find($id)->delete();
    }
    //count
    public function countStudentInGrade($grade) {
        return $grade->students->count();
    }
    //getAll
    public function getAllStudentInGrade($grade) {
        $result = $grade->all();
        foreach($result as $rs){
            $studentGrades[] =$rs->name;
            $studentGrades[] = $rs->students;
          }
          return $studentGrades;
    }
    //showStudentIGrade
    public function showStudentInGrade($grade) {
        return $grade->students->all();
    }
}
