@extends('layouts.master')

@section('page-title')

Answers

@endsection

@section('content')



<div class="right_col" role="main">

   <div class="">

      <div class="page-title">

         <div class="title_left">

            <h3>Answers </h3>

         </div>

      </div>



      <div class="title_right">

         <div class="col-md-4 col-sm-4 col-lg-6 mr-auto form-group text-right top_search">

            <a class="btn btn-success" href="{{ route('answers.create') }}"> Add New Answer</a>

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
                           <th>Answer</th>
                           <th>Correct Answer</th>
                           <th width="280px">Action</th>

                        </tr>

                     </thead>

                     <tbody>

                     	@foreach($answers as $answer)

	                        <tr>

	                           <th scope="row">{{ ++$i }}</th>

                             <td><a href="/questions/{{ $answer->question_id }}/edit">{{ $answer->name }}</a></td>
                             <td>{{ $answer->answer }}</td>
                             <td>
                                @if($answer->correct_answer == 1)
                                 <label class="badge badge-success">Yes</lable> 
                                @else
                                 <label class="badge badge-danger">No</lable> 
                                @endif
                             </td>


	                           <td>

                                    <form action="{{ route('answers.destroy',$answer->id) }}" method="POST">

                                        <a class="btn btn-primary"   href="{{ route('answers.edit',$answer->id) }}" >Edit</a>

                                

                                        @csrf

                                        @method('DELETE')

                                

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure do you wan\'t to delete the Answer?')">Delete</button>

                                    </form>

                                </td>

	                        </tr>

                        @endforeach

                     </tbody>

                  </table>
                  <div class="row text-center justify-content-center">{{ $answers->links() }}</div>

               </div>

            </div>

         </div>

      </div>

   </div>

</div>

@endsection