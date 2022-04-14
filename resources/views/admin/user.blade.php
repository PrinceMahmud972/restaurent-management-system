<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')
        
        <div style="width: 100%; padding: 4rem; color: #f7f7f7">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="color: #666">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            
                            @if($user->user_type == '0')
                            <td><a href="{{ url('/deleteuser', $user->id) }}">Delete</a></td>
                            @else
                            <td>Not Allowed</td>
                            @endif
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        @include('admin.adminscript')
    </div>
  </body>
</html>