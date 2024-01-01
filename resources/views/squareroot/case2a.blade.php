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
                    $k = 1;
                @endphp
                <p class="drop-in" style="animation-delay: {{$delay}}s" >Let's find the find the nearest square root to <b>{{ $input }}</b>.</p>
                <img src="{{ asset('assets/exponential-table.png') }}" alt="exponential-table" width="150px" class="drop-in m-xl-5 m-lg-5 m-md-5 m-sm-5 m-4" style="animation-delay: {{$delay + 1}}s">
                <p class="drop-in" style="animation-delay: {{$delay + 6}}s">According to the table, we know that <b>{{ $nearestsquareroot }}</b> is the nearest square root to <b>{{ $input }}</b>.</p>
                <p class="drop-in" style="animation-delay: {{$delay + 11}}s">Therefore, we can put it this way:</p>
                <div class="my-5 mx-xl-5 mx-lg-5 mx-md-5 mx-sm-5 mx-xs-5 mx-0">
                    <h5 class="mb-5">
                        <span class="drop-in" style="animation-delay: {{$delay + 13}}s">√</span>
                        <span class="drop-in" style="animation-delay: {{$delay + 14}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 20}}s">
                                {{$nearestsquareroot}}
                            </span>
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 15}}s">=</span>
                        <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 23}}s">
                                {{$nearestresult}}
                            </span>
                        </span>
                    </h5>
                    <h5 class="squareroot-nearest-sqrt-1">
                        <span class="drop-in" style="animation-delay: {{$delay + 25}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 42}}s">
                                {{$nearestresult}}
                            </span>
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 72}}s">
                            .
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 73}}s">
                            {{$calculation4}}
                        </span>
                        <small class="drop-in squareroot-x2 text-primary" style="animation-delay: {{$delay + 44}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 46}}s">
                                x 2
                            </span>
                        </small>
                    </h5>
                    <img src="{{ asset('assets/root.png') }}" class="drop-in squareroot-line" alt="root" height="40px" style="animation-delay: {{$delay + 17}}s">
                    <h5 class="drop-in squareroot-input" style="animation-delay: {{$delay + 18}}s">
                        <span class="color-animation" style="animation-delay: {{$delay + 28}}s">
                            {{$input}}
                        </span>
                    </h5>
                    <h5 class="squareroot-nearest-1">
                        <span class="drop-in" style="animation-delay: {{$delay + 22}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 30}}s">
                                {{$nearestsquareroot}}
                            </span>
                        </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                -
                            </span>
                        </span>
                    </h5>
                    <hr class="drop-in squareroot-hr" style="animation-delay: {{$delay + 26}}s">
                    <h5 class="drop-in squareroot-calculation1" style="animation-delay: {{$delay + 32}}s">
                        <span class="drop-out" style="animation-delay: {{$delay + 37}}s">
                            {{$calculation1}}
                        </span>
                        <small class="drop-in text-primary" style="animation-delay: {{$delay + 34}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 36}}s">
                                add 2 decimals
                            </span>
                        </small>
                    </h5>
                    <h5 class="drop-in squareroot-calculation1-format" style="animation-delay: {{$delay + 38}}s">
                        <span class="color-animation" style="animation-delay: {{$delay + 53}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 80}}s">
                                {{number_format($calculation1, 2)}}
                            </span>
                        </span>
                        <small class="drop-in ml-4 text-primary" style="animation-delay: {{$delay + 57}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 60}}s">
                                find a pair value of "..."
                            </span>
                        </small>
                    </h5>
                    <h5 class="squareroot-calculation6 drop-in" style="animation-delay: {{$delay + 77}}s">
                        <span class="color-animation" style="animation-delay: {{$delay + 82}}s">
                            {{$calculation6}}
                        </span>
                        &nbsp;
                        <span class="drop-in" style="animation-delay: {{$delay + 79}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 81}}s">
                                -
                            </span>
                        </span>
                    </h5>
                    <hr class="drop-in squareroot-hr" style="animation-delay: {{$delay + 79}}s">
                    <h5 class="squareroot-calculation4-arrow drop-out" style="animation-delay: {{$delay + 66}}s">
                        <span class="drop-in" style="animation-delay: {{$delay + 40}}s">→</span>
                        <span class="drop-in" style="animation-delay: {{$delay + 47}}s">
                            {{$calculation2}}
                        </span>
                        <span class="drop-in" style="margin-left: -5px; animation-delay: {{$delay + 48}}s">
                            .
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 49}}s">
                            ...
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 50}}s">x</span>
                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                            ...
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 52}}s">
                            ≅
                        </span>
                        <span class="drop-in" style="animation-delay: {{$delay + 55}}s">
                            {{number_format($calculation1, 2)}}
                        </span>
                    </h5>
                    <h5 class="squareroot-calculation4-arrow-1 drop-in" style="animation-delay: {{$delay + 68}}s">
                        <span class="drop-out" style="animation-delay: {{$delay + 78}}s">
                            <span>→</span>
                            <span>
                                {{$calculation2}}
                            </span>
                            <span class="color-animation" style="margin-left: -5px; animation-delay: {{$delay + 70}}s">
                                .{{$calculation4}}
                            </span>
                            <span>x</span>
                            <span class="color-animation" style="animation-delay: {{$delay + 70}}s">
                                {{$calculation5}}
                            </span>
                            <span>
                                =
                            </span>
                            <span class="color-animation" style="animation-delay: {{$delay + 75}}s">
                                {{$calculation6}}
                            </span>
                        </span>
                    </h5>
                    @for ($j = 0; $j < $count; $j++)
                        @if ($j < 2 || ($j === $count - 1 && $calculations[$j] <= $calculation1))
                            <h5 class="drop-in squareroot-calculation4-arrow-2" style="animation-delay: {{$delay + 60 + $k}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 66 + $k}}s">
                                    {{$calculation2}}.{{ $j + 1 }} x {{ ($j + 1) / 10 }} = {{ number_format($calculations[$j], 2, '.', '') }}
                                </span>
                            </h5>
                            @php
                                $k++;
                            @endphp
                        @elseif ($j === 2)
                            <h5 class="drop-in squareroot-calculation4-arrow-2" style="animation-delay: {{$delay + 60 + $k}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 66 + $k}}s">
                                    ...
                                </span>
                            </h5>
                            @php
                                $k++;
                            @endphp
                        @endif
                    @endfor
                    @php
                        $delay = $delay + 60 + $k;
                    @endphp
                    <h5 class="drop-in squareroot-calculation4-arrow-2 text-primary" style="animation-delay: {{$delay}}s">
                        <small class="drop-out" style="animation-delay: {{$delay + 3}}s">
                            nearest value
                        </small>
                    </h5>
                    <h5 class="drop-in squareroot-case2a-calculation7" style="animation-delay: {{$delay + 22}}s">
                        {{$calculation7}}
                    </h5>                    
                </div>
                <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 23}}s">Result</h5>
                <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 24}}s"><b>{{floor(sqrt($input) * 10) / 10}}</b></h5>
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