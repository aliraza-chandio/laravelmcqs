@extends('layouts.master')
@section('page-title') Add New Question @endsection
@section('content')
<div class="right_col" role="main">
   <div>
      <div class="page-title">
         <div class="title_left">
            <h3>Add New Question</h3>
         </div>
         <div class="title_right">
            <div class="col-md-5 col-sm-5 col-lg-12 form-group text-right top_search">
               <a href="{{ route('questions.index') }}" class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12  ">
            <div class="x_panel">
               <div class="x_content">
                  <br />
                   <form action="{{ route('questions.update',$question->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                     <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 fs18">Question*</label>
                        <div class="col-md-9 col-sm-9 ">
                           <input type="text" class="form-control" placeholder="Question" name="name" value="{{ $question->name }}" required>
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