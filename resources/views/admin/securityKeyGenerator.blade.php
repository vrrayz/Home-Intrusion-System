<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        {{-- @session('success')
                            <div class="alert alert-success">
                                <p class="card-text">sdd</p>
                            </div>
                        @endsession --}}
                        <form action="{{ route('admin.keygen') }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-lg" type="submit">Generate Security Key Code</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>