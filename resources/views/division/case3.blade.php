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
                    $calculation1 = floor($case_3_input_1_digit_1 / $input_2);
                    $calculation2 = $calculation1 * $input_2;
                    $calculation3 = $case_3_input_1_digit_1 - $calculation2;
                    $calculation4 = $calculation3 + $case_3_input_1_digit_2;
                    $concat1 = $calculation3 . $case_3_input_1_digit_2;
                    $calculation5 = floor((int) $concat1 / $input_2);
                    $calculation6 = $calculation5 * $input_2;
                    $calculation7 = (int) $concat1 - $calculation6;
                    $calculation8 = $calculation7 * 10;
                    $calculation9 = floor($calculation8 / $input_2);
                    $calculation10 = $calculation9 * $input_2;
                    $calculation11 = $calculation8 - $calculation10;
                    $calculation12 = $calculation11 * 10;
                    $calculation13 = floor($calculation12 / $input_2);
                    $calculation14 = $calculation13 * $input_2;
                    $calculation15 = $calculation12 - $calculation14;
                    $calculation16 = $calculation15 * 10;
                    $calculation17 = floor($calculation16 / $input_2);
                    $calculation18 = $calculation17 * $input_2;
                    $calculation19 = $calculation16 - $calculation18;

                    $calculation2_1 = floor($case_3_input_1_digit_2 / $input_2);
                    $calculation2_2 = $calculation2_1 * $input_2;
                    $calculation2_3 = $case_3_input_1_digit_2 - $calculation2_2;
                    $calculation2_4 = $calculation2_3 * 10;
                    $calculation2_5 = floor($calculation2_4 / $input_2);
                    $calculation2_6 = $calculation2_5 * $input_2;
                    $calculation2_7 = $calculation2_4 - $calculation2_6;
                    $calculation2_8 = $calculation2_7 * 10;
                    $calculation2_9 = floor($calculation2_8 / $input_2);
                    $calculation2_10 = $calculation2_9 * $input_2;
                    $calculation2_11 = $calculation2_8 - $calculation2_10;
                    $calculation2_12 = $calculation2_11 * 10;
                    $calculation2_13 = floor($calculation2_12 / $input_2);
                    $calculation2_14 = $calculation2_13 * $input_2;
                    $calculation2_15 = $calculation2_12 - $calculation2_14;

                    $concat2 = $case_3_input_1_digit_1 . $case_3_input_1_digit_2;
                    $calculation1_1 = floor($concat2 / $input_2);
                    $calculation1_2 = $calculation1_1 * $input_2;
                    $calculation1_3 = $concat2 - $calculation1_2;
                    $calculation1_4 = $calculation1_3 * 10;
                    $calculation1_5 = floor($calculation1_4 / $input_2);
                    $calculation1_6 = $calculation1_5 * $input_2;
                    $calculation1_7 = $calculation1_4 - $calculation1_6;
                    $calculation1_8 = $calculation1_7 * 10;
                    $calculation1_9 = floor($calculation1_8 / $input_2);
                    $calculation1_10 = $calculation1_9 * $input_2;
                    $calculation1_11 = $calculation1_8 - $calculation1_10;
                    $calculation1_12 = $calculation1_11 * 10;
                    $calculation1_13 = floor($calculation1_12 / $input_2);
                    $calculation1_14 = $calculation1_13 * $input_2;
                    $calculation1_15 = $calculation1_12 - $calculation1_14;
                @endphp
                <h5 class="drop-in">Solution</h5>
                <p class="drop-in" style="animation-delay: {{$delay}}s">Let's put it this way,</p>
                <div class="m-xl-5 m-sm-2">
                    @if($calculation1 != 0)
                        <h5 class="drop-in division-x ml-4 text-primary" style="animation-delay: {{$delay + 12}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 14}}s">
                                x
                            </span>
                        </h5>
                        <h5 class="drop-in division-result-1-digit" style="animation-delay: {{$delay + 8}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 10}}s">
                                {{$calculation1}}
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
                                            <span class="@if($calculation3 == 0) color-animation @endif" style="animation-delay: {{$delay + 41}}s">
                                                <span class="@if($calculation3 == 0) color-animation @endif" style="animation-delay: {{$delay + 50}}s">
                                                    <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 51}}s">
                                                        <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 60}}s">
                                                            @if($calculation3 !=0)
                                                                <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 77}}s">
                                                                    <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 103}}s">
                                                                        <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 112}}s">
                                                                            <span class="@if($calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 129}}s">
                                                                                <span class="@if($calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 148}}s">
                                                                                    <span class="@if($calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 157}}s">
                                                                                        <span class="@if($calculation15 != 0) color-animation @endif" style="animation-delay: {{$delay + 174}}s">
                                                                                            <span class="@if($calculation15 != 0) color-animation @endif" style="animation-delay: {{$delay + 193}}s">
                                                                                                <span class="@if($calculation15 != 0) color-animation @endif" style="animation-delay: {{$delay + 202}}s">
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
                                                            @elseif($calculation3 == 0)
                                                                <span class="@if($calculation2_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 67}}s">
                                                                    <span class="@if($calculation2_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 93}}s">
                                                                        <span class="@if($calculation2_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 102}}s">
                                                                            <span class="@if($calculation2_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 119}}s">
                                                                                <span class="@if($calculation2_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 138}}s">
                                                                                    <span class="@if($calculation2_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 147}}s">
                                                                                        <span class="@if($calculation2_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 164}}s">
                                                                                            <span class="@if($calculation2_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 183}}s">
                                                                                                <span class="@if($calculation2_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 192}}s">
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
                                                            @endif
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="ml-5 drop-in" style="animation-delay: {{$delay + 1}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 4}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 21}}s">
                                        {{$case_3_input_1_digit_1}}
                                    </span>
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 1}}s">
                                <span class="@if($calculation3 != 0) color-animation @endif" style="animation-delay: {{$delay + 38}}s">
                                    <span class="@if($calculation3 == 0) color-animation @endif" style="animation-delay: {{$delay + 29}}s">
                                        {{$case_3_input_1_digit_2}}
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
                        @if($calculation3 != 0)
                            <h5 class="division-calculation-1-digit drop-in" style="animation-delay: {{$delay + 25}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 27}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 46}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 66}}s">
                                            {{$calculation3}}
                                        </span>
                                    </span>
                                </span>
                                <span class="drop-in-2" style="animation-delay: {{$delay + 40}}s">
                                    <span class="move-text-4" style="animation-delay: {{$delay + 41}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 46}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 66}}s">
                                                {{$case_3_input_1_digit_2}}
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </h5>
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
                            <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 48}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 50}}s">
                                    ÷
                                </span>
                            </h5>
                            <h5 class="drop-in division-case3a-result-digit-2" style="animation-delay: {{$delay + 53}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 55}}s">
                                    <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 91}}s">
                                        {{$calculation5}}
                                    </span>
                                </span>
                            </h5>
                            <h5 class="drop-in division-x-2 ml-4 text-primary" style="animation-delay: {{$delay + 57}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 59}}s">
                                    x
                                </span>
                            </h5>
                            <h5 class="drop-in division-case3a-calculation-6" style="animation-delay: {{$delay + 62}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 68}}s">
                                    {{$calculation6}}
                                </span>
                                &nbsp;
                                <span class="drop-in" style="animation-delay: {{$delay + 64}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 67}}s">
                                        -
                                    </span>
                                </span>
                            </h5>
                            <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 64}}s">
                            <h5 class="drop-in division-case3a-calculation-7" style="animation-delay: {{$delay + 70}}s">
                                <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 72}}s">
                                    <span class="@if($calculation7 != 0) color-animation @endif" style="animation-delay: {{$delay + 83}}s">
                                        <span class="@if($calculation7 != 0) drop-out @endif" style="animation-delay: {{$delay + 88}}s">
                                            {{$calculation7}}
                                        </span>
                                    </span>
                                </span>
                            </h5>
                            @if($calculation7 != 0)
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 74}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 76}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a-X-1 text-danger" style="animation-delay: {{$delay + 79}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 81}}s">
                                        X
                                    </span>
                                </h5>
                                <h5 class="drop-in division-add-zero-3 text-primary" style="animation-delay: {{$delay + 85}}s">
                                    <small class="drop-out" style="animation-delay: {{$delay + 87}}s">
                                        add zero
                                    </small>
                                </h5>
                                <h5 class="drop-in division-case3a-calculation-8" style="animation-delay: {{$delay + 89}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 98}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 118}}s">
                                            {{$calculation8}}
                                        </span>
                                    </span>
                                </h5>
                                <h5 class="drop-in division-add-comma-2 text-primary" style="animation-delay: {{$delay + 93}}s">
                                    <small class="drop-out" style="animation-delay: {{$delay + 95}}s">
                                        add comma
                                    </small>
                                </h5>
                                <h5 class="drop-in division-comma-2" style="animation-delay: {{$delay + 96}}s">
                                    .
                                </h5>
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 100}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 102}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a-result-digit-3" style="animation-delay: {{$delay + 105}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 107}}s">
                                        {{$calculation9}}
                                    </span>
                                </h5>
                                <h5 class="drop-in division-x-3 ml-4 text-primary" style="animation-delay: {{$delay + 109}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 111}}s">
                                        x
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a-calculation-10" style="animation-delay: {{$delay + 114}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 120}}s">
                                        {{$calculation10}}
                                    </span>
                                    &nbsp;
                                    <span class="drop-in" style="animation-delay: {{$delay + 116}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 119}}s">
                                            -
                                        </span>
                                    </span>
                                </h5>
                                <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 116}}s">
                                <h5 class="drop-in division-case3a-calculation-11" style="animation-delay: {{$delay + 122}}s">
                                    <span class="@if($calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 124}}s">
                                        <span class="@if($calculation11 != 0) color-animation @endif" style="animation-delay: {{$delay + 135}}s">
                                            <span class="@if($calculation11 != 0) drop-out @endif" style="animation-delay: {{$delay + 140}}s">
                                                {{$calculation11}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if($calculation11 != 0)
                                    <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 126}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 128}}s">
                                            ÷
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-case3a-X-2 text-danger" style="animation-delay: {{$delay + 131}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 133}}s">
                                            X
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-add-zero-3 text-primary" style="animation-delay: {{$delay + 137}}s">
                                        <small class="drop-out" style="animation-delay: {{$delay + 139}}s">
                                            add zero
                                        </small>
                                    </h5>
                                    <h5 class="drop-in division-case3a-calculation-12" style="animation-delay: {{$delay + 141}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 143}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 163}}s">
                                                {{$calculation12}}
                                            </span>
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 145}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 147}}s">
                                            ÷
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-case3a-result-digit-4" style="animation-delay: {{$delay + 150}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 152}}s">
                                            {{$calculation13}}
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-x-4 ml-4 text-primary" style="animation-delay: {{$delay + 154}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 156}}s">
                                            x
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-case3a-calculation-14" style="animation-delay: {{$delay + 159}}s">
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
                                    <h5 class="drop-in division-case3a-calculation-15" style="animation-delay: {{$delay + 167}}s">
                                        <span class="@if($calculation15 != 0) color-animation @endif" style="animation-delay: {{$delay + 169}}s">
                                            <span class="@if($calculation15 != 0) color-animation @endif" style="animation-delay: {{$delay + 180}}s">
                                                <span class="@if($calculation15 != 0) drop-out @endif" style="animation-delay: {{$delay + 185}}s">
                                                    {{$calculation15}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                    @if($calculation15 != 0)
                                        <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 171}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 173}}s">
                                                ÷
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-case3a-X-3 text-danger" style="animation-delay: {{$delay + 176}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 178}}s">
                                                X
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-add-zero-3 text-primary" style="animation-delay: {{$delay + 182}}s">
                                            <small class="drop-out" style="animation-delay: {{$delay + 184}}s">
                                                add zero
                                            </small>
                                        </h5>
                                        <h5 class="drop-in division-case3a-calculation-16" style="animation-delay: {{$delay + 186}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 188}}s">
                                                <span class="color-animation" style="animation-delay: {{$delay + 208}}s">
                                                    {{$calculation16}}
                                                </span>
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 190}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 192}}s">
                                                ÷
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-case3a-result-digit-5" style="animation-delay: {{$delay + 195}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 197}}s">
                                                {{$calculation17}}
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-x-5 ml-4 text-primary" style="animation-delay: {{$delay + 199}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 201}}s">
                                                x
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-case3a-calculation-18" style="animation-delay: {{$delay + 204}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 210}}s">
                                                {{$calculation18}}
                                            </span>
                                            &nbsp;
                                            <span class="drop-in" style="animation-delay: {{$delay + 206}}s">
                                                <span class="color-animation" style="animation-delay: {{$delay + 209}}s">
                                                    -
                                                </span>
                                            </span>
                                        </h5>
                                        <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 206}}s">
                                        <h5 class="drop-in division-case3a-calculation-19" style="animation-delay: {{$delay + 212}}s">
                                            {{$calculation19}}
                                        </h5>
                                    @endif
                                @endif
                            @endif
                        @elseif($calculation3 == 0)
                            <h5 class="division-calculation-1-digit drop-in" style="animation-delay: {{$delay + 25}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 27}}s">
                                    {{$calculation3}}
                                </span>
                                <span class="drop-in-2" style="animation-delay: {{$delay + 31}}s">
                                    <span class="move-text-4" style="animation-delay: {{$delay + 32}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 36}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 56}}s">
                                                {{$case_3_input_1_digit_2}}
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </h5>
                            <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 38}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 40}}s">
                                    ÷
                                </span>
                            </h5>
                            <h5 class="drop-in division-case3a2-calculation2_1" style="animation-delay: {{$delay + 43}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 45}}s">
                                    <span class="@if($calculation2_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 81}}s">
                                        {{$calculation2_1}}
                                    </span>
                                </span>
                            </h5>
                            <h5 class="drop-in division-x-2 ml-4 text-primary" style="animation-delay: {{$delay + 47}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 49}}s">
                                    x
                                </span>
                            </h5>
                            <h5 class="drop-in division-case3a2-calculation-2_2" style="animation-delay: {{$delay + 52}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 58}}s">
                                    {{$calculation2_2}}
                                </span>
                                &nbsp;
                                <span class="drop-in" style="animation-delay: {{$delay + 54}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 57}}s">
                                        -
                                    </span>
                                </span>
                            </h5>
                            <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 54}}s">
                            <h5 class="drop-in division-case3a2-calculation-2_3" style="animation-delay: {{$delay + 60}}s">
                                <span class="@if($calculation2_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 62}}s">
                                    <span class="@if($calculation2_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 73}}s">
                                        <span class="@if($calculation2_3 != 0) drop-out @endif" style="animation-delay: {{$delay + 78}}s">
                                            {{$calculation2_3}}
                                        </span>
                                    </span>
                                </span>
                            </h5>
                            @if($calculation2_3 != 0)
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 64}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 66}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a2-X-1 text-danger" style="animation-delay: {{$delay + 69}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 71}}s">
                                        X
                                    </span>
                                </h5>
                                <h5 class="drop-in division-add-zero-2 text-primary" style="animation-delay: {{$delay + 75}}s">
                                    <small class="drop-out" style="animation-delay: {{$delay + 77}}s">
                                        add zero
                                    </small>
                                </h5>
                                <h5 class="drop-in division-case3a2-calculation-2_4" style="animation-delay: {{$delay + 79}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 88}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 108}}s">
                                            {{$calculation2_4}}
                                        </span>
                                    </span>
                                </h5>
                                <h5 class="drop-in division-add-comma-3 text-primary" style="animation-delay: {{$delay + 83}}s">
                                    <small class="drop-out" style="animation-delay: {{$delay + 85}}s">
                                        add comma
                                    </small>
                                </h5>
                                <h5 class="drop-in division-comma-3" style="animation-delay: {{$delay + 86}}s">
                                    .
                                </h5>
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 90}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 92}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a2-calculation-2_5" style="animation-delay: {{$delay + 95}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 97}}s">
                                        {{$calculation2_5}}
                                    </span>
                                </h5>
                                <h5 class="drop-in division-x-3 ml-4 text-primary" style="animation-delay: {{$delay + 99}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 101}}s">
                                        x
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a2-calculation-2_6" style="animation-delay: {{$delay + 104}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 110}}s">
                                        {{$calculation2_6}}
                                    </span>
                                    &nbsp;
                                    <span class="drop-in" style="animation-delay: {{$delay + 106}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 109}}s">
                                            -
                                        </span>
                                    </span>
                                </h5>
                                <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 106}}s">
                                <h5 class="drop-in division-calculation-11" style="animation-delay: {{$delay + 112}}s">
                                    <span class="@if($calculation2_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 114}}s">
                                        <span class="@if($calculation2_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 125}}s">
                                            <span class="@if($calculation2_7 != 0) drop-out @endif" style="animation-delay: {{$delay + 130}}s">
                                                {{$calculation2_7}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if($calculation2_7 != 0)
                                    <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 116}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 118}}s">
                                            ÷
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-case3a2-X-2 text-danger" style="animation-delay: {{$delay + 121}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 123}}s">
                                            X
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-add-zero-3 text-primary" style="animation-delay: {{$delay + 127}}s">
                                        <small class="drop-out" style="animation-delay: {{$delay + 129}}s">
                                            add zero
                                        </small>
                                    </h5>
                                    <h5 class="drop-in division-calculation-12" style="animation-delay: {{$delay + 131}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 133}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 153}}s">
                                                {{$calculation2_8}}
                                            </span>
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 135}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 137}}s">
                                            ÷
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-case3a2-calculation-2_9" style="animation-delay: {{$delay + 140}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 142}}s">
                                            {{$calculation2_9}}
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-x-4 ml-4 text-primary" style="animation-delay: {{$delay + 144}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 146}}s">
                                            x
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-calculation-14" style="animation-delay: {{$delay + 149}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 155}}s">
                                            {{$calculation2_10}}
                                        </span>
                                        &nbsp;
                                        <span class="drop-in" style="animation-delay: {{$delay + 151}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 154}}s">
                                                -
                                            </span>
                                        </span>
                                    </h5>
                                    <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 151}}s">
                                    <h5 class="drop-in division-calculation-15" style="animation-delay: {{$delay + 157}}s">
                                        <span class="@if($calculation2_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 159}}s">
                                            <span class="@if($calculation2_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 170}}s">
                                                <span class="@if($calculation2_11 != 0) drop-out @endif" style="animation-delay: {{$delay + 175}}s">
                                                    {{$calculation2_11}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                    @if($calculation2_11 != 0)
                                        <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 161}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 163}}s">
                                                ÷
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-case3a2-X-3 text-danger" style="animation-delay: {{$delay + 166}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 168}}s">
                                                X
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-case3a2-add-zero-1 text-primary" style="animation-delay: {{$delay + 172}}s">
                                            <small class="drop-out" style="animation-delay: {{$delay + 174}}s">
                                                add zero
                                            </small>
                                        </h5>
                                        <h5 class="drop-in division-case3a2-calculation-2_12" style="animation-delay: {{$delay + 176}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 178}}s">
                                                <span class="color-animation" style="animation-delay: {{$delay + 198}}s">
                                                    {{$calculation2_12}}
                                                </span>
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 180}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 182}}s">
                                                ÷
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-case3a2-calculation-2_13" style="animation-delay: {{$delay + 185}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 187}}s">
                                                {{$calculation2_13}}
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-x-5 ml-4 text-primary" style="animation-delay: {{$delay + 189}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 191}}s">
                                                x
                                            </span>
                                        </h5>
                                        <h5 class="drop-in division-case3a2-calculation-2_14" style="animation-delay: {{$delay + 194}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 200}}s">
                                                {{$calculation2_14}}
                                            </span>
                                            &nbsp;
                                            <span class="drop-in" style="animation-delay: {{$delay + 196}}s">
                                                <span class="color-animation" style="animation-delay: {{$delay + 199}}s">
                                                    -
                                                </span>
                                            </span>
                                        </h5>
                                        <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 196}}s">
                                        <h5 class="drop-in division-case3a-calculation-19" style="animation-delay: {{$delay + 202}}s">
                                            {{$calculation2_15}}
                                        </h5>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @elseif($calculation1 == 0)
                        <h5 class="drop-in division-case3a1-X-1 text-danger" style="animation-delay: {{$delay + 8}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 10}}s">
                                X
                            </span>
                        </h5>
                        <h5 class="drop-in division-x ml-4 text-primary" style="animation-delay: {{$delay + 20}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 22}}s">
                                x
                            </span>
                        </h5>
                        <h5 class="drop-in division-result-1-digit" style="animation-delay: {{$delay + 16}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 18}}s">
                                <span class="@if($calculation1_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 54}}s">
                                    {{$calculation1_1}}
                                </span>
                            </span>
                        </h5>
                        <div class="division-line drop-in" style="animation-delay: {{$delay + 2}}s">
                            <div class="horizontal-line ml-5"></div>
                            <div class="vertical-line ml-5 color-animation" style="animation-delay: {{$delay + 5}}s"></div>
                        </div>
                        <div class="drop-in-2" style="animation-delay: {{$delay + 6}}s">
                            <div class="vertical-line division-case3a1-verticalline2 ml-5 color-animation" style="animation-delay: {{$delay + 13}}s"></div>
                        </div>
                        <h5 class="division-mt-input">
                            <span class="drop-in" style="animation-delay: {{$delay + 3}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 6}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 14}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 23}}s">
                                            <span class="@if($calculation1_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 40}}s">
                                                <span class="@if($calculation1_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 66}}s">
                                                    <span class="@if($calculation1_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 75}}s">
                                                        <span class="@if($calculation1_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 92}}s">
                                                            <span class="@if($calculation1_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 111}}s">
                                                                <span class="@if($calculation1_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 120}}s">
                                                                    <span class="@if($calculation1_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 137}}s">
                                                                        <span class="@if($calculation1_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 156}}s">
                                                                            <span class="@if($calculation1_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 165}}s">
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
                            </span>
                            <span class="ml-5 drop-in" style="animation-delay: {{$delay + 1}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 4}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 12}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                            {{$case_3_input_1_digit_1}}
                                        </span>
                                    </span>
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 1}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 12}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$case_3_input_1_digit_2}}
                                    </span>
                                </span>
                            </span>
                        </h5>
                        <h5 class="division-case3a1-calculation-1-digit drop-in" style="animation-delay: {{$delay + 25}}s">
                            <span class="color-animation" style="animation-delay: {{$delay + 31}}s">
                                {{$calculation1_2}}
                            </span>
                            &nbsp;
                            <span class="drop-in" style="animation-delay: {{$delay + 27}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 30}}s">
                                    -
                                </span>
                            </span>
                        </h5>
                        <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 27}}s">
                        <h5 class="division-case3a1-calculation-1_3-digit drop-in" style="animation-delay: {{$delay + 33}}s">
                            <span class="@if($calculation1_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 35}}s">
                                <span class="@if($calculation1_3 != 0) color-animation @endif" style="animation-delay: {{$delay + 46}}s">
                                    <span class="@if($calculation1_3 != 0) drop-out @endif" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation1_3}}
                                    </span>
                                </span>
                            </span>
                        </h5>
                        @if($calculation1_3 != 0)
                            <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 37}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 39}}s">
                                    ÷
                                </span>
                            </h5>
                            <h5 class="drop-in division-x-2 text-danger" style="animation-delay: {{$delay + 42}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 44}}s">
                                    X
                                </span>
                            </h5>
                            <h5 class="drop-in division-case3a1-add-zero-1 text-primary" style="animation-delay: {{$delay + 48}}s">
                                <small class="drop-out" style="animation-delay: {{$delay + 50}}s">
                                    add zero
                                </small>
                            </h5>
                            <h5 class="drop-in division-case3a1-calculation-1_4" style="animation-delay: {{$delay + 52}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 61}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 81}}s">
                                        {{$calculation1_4}}
                                    </span>
                                </span>
                            </h5>
                            <h5 class="drop-in division-add-comma-1 text-primary" style="animation-delay: {{$delay + 56}}s">
                                <small class="drop-out" style="animation-delay: {{$delay + 58}}s">
                                    add comma
                                </small>
                            </h5>
                            <h5 class="drop-in division-comma" style="animation-delay: {{$delay + 59}}s">
                                .
                            </h5>
                            <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 63}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 65}}s">
                                    ÷
                                </span>
                            </h5>
                            <h5 class="drop-in division-result-digit-2" style="animation-delay: {{$delay + 68}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 70}}s">
                                    {{$calculation1_5}}
                                </span>
                            </h5>
                            <h5 class="drop-in division-x-2 ml-4 text-primary" style="animation-delay: {{$delay + 72}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 74}}s">
                                    x
                                </span>
                            </h5>
                            <h5 class="drop-in division-case3a1-calculation-1_6" style="animation-delay: {{$delay + 77}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 83}}s">
                                    {{$calculation1_6}}
                                </span>
                                &nbsp;
                                <span class="drop-in" style="animation-delay: {{$delay + 79}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 82}}s">
                                        -
                                    </span>
                                </span>
                            </h5>
                            <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 79}}s">
                            <h5 class="drop-in division-case3a1-calculation-1_7" style="animation-delay: {{$delay + 85}}s">
                                <span class="@if($calculation1_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 87}}s">
                                    <span class="@if($calculation1_7 != 0) color-animation @endif" style="animation-delay: {{$delay + 98}}s">
                                        <span class="@if($calculation1_7 != 0) drop-out @endif" style="animation-delay: {{$delay + 103}}s">
                                            {{$calculation1_7}}
                                        </span>
                                    </span>
                                </span>
                            </h5>
                            @if($calculation1_7 != 0)
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 89}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 91}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-X-1 text-danger" style="animation-delay: {{$delay + 94}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 96}}s">
                                        X
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a1-add-zero-2 text-primary" style="animation-delay: {{$delay + 100}}s">
                                    <small class="drop-out" style="animation-delay: {{$delay + 102}}s">
                                        add zero
                                    </small>
                                </h5>
                                <h5 class="drop-in division-case3a1-calculation-1_8" style="animation-delay: {{$delay + 104}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 106}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 126}}s">
                                            {{$calculation1_8}}
                                        </span>
                                    </span>
                                </h5>
                                <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 108}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 110}}s">
                                        ÷
                                    </span>
                                </h5>
                                <h5 class="drop-in division-result-digit-3" style="animation-delay: {{$delay + 113}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 115}}s">
                                        {{$calculation1_9}}
                                    </span>
                                </h5>
                                <h5 class="drop-in division-x-3 ml-4 text-primary" style="animation-delay: {{$delay + 117}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 119}}s">
                                        x
                                    </span>
                                </h5>
                                <h5 class="drop-in division-case3a1-calculation-1_10" style="animation-delay: {{$delay + 122}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 128}}s">
                                        {{$calculation1_10}}
                                    </span>
                                    &nbsp;
                                    <span class="drop-in" style="animation-delay: {{$delay + 124}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 127}}s">
                                            -
                                        </span>
                                    </span>
                                </h5>
                                <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 124}}s">
                                <h5 class="drop-in division-case3a-calculation-1_11" style="animation-delay: {{$delay + 130}}s">
                                    <span class="@if($calculation1_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 132}}s">
                                        <span class="@if($calculation1_11 != 0) color-animation @endif" style="animation-delay: {{$delay + 143}}s">
                                            <span class="@if($calculation1_11 != 0) drop-out @endif" style="animation-delay: {{$delay + 148}}s">
                                                {{$calculation1_11}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if($calculation1_11 != 0)
                                    <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 134}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 136}}s">
                                            ÷
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-X-2 text-danger" style="animation-delay: {{$delay + 139}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 141}}s">
                                            X
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-case3a1-add-zero-3 text-primary" style="animation-delay: {{$delay + 145}}s">
                                        <small class="drop-out" style="animation-delay: {{$delay + 147}}s">
                                            add zero
                                        </small>
                                    </h5>
                                    <h5 class="drop-in division-case3a1-calculation-12" style="animation-delay: {{$delay + 149}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 151}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 171}}s">
                                                {{$calculation1_12}}
                                            </span>
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-÷ ml-4 text-primary" style="animation-delay: {{$delay + 153}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 155}}s">
                                            ÷
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-result-digit-4" style="animation-delay: {{$delay + 158}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 160}}s">
                                            {{$calculation1_13}}
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-x-4 ml-4 text-primary" style="animation-delay: {{$delay + 162}}s">
                                        <span class="drop-out" style="animation-delay: {{$delay + 164}}s">
                                            x
                                        </span>
                                    </h5>
                                    <h5 class="drop-in division-case3a1-calculation-1_14" style="animation-delay: {{$delay + 167}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 173}}s">
                                            {{$calculation1_14}}
                                        </span>
                                        &nbsp;
                                        <span class="drop-in" style="animation-delay: {{$delay + 169}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 172}}s">
                                                -
                                            </span>
                                        </span>
                                    </h5>
                                    <hr class="ml-5 drop-in" style="animation-delay: {{$delay + 169}}s">
                                    <h5 class="drop-in division-case3a1-calculation-1_15" style="animation-delay: {{$delay + 175}}s">
                                        {{$calculation1_15}}
                                    </h5>
                                @endif
                            @endif
                        @endif
                    @endif
                </div>

                @if($calculation1 != 0)

                    @if($calculation3 != 0)
                        @if($calculation7 == 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 71}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 72}}s"><b>{{$result}}</b></h5>
                        @elseif($calculation11 == 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 123}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 124}}s"><b>{{$result}}</b></h5>
                        @elseif($calculation15 == 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 168}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 169}}s"><b>{{$result}}</b></h5>
                        @elseif($calculation19 == 0 || $calculation19 != 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 213}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 214}}s"><b>{{$result}}</b></h5>
                        @endif

                    @elseif($calculation3 == 0)
                        @if($calculation2_3 == 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 61}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 62}}s"><b>{{$result}}</b></h5>
                        @elseif($calculation2_7 == 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 113}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 114}}s"><b>{{$result}}</b></h5>
                        @elseif($calculation2_11 == 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 158}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 159}}s"><b>{{$result}}</b></h5>
                        @elseif($calculation2_15 == 0 || $calculation2_15 != 0)
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 203}}s">Result</h5>
                            <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 204}}s"><b>{{$result}}</b></h5>
                        @endif
                    @endif

                @elseif($calculation1 == 0)
                    @if($calculation1_3 == 0)
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 34}}s">Result</h5>
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 35}}s"><b>{{$result}}</b></h5>
                    @elseif($calculation1_7 == 0)
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 86}}s">Result</h5>
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 87}}s"><b>{{$result}}</b></h5>
                    @elseif($calculation1_11 == 0)
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 131}}s">Result</h5>
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 132}}s"><b>{{$result}}</b></h5>
                    @elseif($calculation1_15 == 0 || $calculation1_15 != 0)
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 176}}s">Result</h5>
                        <h5 class="mt-2 drop-in" style="animation-delay: {{$delay + 177}}s"><b>{{$result}}</b></h5>
                    @endif
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