@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @foreach($results as $result)
                        @if($result->is_correct == '1')
                            Correct Answers: <label class="badge badge-success">{{$result->total }} </label><br>
                        @elseif($result->is_correct == '2')
                            Wrong Answers : <label class="badge badge-danger">{{$result->total }} </label><br>
                        @endif

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection