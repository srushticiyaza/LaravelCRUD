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
<style>
    svg {
        width: 33px !important;
    }

    div {
        margin-left: 480px !important;
    }

    .text {
        margin-left: 20px !important;
    }

    .yes {
        margin-left: 0px !important;
    }
</style>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark  ">
        <div class="container text">

            <h1 class="text-white text-center">CRUD</h1>
        </div>
        <form action="{{ route('demo.index') }}" method="GET" class="form-inline mt-3">
            <div class="form-group mr-2 yes">
                <input type="text" name="search" class="form-control mr-2" placeholder="Search Data"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-success">Search</button>
            </div>

        </form>

    </nav>
    <div class="text-right">
        <a href="demo/create" class="btn btn-dark m-4">
            <h5 class="font-bold font-weight: 700;">NEW ADD</h5>
        </a>
    </div>

    <table class="container table table-bordered mt-2">
        <thead>
            <tr>
                <th class="pr-5 pb-3">Sno.</th>
                <th class="pr-5 pb-3">City</th>
                <th class="pr-5 pb-3">State</th>
                <th class="pr-5 pb-3">Action</th>
            </tr>
        </thead>

        @foreach ($demo as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td><a href="demo/{{ $d->id }}/show" class="text-dark"> {{ $d->city }}</a></td>
                <td><a href="demo/{{ $d->id }}/show" class="text-dark"> {{ $d->state }}</a></td>
                <td>
                    <a href="demo/{{ $d->id }}/edit" class="btn btn-dark btn-sm ml-3">Edit</a>
                    <form method="POST" class="d-inline" action="{{ route('demo.delete', ['id' => $d->id]) }}">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark btn-sm ml-3">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $demo->links() }}
    </tbody>

</body>

</html>
