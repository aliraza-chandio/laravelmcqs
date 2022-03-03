<?php
  
namespace App\Http\Controllers;
   
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
  
class AnswerController extends Controller
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
        $answers = Answer::join('questions', 'questions.id', '=', 'answers.question_id')->select('answers.*','questions.name')->orderBy('question_id','ASC')->paginate(10);

        return view('answers.index',compact('answers'))
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
        return view('answers.create',compact('questions'));
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
            'answer' => 'required',
            'correct_answer' => 'required',
            'question_id' => 'required',
        ]);
    
        Answer::create($request->all());
     
        return redirect()->route('answers.index')
                        ->with('success','Answer created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return view('answers.show',compact('answer'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $questions = Question::All();
        return view('answers.edit',compact('answer','questions'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'answer' => 'required',
            'correct_answer' => 'required',
            'question_id' => 'required',
        ]);
    
        $answer->update($request->all());
    
        return redirect()->route('answers.index')
                        ->with('success','Answer updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
    
        return redirect()->route('answers.index')
                        ->with('success','Answer deleted successfully');
    }
}