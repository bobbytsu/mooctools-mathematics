<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>Elementary - Square Root</title>

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
            <h4 class="mt-2">
                Enter a Math Problem
                <small class="text-muted">(max. 2 digit numbers)</small>
            </h4>
            <form class="form-inline" method="POST" action="{{ route('squarerootsolution') }}">
                @csrf
                <div class="form-group">
                    <h1 class="my-2 mr-2">√</h1>
                    <input class="form-control text-center rounded-0 my-2 mr-4 square-input" name="input" value="{{ $input }}">
                    <button type="submit" class="btn btn-danger rounded-0 my-2 square-button">Solve</button>
                </div>
            </form>
            <!-- Input -->
            <!-- Validation -->
            <div class="mt-2 text-danger">
                @error('input')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <!-- Validation -->
            <div class="bg-white border p-4">
                <form method="POST" action="{{ route('squarerootsolution') }}">
                    @csrf
                    <input class="d-none" name="input" value="{{ $input }}">
                    <button type="submit" class="btn btn-danger rounded-0 float-right">
                        <img src="{{ asset('assets/refresh.png') }}" alt="reload" height="20px">
                        Regenerate
                    </button>
                </form>
                <h5 class="drop-in">Solution</h5>
                @php
                    $delay = 1;
                @endphp
                <p class="drop-in" style="animation-delay: {{$delay}}s" >Let's find the find the nearest square root to <b>{{ $input }}</b>.</p>
                <img src="{{ asset('assets/exponential-table.png') }}" alt="exponential-table" width="150px" class="drop-in m-xl-5 m-lg-5 m-md-5 m-sm-5 m-4" style="animation-delay: {{$delay + 1}}s">
                <p class="drop-in" style="animation-delay: {{$delay + 6}}s">According to the table, we know that <b>{{ $nearestsquareroot }}</b> is the nearest square root to <b>{{ $input }}</b>.</p>
                <p class="drop-in" style="animation-delay: {{$delay + 11}}s">Therefore, we can put it this way:</p>
                <div class="my-5 mx-xl-5 mx-lg-5 mx-md-5 mx-sm-5 mx-xs-5 mx-0">
                    <h5 class="drop-in" style="animation-delay: {{$delay + 13}}s">
                        <span>√</span>
                        <span class="color-animation" style="animation-delay: {{$delay + 21}}s">{{ $input }}</span>
                        <span class="squareroot-case2-minus text-danger ml-4 drop-in" style="animation-delay: {{$delay + 23}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 25}}s">
                                <small>minus</small>
                            </span>
                        </span>
                        <span class="squareroot-case2-times2 text-primary drop-in" style="animation-delay: {{$delay + 33}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 35}}s">
                                <small>times 2</small>
                            </span>
                        </span>
                    </h5>
                    <h5>
                        <span class="drop-in" style="animation-delay: {{$delay + 14}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 15}}s">
                                √
                            </span>
                            <span class="color-animation" style="animation-delay: {{$delay + 16}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 26}}s">
                                    {{ $nearestsquareroot }}
                                </span>
                            </span>
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 18}}s">→</span>
                        <span class="drop-in" style="animation-delay: {{$delay + 19}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 31}}s">
                                {{ sqrt($nearestsquareroot) }}
                            </span>
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 20}}s">+</span>
                        <span class="ml-1">
                            <span class="drop-in" style="animation-delay: {{$delay + 28}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 41}}s">
                                    {{ $input - $nearestsquareroot}}
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 29}}s">
                                <hr class="hr-3 color-animation" style="animation-delay: {{$delay + 43}}s">
                            </span>
                            <span class="squareroot-case2-x2 drop-in" style="animation-delay: {{$delay + 36}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 45}}s">
                                    {{ sqrt($nearestsquareroot) * 2 }}
                                </span>
                            </span>
                        </span>
                    </h5>
                    <h5 class="squareroot-case2-result">
                        <span class="drop-in" style="animation-delay: {{$delay + 38}}s">→</span>
                        <span class="drop-in" style="animation-delay: {{$delay + 39}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 49}}s">
                                {{ sqrt($nearestsquareroot) }}
                            </span>
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 40}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 50}}s">
                                +
                            </span>
                        </span>
                        <span class="ml-1">
                            @php
                                $calculation1 = floor(($input - $nearestsquareroot) / (sqrt($nearestsquareroot) * 2) * 1000) / 1000;
                                $result = sqrt($nearestsquareroot) + $calculation1;
                                $formattedResult = rtrim(number_format($result, 3), '0');
                            @endphp
                            @if(round($calculation1) != $calculation1)
                                <span class="drop-in" style="animation-delay: {{$delay + 47}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 51}}s">
                                        {{ rtrim(number_format($calculation1, 3), '0') }}
                                    </span>
                                </span>
                            @else
                                <span class="drop-in" style="animation-delay: {{$delay + 47}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 51}}s">
                                        {{ $calculation1 }}
                                    </span>
                                </span>
                            @endif
                            <span class="ml-2 drop-in" style="animation-delay: {{$delay + 53}}s">=</span>
                            @if(round($result) != $result)
                                <span class="ml-2 drop-in" style="animation-delay: {{$delay + 54}}s">{{ $formattedResult }}</span>
                            @else
                                <span class="ml-2 drop-in" style="animation-delay: {{$delay + 54}}s">{{ $result }}</span>
                            @endif
                        </span>
                    </h5>
                </div>
                <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 55}}s">Result</h5>
                @if(round($result) != $result)
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 56}}s"><b>{{ $formattedResult }}</b></h5>
                @else
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 56}}s"><b>{{ $result }}</b></h5>
                @endif
                <small  class="mt-2 drop-in" style="animation-delay: {{$delay + 57}}s">*Note: Result might be rounded to the nearest value.</small>
            </div>
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