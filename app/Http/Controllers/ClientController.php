<?php

namespace App\Http\Controllers;

use App\CourseOffer;
use App\EducationalBackground;
use App\EnrollmentApplication;
use App\EnrollmentRequirement;
use App\ExamCategory;
use App\Examination;
use App\ExamQuestion;
use App\StudentInformation;
use App\QuestionChoices;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = StudentInformation::where('user_id', $user_id)->first();
        $form_2_2 = EducationalBackground::where("user_id", $user_id)->get();
        $form_2_1 = EnrollmentApplication::join('course_offers', 'course_offers.id', '=', 'enrollment_applications.course_id')->where("user_id", $user_id)->first();
        $form_3 = EnrollmentRequirement::where("user_id", $user_id)->get();
        $number_of_requirements = EnrollmentRequirement::where("user_id", $user_id)->count();
        $approve_requirements = EnrollmentRequirement::where("user_id", $user_id)->where("status","APPROVE")->count();
        $exam_status = array('total'=>$number_of_requirements,'approve'=>$approve_requirements);
        if($form_3->isEmpty()){
            $form_3 = [];
        }
        return view("client.dashboard", compact('data', 'form_2_1', 'form_2_2', 'form_3','exam_status'));
    }
    public function client_view($code)
    {
        return true;
    }
    public function saveClient(Request $request)
    {
        $user = StudentInformation::where("user_id", $request->input('input_0'))->first();
        $data = array(
            "user_id" => $request->input('input_0'),
            "last_name" => $request->input('input_1'),
            "first_name" => $request->input('input_2'),
            "middle_name" => $request->input('input_3'),
            "extention_name" => $request->input('input_4'),
            "birthday" => $request->input('input_5'),
            "birth_place" => $request->input('input_6'),
            "sex" => $request->input('input_7'),
            "nationality" => $request->input('input_8'),
            "status" => $request->input('input_9'),
            "street" => $request->input('a_input_1'),
            "barangay" => $request->input('a_input_2'),
            "city" => $request->input('a_input_3'),
            "province" => $request->input('a_input_4'),
            "region" => $request->input('a_input_5'),
            "father_name" => $request->input('f_input_1'),
            "father_contact_number" => $request->input('f_input_2'),
            "mother_name" => $request->input('m_input_1'),
            "mother_contact_number" => $request->input('m_input_2'),
            "father_name" => $request->input('f_input_1'),
            "parent_address" => $request->input('a_input_6'),
        );
        if ($user) {
            $save = StudentInformation::where('id', $user->id)->update($data);
            if ($save) {
                $returnItem = array('result' => $user->id, 'message' => 'Student Information has been Update!..');
            } else {
                $returnItem = array('result' => 0, 'message' => 'Error to your data!..');
            }
        } else {
            $save = StudentInformation::create($data);
            if ($save) {
                $returnItem = array('result' => $save->id, 'message' => 'Student Information Saved..');
            } else {
                $returnItem = array('result' => 0, 'message' => 'Error to your data!..');
            };
        }
        return json_encode($returnItem);
    }
    public function saveClientApplication(Request $request)
    {
        $educBack = array();
        $user_id = Auth::user()->id;
        $school = ['Elementary School', 'Junior High School', 'Senior High School'];
        $eduBack = EducationalBackground::where("user_id", $user_id)->first();
        $application = EnrollmentApplication::where("user_id", $user_id)->first();

        $data = array(
            'user_id' => $user_id,
            "course_id" => $request->input('course'),
            "year_level" => $request->input('year_level'),
            "lrn" => $request->input('lrn'),
            "average" => $request->input('average')
        );
        if ($eduBack && $application) {
            //Update
            EnrollmentApplication::where('user_id', $user_id)->update($data);
            foreach ($request->input("schoolname") as $key => $input) {
                $educBack = array(
                    'user_id' => $user_id,
                    'school_name' => $input,
                    'school_level' => $school[$key],
                    'address' => $request->input('address')[$key],
                    'year' => $request->input('year')[$key],
                );
                EducationalBackground::where('user_id', $user_id)->where('school_level', $school[$key])->update($educBack);
            }
            $returnValue = array('result' => 1, 'message' => "Student Application Updated!");
        } else {
            // Save
            EnrollmentApplication::create($data);
            foreach ($request->input("schoolname") as $key => $input) {
                $educBack = array(
                    'user_id' => $user_id,
                    'school_name' => $input,
                    'school_level' => $school[$key],
                    'address' => $request->input('address')[$key],
                    'year' => $request->input('year')[$key],
                );
                EducationalBackground::create($educBack);
            }
            $returnValue = array('result' => 1, 'message' => "Student Application Save!");
        }

        return json_encode($returnValue);
    }
    public function saveClientRequirements(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_code = Auth::user()->client_code;
        $data = 0;
        $files = EnrollmentRequirement::where('user_id', $user_id)->get();
        try {
            if ($files) {
                foreach ($request->input("file_name") as $key => $name) {
                    if ($request->file("file_attach_" . $key)) {
                        $filename = $user_code . '_' . $name . '_' . date('yy_m_d_hi');
                        $extension = $request->file("file_attach_" . $key)->getClientOriginalExtension();
                        $filenametoStore = $filename . '.' . $extension;
                        $insertData = array(
                            "user_id" => $user_id,
                            "req_name" => $name,
                            "file_path" => $filenametoStore,
                            "comment" => "",
                            "status" => "PENDING"
                        );
                        $id = EnrollmentRequirement::create($insertData);
                        if ($id->id) {
                            $request->file("file_attach_" . $key)->storeAs('public/documents', $filenametoStore);
                        }
                        $data += 1;
                    } 
                }
                if ($data > 0) {
                    $returnValue = array('result' => 1, 'message' => "Student Requirements has been Saved!");
                } else {
                    $returnValue = array('result' => 0, 'message' => "You have an error!");
                }
            } else {
                $returnValue = array('result' => 1, 'message' => "Student Requirements has been Updated!");
            }
            return json_encode($returnValue);
        } catch (\Exception $e) {
            return json_encode($e->getMessage());
        }
    }
    //TODO: For Entrance Exam Modules
    public function entranceExam()
    {
        //TODO: The Registar and Account will be aprove all transaction before the examination of student
        $user_id = Auth::user()->id;
        $number_of_requirements = EnrollmentRequirement::where("user_id", $user_id)->count();
        $approve_requirements = EnrollmentRequirement::where("user_id", $user_id)->where("status","APPROVE")->count();
        if($number_of_requirements === $approve_requirements){
            $returnValue =  $this->question('SENIOR HIGHSCHOOL');
            $data = array(
                'dept' => 'shs',
                'categ' => $returnValue["categ"], 'exam' => $returnValue['exam'],
            );
            return view('client.entranceExam', compact('data'));
        }else{
            return back(); // if the Student not Approve to all requirements
        }
       
        
    }
    public function question($data)
    {
        $exam = Examination::where('exam_name', "ENTRANCE EXAMINATION")->where('department', $data)->first();
        $examCateg = ExamCategory::where('exam_id', $exam->id)/* ->join('exam_questions','exam_categories.id','=','exam_questions.exam_categ_id') */->get();
        foreach ($examCateg as $category) {
            $examList[] = array(
                'categ_id' => $category->id,
                "question_list" => $this->question_list($category->id)
            );
        }
        return array('exam' => $examList, 'categ' => $examCateg);
    }
    private function question_list($data)
    {
        $question =  ExamQuestion::select('id', 'question', 'score')->where('exam_categ_id', $data)->get();
        $question_list = array();
        foreach ($question as $list) {
            $question_list[] = array(
                "question_id" => $list->id,
                "question" => $list->question,
                "score" => $list->score,
                "choices" => $this->question_choices($list->id)
            );
        }
        return $question_list;
    }
    public function question_choices($data)
    {
        $value = QuestionChoices::select('id AS choice_id', 'choices_name')->where('exam_question_id', $data)->get();
        $choices_list = array();
        foreach ($value as $choices) {
            $choices_list[] = array(
                'choice_id' => $choices->choice_id,
                'choice' => $choices->choices_name
            );
        }
        return $choices_list;
    }
    public function saveExam()
    {
        //TODO: The data must have is the student ID, Question ID, and Choices ID
    }
    //TODO: End of Entrance Exam Module
}
