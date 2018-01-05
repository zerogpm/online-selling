@extends('layouts.app')

@section('content')
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">Create Listing</div>

               <div class="panel-body">
                   <form action="{{ route('listings.store', [$area]) }}" method="post">
                       @include('listings.partials.forms._areas')
                       @include('listings.partials.forms._categories')
                        <div class="form-group">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="body" class="control-label">Body</label>
                            <textarea name="body" id="body" cols="30" rows="8" class="form-control"></textarea>
                        </div>

                       <div class="form-group">
                           <button type="submit" class="btn btn-default">Save</button>
                       </div>

                       {{ csrf_field() }}
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection
