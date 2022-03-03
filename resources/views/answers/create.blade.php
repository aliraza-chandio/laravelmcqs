@extends('layouts.master')
@section('page-title') Add New Answer @endsection
@section('content')
<div class="right_col" role="main">
   <div>
      <div class="page-title">
         <div class="title_left">
            <h3>Add New Answer</h3>
         </div>
         <div class="title_right">
            <div class="col-md-5 col-sm-5 col-lg-12 form-group text-right top_search">
               <a href="{{ route('answers.index') }}" class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12  ">
            <div class="x_panel">
               <div class="x_content">
                  <br />
                  <form class="form-horizontal form-label-left" action="{{ route('answers.store') }}" method="POST">
                     @csrf
                     <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 fs18">Answer*</label>
                        <div class="col-md-9 col-sm-9 ">
                           <input type="text" class="form-control" placeholder="Answer" name="answer" required>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 fs18">Is Correct Answer*</label>
                        <div class="col-md-9 col-sm-9 ">
                           Yes
                           <input type="radio" class="" name="correct_answer" value="1" required>
                           No
                           <input type="radio" class="" name="correct_answer" value="2" required>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 fs18">Questions*</label>
                        <div class="col-md-9 col-sm-9 ">
                           <select class="form-control" name="question_id" required>
                              <option value="">Please Select</option>
                              @foreach($questions as $question)
                                 <option value="{{ $question->id }}">{{ $question->name }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                           <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection