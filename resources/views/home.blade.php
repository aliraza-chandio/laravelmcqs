@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <form action="/quiz-check" method="POST">
                        @csrf
                            @foreach($quizes as $quiz)
                                <div class="qblock">
                                    @php
                                    $question = \App\Models\Question::where('id',$quiz->question_id)->first();
                                    $answers = \App\Models\Answer::where('question_id',$quiz->question_id)->get();
                                    @endphp
                                    <p class="ques">{{ $question->name }}</p>
                                    <ol>
                                        @foreach($answers as $answer)
                                            <li><label><input type="radio" data-val="{{ $answer->correct_answer }}" name="{{ $answer->question_id }}" value="{{ $answer->id }}" class="chkans">{{ $answer->answer }}</label></li>
                                        @endforeach
                                    </ol>
                                </div> 
                            @endforeach
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @if(isset($_GET['page']))
                                <input type="hidden" name="page" value="{{ $_GET['page'] }}">
                            @else
                                <input type="hidden" name="page" value="1">
                            @endif
                            <input type="hidden" name="url" value="{{ $_SERVER['REQUEST_URI'] }}">
                            @if($allQuizes == isset($_GET['page']))
                                <input type="hidden" name="result" value="result">
                                <input type="submit" name="submit" value="Submit">
                            @else
                                <input type="hidden" name="result" value="remain">
                                <input type="submit" name="submit" value="Next">
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection