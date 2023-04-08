@extends('layouts.app-master')

@section('content')
    
    <h1 class="mb-3">crud</h1>

    <div class="bg-light p-4 rounded">
        <h1>student</h1>
        <div class="lead">
            Manage your student here.
            <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm float-right">Add new student</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="10%">#</th>
                <th scope="col" width="10%">Title</th>
                <th scope="col"  width="10%">Description</th>
                <th scope="col" width="10%">date time</th>
                <th scope="col" width="1%" colspan="3">action </th>    
            </tr>
            </thead>
            <tbody>
                @foreach($student as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->title }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->date_time }}</td>
                        <td><a href="{{ route('student.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                        <a 
                        href="javascript:void(0)" 
                        id="delete-user" 
                        data-url="{{ route('student.destroy', $user->id) }}" 
                        class="btn btn-danger"
                        >Delete</a>
                            <!-- {!! Form::open(['method' => 'DELETE','route' => ['student.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!} -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $student->links() !!}
        </div>

    </div>
    <script type="text/javascript">
      
      $(document).ready(function () {
     
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        
          /*------------------------------------------
          --------------------------------------------
          When click user on Show Button
          --------------------------------------------
          --------------------------------------------*/
          $('body').on('click', '#delete-user', function () {
    
            var userURL = $(this).data('url');
            var trObj = $(this);
    
            if(confirm("Are you sure you want to remove this user?") == true){
                  $.ajax({
                      url: userURL,
                      type: 'DELETE',
                      dataType: 'json',
                      success: function(data) {
                          alert(data.success);
                          trObj.parents("tr").remove();
                      }
                  });
            }
    
         });
          
      });
      
  </script>
@endsection
