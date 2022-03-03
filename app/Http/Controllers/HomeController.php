<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Result;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quizes =  Quiz::where('status','Basic')->paginate(1);
        $allQuizes =  Quiz::where('status','Basic')->count();
        if (!isset($_GET['page'])) {
            $results =  Result::where('user_id',Auth::user()->id)->delete();
        }

        if ($allQuizes == 1) {
            $_GET['page'] = 1;
        }
        return view('home',compact('quizes','allQuizes'));
    }
  
    public function onlineQuiz($id)
    {
        if ($id == 1) {
            $quizes =  Quiz::where('status','Basic')->paginate(1);
            $allQuizes =  Quiz::where('status','Basic')->count();
        }
        elseif ($id == 2) {
            $quizes =  Quiz::where('status','Intermediate')->paginate(1);
            $allQuizes =  Quiz::where('status','Intermediate')->count();
        }
        elseif ($id == 3) {
            $quizes =  Quiz::where('status','Advance')->paginate(1);
            $allQuizes =  Quiz::where('status','Advance')->count();
        }
        else
        {
            $quizes =  Quiz::where('status','Basic')->paginate(1);
            $allQuizes =  Quiz::where('status','Basic')->count();
        }
        if (!isset($_GET['page'])) {
            $results =  Result::where('user_id',Auth::user()->id)->delete();
        }
        if ($allQuizes == 1) {
            $_GET['page'] = 1;
        }
        return view('online-quiz',compact('quizes','allQuizes'));
    }
  
    public function viewResult()
    {
        $results =  Result::select('is_correct', DB::raw('count(*) as total'))->where('user_id',Auth::user()->id)->groupBy('is_correct')->get();
        return view('result',compact('results'));
    }
  
    public function quizCheck(Request $request)
    {
        $answers = $request->all();
        $count = 1;
        foreach($answers as $key => $data)
        {
            if ($count == 2) {
                $questionUser = $key;
                $answerUser = $data;
                $question = Question::find($questionUser);
                $answer = Answer::find($answerUser);

                $result = Result::create([
                    'question_id' => $questionUser,
                    'answer_id' => $answerUser,
                    'user_id' => Auth::user()->id,
                    'is_correct' => $answer->correct_answer,
                ]);

            }
            if ($key == 'page') {
                $page = $data;
            }
            if ($key == 'result') {
                $isResult = $data;
            }
            if ($key == 'url') {
                $url = $data;
            }
            $count++;
        }
        $page++;
        if ($isResult == 'remain') {
            if ($url == '/home') {
                return redirect('/home?page='.$page);
            }
            else{
                return redirect($url.'?page='.$page);   
            }
        }
        else
        {
            return redirect('/result');
        }
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
    public function dashboard()
    {
                 

        $totalQuiz =  Quiz::select('quizes.status', DB::raw('count(*) as total'))->groupBy('status')->get();
        $totalQuestions =  Question::count();
        return view('admin.dashboard',compact('totalQuiz','totalQuestions'));
    }
    
}