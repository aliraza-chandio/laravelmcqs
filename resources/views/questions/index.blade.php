@extends('layouts.master')

@section('page-title')

Questions

@endsection

@section('content')



<div class="right_col" role="main">

   <div class="">

      <div class="page-title">

         <div class="title_left">

            <h3>Questions </h3>

         </div>

      </div>



      <div class="title_right">

         <div class="col-md-4 col-sm-4 col-lg-6 mr-auto form-group text-right top_search">

            <a class="btn btn-success" href="{{ route('questions.create') }}"> Add New Question</a>

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


                           <th width="280px">Action</th>

                        </tr>

                     </thead>

                     <tbody>

                     	@foreach($questions as $question)

	                        <tr>

	                           <th scope="row">{{ ++$i }}</th>

                             <td>{{ $question->name }}</td>


	                           <td>

                                    <form action="{{ route('questions.destroy',$question->id) }}" method="POST">

                                

                                        {{-- <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Show</a> --}}

                                

                                        <a class="btn btn-primary"   href="{{ route('questions.edit',$question->id) }}" >Edit</a>

                                

                                        @csrf

                                        @method('DELETE')

                                

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure do you wan\'t to delete the Question?')">Delete</button>

                                    </form>

                                </td>

	                        </tr>

                        @endforeach

                     </tbody>

                  </table>
                  <div class="row text-center justify-content-center">{{ $questions->links() }}</div>

               </div>

            </div>

         </div>

      </div>

   </div>

</div>

@endsection