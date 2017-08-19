@extends('layouts.admin')

	@section('content')

		


	@extends('layouts.admin')





@section('content')

	
<div class="col-sm-6">

	<h2> Create category </h2>

	 {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}
             <div class="form-group">
                 {!! Form::label('name', 'Name:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control'])!!}
             </div>

             <div class="form-group">
                 {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
             </div>
        {!! Form::close() !!}

	
	

</div>





<div class="col-sm-6">

		<h2> All categories </h2>

		<table class="table">
       <thead>
         <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Created date</th>     
          </tr>
        </thead>
        <tbody>

        @if($categories)
            @foreach($categories as $category)

            <tr>
            	<td> {{$category->id}} </td>
            	<td> <a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}} </a></td>
             <td>{{$category->created_at->diffForhumans()}}	</td>

            </tr>
            @endforeach

          @endif

       </tbody>
     </table>


</div>




@stop