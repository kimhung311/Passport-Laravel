<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

    <table class="table table-light table-bordered table-hover table-striped table-responsive">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Content</th>
                <th>Description</th>
                <th>Image</th>
                <th>Image Detail</th>
                <th>Total View</th>
                <th>Hot</th>
                <th>Category Name</th>
                <th>User Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->image_detail }}</td>
                    <td>{{ $item->total_view }}</td>
                    <td>{{ $item->hot }}</td>
                    <td>{{ $item->category_id}}</td>
                    <td>{{ $item->user_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links('Admin.paginate') }}

</body>
</html>