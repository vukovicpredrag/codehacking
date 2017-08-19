@extends('layouts.admin')





@section('content')


    <h1>Media</h1>

    @if($photos)


        


        <table class="table">
            <thead>
            <tr>
               <!-- <th><input type="checkbox" id="options"></th>   -->
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>


            @foreach($photos as $photo)

                <tr>
                    <!--<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td> -->
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="/images/{{$photo->file}}" alt=""></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'no date' }}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}


                             <div class="form-group">
                                 {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                             </div>
                        {!! Form::close() !!}
                 





                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

        </form>

    @endif




@stop

@section('scripts')


    <script>


        $(document).ready(function(){


            $('#options').click(function(){


                if(this.checked){

                    $('.checkBoxes').each(function(){


                        this.checked = true;

                    });

                }else {

                    $('.checkBoxes').each(function(){


                        this.checked = false;

                    });



                }






            });



        });


    </script>


@stop
