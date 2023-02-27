<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
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
        <h1>Create Post</h1>
        <br>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Post Title : </label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="" placeholder="Title" name="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Post Description : </label>
                <div class="col-sm-7">
                    <textarea class="form-control" id="" rows="3" placeholder="Description" name="body">{{ old('body') }}</textarea>
                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="formFile" class="col-sm-2 col-form-label">Post Image : </label>
                <div class="col-sm-7">
                    <input class="form-control" type="file" id="" name="image"
                        value="{{ old('image') }}">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="formFile" class="col-sm-2 col-form-label">User Name : </label>
                <div class="col-sm-7">
                    <select class="form-select" aria-label="Default select example" name="user_id">
                        <option value="" selected disabled>--Select User--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
