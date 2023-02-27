<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <br>
        <h1>Users Posts</h1>
        <br>
        <table class="table table-hover">
            <tr class="text-center">
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>User Id</th>
            </tr>
            @foreach ($posts as $post)
                <tr class="text-center">
                    <td>
                        {{ $post->id }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->body }}
                    </td>
                    <td>
                        <img src="{{ asset('images/' . $post->image) }}" width='40' height='40'
                            class="rounded mx-auto d-block" />
                    </td>
                    <td>
                        {{ $post->user_id }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
