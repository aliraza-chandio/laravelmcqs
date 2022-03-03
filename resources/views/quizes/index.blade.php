@extends('layouts.master')

@section('page-title')

Quizes

@endsection

@section('content')



<div class="right_col" role="main">

   <div class="">

      <div class="page-title">

         <div class="title_left">

            <h3>Quizes </h3>

         </div>

      </div>



      <div class="title_right">

         <div class="col-md-4 col-sm-4 col-lg-6 mr-auto form-group text-right top_search">

            <a class="btn btn-success" href="{{ route('quiz.create') }}"> Add New Quiz</a>

         </div>

      </div>


      <div class="clearfix"></div>

      <div class="row" style="display: block;">

         <div class="col-md-12 col-sm-12  ">

            <div class="x_panel">

               <div class="x_content">

                  @include('layouts.flash-message')
                  <table class="table table-striped">

                     <thead>

                        <tr>

                           <th>#</th>

                           <th>Question</th>
                           <th>Level</th>
                           <th width="280px">Action</th>

                        </tr>

                     </thead>

                     <tbody>

                     	@foreach($quizes as $quiz)
	                        <tr>

	                           <th scope="row">{{ ++$i }}</th>

                             <td><a href="{{ route('questions.edit',$quiz->question_id) }}">{{ $quiz->name }}</a></td>
                             <td>
                                @if($quiz->status == 'Basic')
                                    <label class="badge badge-success">Basic</lable> 
                                @elseif($quiz->status == 'Intermediate')
                                    <label class="badge badge-warning">Intermediate</lable> 
                                @elseif($quiz->status == 'Advance')
                                    <label class="badge badge-danger">Advance</lable> 
                                @endif
                             </td>


	                           <td>

                                    <form action="{{ route('quiz.destroy',$quiz->id) }}" method="POST">

                                        <a class="btn btn-primary"   href="{{ route('quiz.edit',$quiz->id) }}" >Edit</a>

                                

                                        @csrf

                                        @method('DELETE')

                                

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure do you wan\'t to delete the Quiz?')">Delete</button>

                                    </form>

                                </td>

	                        </tr>

                        @endforeach

                     </tbody>

                  </table>
                  <div class="row text-center justify-content-center">{{ $quizes->links() }}</div>

               </div>

            </div>

         </div>

      </div>

   </div>

</div>

@endsection