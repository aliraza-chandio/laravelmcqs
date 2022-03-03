@extends('layouts.master')
@section('page-title') Dashboard @endsection
@section('content')

<style>
  .h91
  {
    height: 91%;
  }
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row px-5">
            <div class="col-md-12 pl-0">
                <div class="x_content">
                    
                       <div class="row">
                            @foreach($totalQuiz as $quiz)
                               <div class="animated flipInY col-lg-6 col-md-6 col-sm-6">
                                   <a href="/admin/quiz">
                                       <div class="tile-stats border">
                                           @if($quiz->status == 'Basic')
                                               <div class="icon"><i class="fas fa-chalkboard-teacher text-success"></i></div>
                                               <div class="count mt-5 text-success">{{ $quiz->total }}</div>
                                               <h3 class="text-success">Total {{ $quiz->status }} Quiz</h3>
                                               <hr class="bg-success hrCustom">
                                           @elseif($quiz->status == 'Intermediate')
                                               <div class="icon"><i class="fas fa-chalkboard-teacher text-warning"></i></div>
                                               <div class="count mt-5 text-warning">{{ $quiz->total }}</div>
                                               <h3 class="text-warning">Total {{ $quiz->status }} Quiz</h3>
                                               <hr class="bg-warning hrCustom">
                                           @elseif($quiz->status == 'Advance')
                                               <div class="icon"><i class="fas fa-chalkboard-teacher text-danger"></i></div>
                                               <div class="count mt-5 text-danger">{{ $quiz->total }}</div>
                                               <h3 class="text-danger">Total {{ $quiz->status }} Quiz</h3>
                                               <hr class="bg-danger hrCustom">
                                           @endif
                                       </div>
                                   </a>
                               </div>
                           @endforeach
                           <div class="animated flipInY col-lg-6 col-md-6 col-sm-6">
                               <a href="/admin/questions">
                                   <div class="tile-stats border">
                                       <div class="icon mr-50"><i class="fa fa-question-circle text-primary"></i></div>
                                       <div class="count mt-5 text-primary">{{ $totalQuestions }}</div>
                                       <h3 class="text-primary">Total Questions</h3>
                                       <hr class="bg-primary hrCustom">
                                   </div>
                               </a>
                           </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection