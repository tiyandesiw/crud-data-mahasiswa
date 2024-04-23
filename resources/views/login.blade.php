@extends('layouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12 col-12 mb-5">

                <div class="mt-5">
                    @include('alert')
                </div>

                <div class="card bg-light shadow-sm mt-3">

                    <div class="card-body">
                        <h3 class="text-center"><b>Login</b></h3>

                        <form action="" method="post">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="">Email</label>
                                <input type="email" name="email" required id="" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="">Password</label>
                                <input type="password" name="password" required id="" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
