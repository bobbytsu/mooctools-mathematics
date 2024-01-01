<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>Elementary - Subtraction</title>

    <link rel="icon" href="{{ asset('assets/logo-binus.png') }}">

</head>
<body>
    
    <!-- Title -->
    <div class="border-bottom">
        <div class="container">
            <h6 class="pt-2 lead d-flex justify-content-between">
                <a href="{{ route('app') }}" class="text-decoration-none text-dark">
                    MOOCTOOLS Kindergarten - Elementary Math Problem Solving Simulation Tools
                </a>
                @guest
                @else
                <div class="dropdown show">
                    <a class="text-decoration-none text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('managequiz') }}">Manage Quiz</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
                @endguest
            </h6>
        </div>
    </div>
    <!-- Title -->

    <!-- Content -->
    <div class="container my-5 bg-light">
        <div class="p-5">
            <!-- Heading -->
            <div class="mb-5">
                <a class="text-decoration-none font-weight-bold text-dark" href="{{ route('app') }}"><< back</a>
                <h4 class="text-center mt-5">Grade: Kindergarten</h4>
            </div>
            <!-- Heading -->
            <!-- Nav -->
            <h4>Select Category</h4>
            <ul class="nav nav-tabs border bg-white">
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('elementary/addition') ? ' active' : '' }} border-top-0 border-left-0 border-right-0 text-dark" href="{{ route('addition') }}">Addition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('elementary/subtraction') ? ' active' : '' }} border-top-0 border-left-0 border-right-0 text-dark" href="{{ route('subtraction') }}">Subtraction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('elementary/multiplication') ? ' active' : '' }} border-top-0 border-left-0 border-right-0 text-dark" href="{{ route('multiplication') }}">Multiplication</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('elementary/division') ? ' active' : '' }} border-top-0 border-left-0 border-right-0 text-dark" href="{{ route('division') }}">Division</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('elementary/exponentiation') ? ' active' : '' }} border-top-0 border-left-0 border-right-0 text-dark" href="{{ route('exponentiation') }}">Exponentiation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('elementary/square-root') ? ' active' : '' }} border-top-0 border-left-0 border-right-0 text-dark" href="{{ route('squareroot') }}">Square Root</a>
                </li>
                <li class="nav-item ml-auto">
                    <a href="{{ route('selectquiz') }}">
                        <button class="btn btn-danger rounded-0 take-a-quiz-button">
                            Take a Quiz
                        </button>
                    </a>
                </li>
            </ul>
            <!-- Nav -->
            <!-- Input -->
            <h4 class="mt-2">Enter a Math Problem 
                <small class="text-muted">(max. 2 digit numbers)</small>
            </h4>
            <form class="form-inline" method="POST" action="{{ route('subtractionsolution') }}">
                @csrf
                <div class="form-group">
                    <input class="form-control text-center rounded-0 my-2 mr-4 square-input" name="input_1" value="{{ $input_1 }}">
                    <h4 class=" my-2 mr-4">-</h4>
                    <input class="form-control text-center rounded-0 my-2 mr-4 square-input" name="input_2" value="{{ $input_2 }}">
                    <button type="submit" class="btn btn-danger rounded-0 my-2 square-button">Solve</button>
                </div>
            </form>
            <!-- Input -->
            <!-- Validation -->
            <div class="mt-2 text-danger">
                @error('input_1')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-2 text-danger">
                @error('input_2')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <!-- Validation -->
            <!-- Solution -->
            <div class="bg-white border p-4">
                <form method="POST" action="{{ route('subtractionsolution') }}">
                    @csrf
                    <input class="d-none" name="input_1" value="{{ $input_1 }}">
                    <input class="d-none" name="input_2" value="{{ $input_2 }}">
                    <button type="submit" class="btn btn-danger rounded-0 float-right">
                        <img src="{{ asset('assets/refresh.png') }}" alt="reload" height="20px">
                        Regenerate
                    </button>
                </form>
                @php
                    $delay = 1;
                @endphp
                <h5 class="drop-in">Solution</h5>
                <p class="drop-in" style="animation-delay: {{$delay}}s">Imagine this,</p>
                <h5 class="drop-in ml-xl-5 ml-lg-5 ml-md-5 ml-sm-5 ml-xs-5 ml-0 mt-5" style="animation-delay: {{$delay + 1}}s">
                    <span class="color-animation" style="animation-delay: {{$delay + 3}}s">{{$input_1}}</span>
                    <span class="color-animation" style="animation-delay: {{$delay + 6}}s">- {{$input_2}}</span>
                </h5>
                <div class="mb-5 ml-xl-5 ml-lg-5 ml-0 text-xl-left text-lg-left text-center">
                    <h5 class="drop-in line-minus-input2" style="animation-delay: {{$delay + 8}}s">- {{$input_2}}</h5>
                    <img src="{{ asset('assets/line-minus.png') }}" alt="minus" class="drop-in line-minus" style="animation-delay: {{$delay + 9}}s">
                    <p class="drop-in line-x-group" style="animation-delay: {{$delay + 2}}s">
                        <span class="d-xl-inline d-lg-inline d-md-inline d-none">(Negative)</span>
                        <img src="{{ asset('assets/line-x.png') }}" alt="line-x" class="line-x">
                        <span class="d-xl-inline d-lg-inline d-md-inline d-none">(Positive)</span>
                    </p>
                    <h5 class="subtraction-case-1c-line-result-zero-input1">
                        <span class="drop-in line-result" style="animation-delay: {{$delay + 11}}s">{{$result}}</span>
                        <span class="drop-in line-zero" style="animation-delay: {{$delay + 2}}s">0</span>
                        <span class="drop-in line-input1" style="animation-delay: {{$delay + 5}}s">{{$input_1}}</span>
                    </h5>
                </div>
                <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 12}}s">Result</h5>
                <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 13}}s"><b>{{$result}}</b></h5>
            </div>
            <!-- Solution -->
        </div>
    </div>
    <!-- Content -->

    <!-- Footer -->
    <footer class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <ul class="list-inline text-center text-md-right">
                        <li class="list-inline-item"><a href="{{ route('about') }}" class="text-decoration-none font-weight-bold text-dark">About</a></li>
                        <li class="list-inline-item"><a href="{{ route('contact') }}" class="text-decoration-none font-weight-bold text-dark">Contact</a></li>
                        <li class="list-inline-item"><a href="{{ route('privacy') }}" class="text-decoration-none font-weight-bold text-dark">Privacy</a></li>
                        <li class="list-inline-item"><a href="{{ route('terms') }}" class="text-decoration-none font-weight-bold text-dark">Terms</a></li>
                        <li class="list-inline-item"><p class="font-weight-bold text-dark">&copy; 2022 MOOCTOOLS</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>