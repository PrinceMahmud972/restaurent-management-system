<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')
        

        <div style="width: 100%; padding: 4rem; color: #f7f7f7">
            <h1>Food Menu Section</h1>
            <h3>Add Food</h3>
            <form action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data" style="width: 80%; margin: 2rem auto">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" required placeholder="Write a Title">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" id="title" required placeholder="Enter a title">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="form-control" type="file" name="image" id="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Write a Description"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-light" name="submit">
                </div>
            </form>

            <h3>Food Menu</h3>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="color: #666">
                    @foreach ($foods as $food)
                        <tr>
                            <td>{{ $food->title }}</td>
                            <td>{{ $food->price }}</td>
                            <td><a href="{{ url('/deletefood', $food->id) }}">Delete</a></td>
                            
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        @include('admin.adminscript')
    </div>
  </body>
</html>