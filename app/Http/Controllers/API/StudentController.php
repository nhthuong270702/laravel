<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{
    /**
     * @var StudentService
     */
    protected $student;

    /**
     * studentController Constructor
     *
     * @param studentService $studentService
     *
     */
    public function __construct(StudentService $student)
    {
        $this->student = $student;
    }
    //index
    public function index()
    {
        return $this->student->getAll();
    }

    //lay theo id
    public function show($id)
    {
        return $this->student->getById($id);
    }
    //luu lop
    public function store(StoreStudentRequest $request)
    {
        return $this->student->saveStudent($request);
    }
    //cap nhat lop
    public function update(UpdateStudentRequest $request, $id)
    {
        return $this->student->updateStudent($request, $id);
    }
    //xoa lop
    public function destroy($id)
    {
        return $this->student->deleteById($id);
    }
    //dem so hoc sinh trong lop
    public function countStudent(student $student)
    {
        return $this->student->countStudent($student);
    }
}
