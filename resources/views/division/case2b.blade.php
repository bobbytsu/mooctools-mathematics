<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>Elementary - Division</title>

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
            <form class="form-inline" method="POST" action="{{ route('divisionsolution') }}">
                @csrf
                <div class="form-group">
                    <input class="form-control text-center rounded-0 my-2 mr-4 square-input" name="input_1" value="{{ $input_1 }}">
                    <h4 class=" my-2 mr-4">÷</h4>
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
                <form method="POST" action="{{ route('divisionsolution') }}">
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
                    $calculation1 = floor($input_1 / $input_2);
                    $calculation2 = $calculation1 * $input_2;
                    $calculation3 = $input_1 - $calculation2;
                    $calculation4 = $calculation3 * 10;
                    $calculation5 = floor($calculation4 / $input_2);
                    $calculation6 = $calculation5 * $input_2;
                    $calculation7 = $calculation4 - $calculation6;
                    $calculation8 = $calculation7 * 10;
                    $calculation9 = floor($calculation8 / $input_2);
                    $calculation10 = $calculation9 * $input_2;
                    $calculation11 = $calculation8 - $calculation10;
                    $calculation12 = $calculation11 * 10;
                    $calculation13 = floor($calculation12 / $input_2);
                    $calculation14 = $calculation13 * $input_2;
                    $calculation15 = $calculation12 - $calculation14;
                @endphp
                <h5 class="drop-in">Solution</h5>
                <p class="drop-in" style="animation-delay: {{$delay}}s">Let's put it this way,</p>
                <div class="m-xl-5 m-sm-2">
                    <h5 class="drop-in division-x ml-4 text-primary" style="animation-delay: {{$delay + 12}}s">
                        <span class="drop-out" style="animation-delay: {{$delay + 14}}s">
                            x
                        </span>
                    </h5>
                    <h5 class="drop-in division-result-1-digit" style="animation-delay: {{$delay + 8}}s">
                        <span class="color-animation" style="animation-delay: {{$delay + 10}}s">
                            <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 45}}s">
                                {{$calculation1}}
                            </span>
                        </span>
                    </h5>
                    <div class="division-line drop-in" style="animation-delay: {{$delay + 2}}s">
                        <div class="horizontal-line ml-5"></div>
                        <div class="vertical-line ml-5 color-animation" style="animation-delay: {{$delay + 5}}s"></div>
                    </div>
                    <h5 class="division-mt-input">
                        <span class="drop-in" style="animation-delay: {{$delay + 3}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 6}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 15}}s">
                                    <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 32}}s">
                                        <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 57}}s">
                                            <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 66}}s">
                                                <span class="@if($calculation3 && $calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 83}}s">
                                                    <span class="@if($calculation3 && $calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 102}}s">
                                                        <span class="@if($calculation3 && $calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 111}}s">
                                                            <span class="@if($calculation3 && $calculation7 && $calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 127}}s">
                                                                <span class="@if($calculation3 && $calculation7 && $calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 147}}s">
                                                                    <span class="@if($calculation3 && $calculation7 && $calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 157}}s">
                                                                        {{$input_2}}
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                        <span class="drop-in" style="margin-left: 37px; animation-delay: {{$delay + 1}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 4}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 21}}s">
                                    {{$input_1}}
                                </span>
                            </span>
                        </span>
                    </h5>
                    <h5 class="division-calculation-1-digit drop-in" style="animation-delay: {{$delay + 17}}s">
                        <span class="color-animation" style="animation-delay: {{$delay + 23}}s">
                            {{$calculation2}}
                        </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="drop-in" style="animation-delay: {{$delay + 19}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 22}}s">
                                -
                            </span>
                        </span>
                    </h5>
                    <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 19}}s">
                    <h5 class="division-calculation-1-digit drop-in" style="animation-delay: {{$delay + 25}}s">
                        <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 27}}s">
                            <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 37}}s">
                                <span class="@if($calculation3 != 0) drop-out @endif" style="animation-delay: {{$delay + 42}}s">
                                    {{$calculation3}}
                                </span>
                            </span>
                        </span>
                    </h5>
                    @if($calculation3 != 0)
                        <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 29}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 31}}s">
                                ÷
                            </span>
                        </h5>
                        <h5 class="drop-in division-x-2 text-danger" style="animation-delay: {{$delay + 34}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 36}}s">
                                X
                            </span>
                        </h5>
                        <h5 class="drop-in division-case2b-add-zero-1 text-primary" style="animation-delay: {{$delay + 39}}s">
                            <small class="drop-out" style="animation-delay: {{$delay + 41}}s">
                                add zero
                            </small>
                        </h5>
                        <h5 class="drop-in division-calculation-4" style="animation-delay: {{$delay + 43}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 52}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 72}}s">
                                    {{$calculation4}}
                                </span>
                            </span>
                        </h5>
                        <h5 class="drop-in division-add-comma-1 text-primary" style="animation-delay: {{$delay + 47}}s">
                            <small class="drop-out" style="animation-delay: {{$delay + 49}}s">
                                add comma
                            </small>
                        </h5>
                        <h5 class="drop-in division-comma" style="animation-delay: {{$delay + 50}}s">
                            .
                        </h5>
                        <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 54}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 56}}s">
                                ÷
                            </span>
                        </h5>
                        <h5 class="drop-in division-result-digit-2" style="animation-delay: {{$delay + 59}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 61}}s">
                                {{$calculation5}}
                            </span>
                        </h5>
                        <h5 class="drop-in division-x-2 ml-4 text-primary" style="animation-delay: {{$delay + 63}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 65}}s">
                                x
                            </span>
                        </h5>
                        <h5 class="drop-in division-calculation-6" style="animation-delay: {{$delay + 68}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 74}}s">
                                {{$calculation6}}
                            </span>
                            &nbsp;
                            <span class="drop-in" style="animation-delay: {{$delay + 70}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 73}}s">
                                    -
                                </span>
                            </span>
                        </h5>
                        <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 70}}s">
                        <h5 class="drop-in division-calculation-7" style="animation-delay: {{$delay + 76}}s">
                            <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 78}}s">
                                <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 89}}s">
                                    <span class="@if($calculation7 != 0) drop-out @endif" style="animation-delay: {{$delay + 94}}s">
                                        {{$calculation7}}
                                    </span>
                                </span>
                            </span>
                        </h5>
                        @if($calculation7 != 0)
                            <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 80}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 82}}s">
                                    ÷
                                </span>
                            </h5>
                            <h5 class="drop-in division-X-1 text-danger" style="animation-delay: {{$delay + 85}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 87}}s">
                                    X
                                </span>
                            </h5>
                            <h5 class="drop-in division-case2b-add-zero-2 text-primary" style="animation-delay: {{$delay + 91}}s">
                                <small class="drop-out" style="animation-delay: {{$delay + 93}}s">
                                    add zero
                                </small>
                            </h5>
                            <h5 class="drop-in division-calculation-8" style="animation-delay: {{$delay + 95}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 97}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 117}}s">
                                        {{$calculation8}}
                                    </span>
                                </span>
                            </h5>
                            <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 99}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 101}}s">
                                    ÷
                                </span>
                            </h5>
                            <h5 class="drop-in division-result-digit-3" style="animation-delay: {{$delay + 104}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 106}}s">
                                    {{$calculation9}}
                                </span>
                            </h5>
                            <h5 class="drop-in division-x-3 ml-4 text-primary" style="animation-delay: {{$delay + 108}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 110}}s">
                                    x
                                </span>
                            </h5>
                            <h5 class="drop-in division-calculation-10" style="animation-delay: {{$delay + 113}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 119}}s">
                                    {{$calculation10}}
                                </span>
                                &nbsp;
                                <span class="drop-in" style="animation-delay: {{$delay + 115}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 118}}s">
                                        -
                                    </span>
                                </span>
                            </h5>
                            <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 115}}s">
                            <h5 class="drop-in division-calculation-11" style="animation-delay: {{$delay + 121}}s">
                                <span class="@if($calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 122}}s">
                                    <span class="@if($calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 133}}s">
                                        <span class="@if($calculation11 != 0) drop-out @endif" style="animation-delay: {{$delay + 138}}s">
                                            {{$calculation11}}
                                        </span>
                                    </span>
                                </span>
                            </h5>
                            @if($calculation11 != 0)
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 124}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 126}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-X-2 text-danger" style="animation-delay: {{$delay + 129}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 131}}s">
                                        X
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case2b-add-zero-3 text-primary" style="animation-delay: {{$delay + 135}}s">
                                    <small class="drop-out" style="animation-delay: {{$delay + 137}}s">
                                        add zero
                                    </small>
                                </h5>
                                <h5 class="drop-in division-calculation-12" style="animation-delay: {{$delay + 139}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 141}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 163}}s">
                                            {{$calculation12}}
                                        </span>
                                    </span>
                                </h5>
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 143}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 145}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-result-digit-4" style="animation-delay: {{$delay + 149}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 151}}s">
                                        {{$calculation13}}
                                    </span>
                                </h5>
                                <h5 class="drop-in division-x-4 ml-4 text-primary" style="animation-delay: {{$delay + 153}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 155}}s">
                                        x
                                    </span>
                                </h5>
                                <h5 class="drop-in division-calculation-14" style="animation-delay: {{$delay + 159}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 165}}s">
                                        {{$calculation14}}
                                    </span>
                                    &nbsp;
                                    <span class="drop-in" style="animation-delay: {{$delay + 161}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 164}}s">
                                            -
                                        </span>
                                    </span>
                                </h5>
                                <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 161}}s">
                                <h5 class="drop-in division-calculation-15" style="animation-delay: {{$delay + 167}}s">
                                    {{$calculation15}}
                                </h5>
                            @endif
                        @endif
                    @endif
                </div>
                @if($calculation3 == 0)
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 26}}s">Result</h5>
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 27}}s"><b>{{$result}}</b></h5>
                @elseif($calculation7 == 0)
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 77}}s">Result</h5>
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 78}}s"><b>{{$result}}</b></h5>
                @elseif($calculation11 == 0)
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 122}}s">Result</h5>
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 123}}s"><b>{{$result}}</b></h5>
                @else
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 168}}s">Result</h5>
                    <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 169}}s"><b>{{$result}}</b></h5>
                @endif
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