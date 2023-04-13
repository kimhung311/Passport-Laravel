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
            @foreach ($posts as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->image_detail }}</td>
                    <td>{{ $item->total_view }}</td>
                    <td>
                        @if($item->hot =='1')         
                        {{  'Hot New' }}
                        @endif
                    </td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $offset = 3; // số link trưuóc và sau khi hiện hành
                    $row = 3;  // đọ lớn hiẻn thị limit 1 trang
                    $from = ($page - 1) * $row;

                    $colum = $page - 3;
                    $to = $page + 3;
                    $colum = $page - $offset;
                    if ($colum < 1) $colum = 1;
                    $to = $page + $offset;
                    $Previous = $page - 1;
                    $Next = $page + 1;
                    ?>
                   
                    <nav aria-label="Page navigation example " style="float: right;margin-top:20px;">
                        <ul class="pagination">
                            <?php if ($page > 1) { ?>
                            <li class="page-item"><a class="page-link btn btn-outline-warning"
                                    href="{{ route('post.index') }} ">Previous</a>
                            </li>
                            <?php } ?>
                            <?php

                            for ($i = $colum; $i < $to; $i++) {
                            ?>
                            <li class="page-item"><a class="page-link btn btn-outline-warning"
                                    href="http://127.0.0.1:8000/admin/post/list?page={{ $i }}"><?php echo $i ?></a>
                            </li>
                            <?php } ?>
                            <?php if ($colum >= $page) { ?>
                            <li class="page-item"><a class="page-link btn btn-outline-warning"
                                    href="http://127.0.0.1:8000/admin/post/list?page={{ $Next }}">Next</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
    {{-- {{ $posts->links('Admin.paginate') }} --}}

</body>
</html>