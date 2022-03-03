@extends('layouts.master')
@section('page-title')
Show Class
@endsection

@section('content')

<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3>Show Class</h3>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 ">
            <div class="x_panel">
               <div class="x_content">
                     <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Title</label>
                        <div class="col-md-9 col-sm-9 ">
                           <p>{{ $class->title }}</p>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Status</label>
                        <div class="col-md-9 col-sm-9 ">
                              @if($class->status == 'Active')
                                 <div class="fa-hover"><i class="fa fa-thumbs-up"></i> Active</div>
                              @else
                                 <div class="fa-hover"><i class="fa fa-thumbs-down"></i> Deactive</div>
                              @endif
                        </div>
                     </div>
                     <div class="ln_solid"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection