<?php

namespace App\Http\Controllers\API;

use App\Services\GradeService;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
{
    /**
     * @var GradeService
     */
    protected $grade;

    /**
     * gradeController Constructor
     *
     * @param GradeService $gradeService
     *
     */
    public function __construct(GradeService $grade)
    {
        $this->grade = $grade;
    }
    //index
    public function index()
    {
        return $this->grade->getAll();
    }

    //lay theo id
    public function show($id)
    {
        return $this->grade->getById($id);
    }
    //luu lop
    public function store(StoreGradeRequest $request)
    {
        return $this->grade->saveGrade($request);
    }
    //cap nhat lop
    public function update(UpdateGradeRequest $request, $id)
    {
        return $this->grade->updateGrade($request, $id);
    }
    //xoa lop
    public function destroy($id)
    {
        return $this->grade->deleteById($id);
    }
    //dem so hoc sinh trong lop
    public function countStudentInGrade(Grade $grade)
    {
        return $this->grade->countStudentInGrade($grade);
    }

    //lay tat ca hoc sinh trong lop
    public function allClassStudent(Grade $grade)
    {
        return $this->grade->getAllStudentInGrade($grade);
    }
    //show hoc sinh trong lop
    public function showStudentInGrade(Grade $grade)
    {
        return $this->grade->showStudentInGrade($grade);
    }
}
