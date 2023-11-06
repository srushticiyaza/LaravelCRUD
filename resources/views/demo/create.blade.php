<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaravelCRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark  ">
        <div class="container ">
            <h1 class="text-white text-center">CRUD City-State</h1>
        </div>

        <form class="form-inline" action="/action_page.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 ">
                <div class="mt-5 p-1 border">

                    <form method="POST" action="{{ route('demo.store') }}" enctype="multipart/form-data">

                        @csrf
                        <div class="font-bold m-5">
                            <label class="m-2 font-bold ">
                                <h3>city</h3>
                            </label>
                            <input type="text" name="city" class="form-control " value="{{ old('city') }}" />
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}
                            @endif
                        </div>
                        <div class="font-bold m-5 ">
                            <label class="m-2 font-bold">
                                <h3>State</h3>
                            </label>
                            <input type="text" name="state" class="form-control "value="{{ old('state') }}" />
                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark m-3 ml-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
