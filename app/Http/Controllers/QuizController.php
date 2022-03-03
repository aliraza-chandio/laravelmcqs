<?php
  
namespace App\Http\Controllers;
   
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
  
class QuizController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizes = Quiz::join('questions', 'questions.id', '=', 'quizes.question_id')->select('quizes.id','quizes.question_id','quizes.status','questions.name')->paginate(10);

        return view('quizes.index',compact('quizes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::All();
        return view('quizes.create',compact('questions'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'question_id' => 'required',
        ]);

        $already = Quiz::where('status',$request->status)->where('question_id',$request->question_id)->first();

        if ($already) {
            return redirect()->route('quiz.index')
            ->with('danger','Quiz already in this Level.');   
        }
        else
        {
            Quiz::create($request->all());
            return redirect()->route('quiz.index')
                            ->with('success','Quiz created successfully.');
        }
     
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('quizes.show',compact('quiz'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $questions = Question::All();
        return view('quizes.edit',compact('quiz','questions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'status' => 'required',
            'question_id' => 'required',
        ]);
    
        $already = Quiz::where('status',$request->status)->where('question_id',$request->question_id)->first();

        if ($already) {
            return redirect()->route('quiz.index')
            ->with('danger','Quiz already in this Level.');   
        }
        else
        {
            $quiz->update($request->all());
        
            return redirect()->route('quiz.index')
                            ->with('success','Quiz updated successfully');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
    
        return redirect()->route('quiz.index')
                        ->with('success','Quiz deleted successfully');
    }
}