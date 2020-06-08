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
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        @if(session('success'))
                            <div class="alert alert-success">
                                <p class="card-text">{{ session('success') }}</p>
                            </div>
                        @endif
                        <form action="{{ route('admin.keygen') }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-lg" type="submit">Generate Security Key Code</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Branch Name</th>
                                    <th scope="col">Security Code</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keyCodes as $keyCode)
                                    <tr>
                                        <th scope="row">{{$keyCode->id}}</th>
                                        <td>{{($keyCode->user_id === NULL)?'None':$keyCode->user->branch_name}}</td>
                                        <td>{{$keyCode->key_code}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>