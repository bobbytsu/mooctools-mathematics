<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>Elementary - Multiplication</title>

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
            <form class="form-inline" method="POST" action="{{ route('multiplicationsolution') }}">
                @csrf
                <div class="form-group">
                    <input class="form-control text-center rounded-0 my-2 mr-4 square-input" name="input_1" value="{{ $input_1 }}">
                    <h4 class=" my-2 mr-4">x</h4>
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
                <form method="POST" action="{{ route('multiplicationsolution') }}">
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

                    $calculation1 = $case_4_input_1_digit_2 * $case_4_input_2_digit_2;
                    $calculation1_digit = str_split($calculation1);
                    $calculation1_digit_1 = $calculation1_digit[0];
                    if(count($calculation1_digit) == 2) {
                        $calculation1_digit_2 = $calculation1_digit[1];
                    }

                    $calculation2 = $case_4_input_1_digit_1 * $case_4_input_2_digit_2;
                    $calculation2_digit = str_split($calculation2);
                    $calculation2_digit_1 = $calculation2_digit[0];
                    if(count($calculation2_digit) == 2) {
                        $calculation2_digit_2 = $calculation2_digit[1];
                    }

                    if(count($calculation1_digit) == 2) {
                        $calculation3 = $calculation2 + $calculation1_digit_1;
                        $calculation3_digit = str_split($calculation3);
                        $calculation3_digit_1 = $calculation3_digit[0];
                        if(count($calculation3_digit) == 2) {
                            $calculation3_digit_2 = $calculation3_digit[1];
                        }
                    }

                    $calculation4 = $case_4_input_1_digit_2 * $case_4_input_2_digit_1;
                    $calculation4_digit = str_split($calculation4);
                    $calculation4_digit_1 = $calculation4_digit[0];
                    if(count($calculation4_digit) == 2) {
                        $calculation4_digit_2 = $calculation4_digit[1];
                    }

                    $calculation5 = $case_4_input_1_digit_1 * $case_4_input_2_digit_1;
                    $calculation5_digit = str_split($calculation5);
                    $calculation5_digit_1 = $calculation5_digit[0];
                    if(count($calculation5_digit) == 2) {
                        $calculation5_digit_2 = $calculation5_digit[1];
                    }

                    if(count($calculation4_digit) == 2) {
                        $calculation6 = $calculation5 + $calculation4_digit_1;
                        $calculation6_digit = str_split($calculation6);
                        $calculation6_digit_1 = $calculation6_digit[0];
                        if(count($calculation6_digit) == 2) {
                            $calculation6_digit_2 = $calculation6_digit[1];
                        }
                    }

                    if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1){
                        if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1){
                            $calculation7 = $calculation3_digit_1 + $calculation4_digit_2;
                            $calculation7_digit = str_split($calculation7);
                            $calculation7_digit_1 = $calculation7_digit[0];
                            if(count($calculation7_digit) == 2) {
                                $calculation7_digit_2 = $calculation7_digit[1];
                                $calculation8 = $calculation7_digit_1 + $calculation6_digit_1;
                                $calculation8_digit = str_split($calculation8);
                                $calculation8_digit_1 = $calculation8_digit[0];
                                if(count($calculation8_digit) == 2) {
                                    $calculation8_digit_2 = $calculation8_digit[1];
                                }
                            }
                        }

                        elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1){
                            $calculation9 = $calculation3_digit_1 + $calculation4_digit_1;
                            $calculation9_digit = str_split($calculation9);
                            $calculation9_digit_1 = $calculation9_digit[0];
                            if(count($calculation9_digit) == 2) {
                                $calculation9_digit_2 = $calculation9_digit[1];
                                $calculation10 = $calculation9_digit_1 + $calculation5_digit_1;
                                $calculation10_digit = str_split($calculation10);
                                $calculation10_digit_1 = $calculation10_digit[0];
                                if(count($calculation10_digit) == 2) {
                                    $calculation10_digit_2 = $calculation10_digit[1];
                                }
                            }
                        }

                        elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2){
                            $calculation11 = $calculation3_digit_1 + $calculation4_digit_2;
                            $calculation11_digit = str_split($calculation11);
                            $calculation11_digit_1 = $calculation11_digit[0];
                            if(count($calculation11_digit) == 2) {
                                $calculation11_digit_2 = $calculation11_digit[1];
                                $calculation12 = $calculation11_digit_1 + $calculation6_digit_2;
                                $calculation12_digit = str_split($calculation12);
                                $calculation12_digit_1 = $calculation12_digit[0];
                                if(count($calculation12_digit) == 2) {
                                    $calculation12_digit_2 = $calculation12_digit[1];
                                    $calculation13 = $calculation12_digit_1 + $calculation6_digit_1;
                                }     
                            }
                        }

                    } elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2){
                        if(count($calculation4_digit) == 1 && count($calculation5_digit) == 2){
                            $calculation14 = $calculation2_digit_2 + $calculation4_digit_1;
                            $calculation14_digit = str_split($calculation14);
                            $calculation14_digit_1 = $calculation14_digit[0];

                            $calculation15 = $calculation2_digit_1 + $calculation5_digit_2;
                            $calculation15_digit = str_split($calculation15);
                            $calculation15_digit_1 = $calculation15_digit[0];
                            if(count($calculation15_digit) == 2) {
                                $calculation15_digit_2 = $calculation15_digit[1];
                            }    

                            if(count($calculation14_digit) == 2) {
                                $calculation14_digit_2 = $calculation14_digit[1];
                                $calculation16 = $calculation14_digit_1 + $calculation15;
                                $calculation16_digit = str_split($calculation16);
                                $calculation16_digit_1 = $calculation16_digit[0];
                                if(count($calculation16_digit) == 2) {
                                    $calculation16_digit_2 = $calculation16_digit[1];
                                    $calculation17 = $calculation16_digit_1 + $calculation5_digit_1;
                                }
                            }
                        }

                        elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1){
                            $calculation18 = $calculation2_digit_2 + $calculation4_digit_1;
                            $calculation18_digit = str_split($calculation18);
                            $calculation18_digit_1 = $calculation18_digit[0];
                            
                            $calculation19 = $calculation2_digit_1 + $calculation5_digit_1;
                            $calculation19_digit = str_split($calculation19);
                            $calculation19_digit_1 = $calculation19_digit[0];
                            if(count($calculation19_digit) == 2){
                                $calculation19_digit_2 = $calculation19_digit[1];
                            }

                            if(count($calculation18_digit) == 2){
                                $calculation18_digit_2 = $calculation18_digit[1];
                                $calculation20 = $calculation18_digit_1 + $calculation19;
                                $calculation20_digit = str_split($calculation20);
                                $calculation20_digit_1 = $calculation20_digit[0];
                                if(count($calculation20_digit) == 2){
                                    $calculation20_digit_2 = $calculation20_digit[1];
                                }
                            }
                        }

                        elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2){
                            $calculation21 = $calculation2_digit_2 + $calculation4_digit_2;
                            $calculation21_digit = str_split($calculation21);
                            $calculation21_digit_1 = $calculation21_digit[0];

                            $calculation22 = $calculation2_digit_1 + $calculation6_digit_2;
                            $calculation22_digit = str_split($calculation22);
                            $calculation22_digit_1 = $calculation22_digit[0];
                            if(count($calculation22_digit) == 2){
                                $calculation22_digit_2 = $calculation22_digit[1];
                                $calculation23 = $calculation22_digit_1 + $calculation6_digit_1;
                            }

                            if(count($calculation21_digit) == 2){
                                $calculation21_digit_2 = $calculation21_digit[1];
                                $calculation24 = $calculation21_digit_1 + $calculation22;
                                $calculation24_digit = str_split($calculation24);
                                $calculation24_digit_1 = $calculation24_digit[0];
                                if(count($calculation24_digit) == 2){
                                    $calculation24_digit_2 = $calculation24_digit[1];
                                    $calculation25 = $calculation24_digit_1 + $calculation6_digit_1;
                                }
                            }
                        }

                    } elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1){
                        if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1){
                            $calculation26 = $calculation2_digit_1 + $calculation4_digit_2;
                            $calculation26_digit = str_split($calculation26);
                            $calculation26_digit_1 = $calculation26_digit[0];
                            if(count($calculation26_digit) == 2){
                                $calculation26_digit_2 = $calculation26_digit[1];
                                $calculation27 = $calculation26_digit_1 + $calculation6_digit_1;
                                $calculation27_digit = str_split($calculation27);
                                $calculation27_digit_1 = $calculation27_digit[0];
                                if(count($calculation27_digit) == 2){
                                    $calculation27_digit_2 = $calculation27_digit[1];
                                }
                            }
                            
                        } elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2){
                            $calculation28 = $calculation2_digit_1 + $calculation4_digit_1;
                            $calculation28_digit = str_split($calculation28);
                            $calculation28_digit_1 = $calculation28_digit[0];
                            if(count($calculation28_digit) == 2){
                                $calculation28_digit_2 = $calculation28_digit[1];
                                $calculation29 = $calculation28_digit_1 + $calculation5_digit_2;
                                $calculation29_digit = str_split($calculation29);
                                $calculation29_digit_1 = $calculation29_digit[0];
                                if(count($calculation29_digit) == 2){
                                    $calculation29_digit_2 = $calculation29_digit[1];
                                    $calculation30 = $calculation29_digit_1 + $calculation5_digit_1;
                                }
                            }

                        } elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1){
                            $calculation31 = $calculation2_digit_1 + $calculation4_digit_1;
                            $calculation31_digit = str_split($calculation31);
                            $calculation31_digit_1 = $calculation31_digit[0];
                            if(count($calculation31_digit) == 2){
                                $calculation31_digit_2 = $calculation31_digit[1];
                                $calculation32 = $calculation31_digit_1 + $calculation5_digit_1;
                                $calculation32_digit = str_split($calculation32);
                                $calculation32_digit_1 = $calculation32_digit[0];
                                if(count($calculation32_digit) == 2){
                                    $calculation32_digit_2 = $calculation32_digit[1];
                                }
                            }

                        } elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2){
                            $calculation33 = $calculation2_digit_1 + $calculation4_digit_2;
                            $calculation33_digit = str_split($calculation33);
                            $calculation33_digit_1 = $calculation33_digit[0];
                            if(count($calculation33_digit) == 2){
                                $calculation33_digit_2 = $calculation33_digit[1];
                                $calculation34 = $calculation33_digit_1 + $calculation6_digit_2;
                                $calculation34_digit = str_split($calculation34);
                                $calculation34_digit_1 = $calculation34_digit[0];
                                if(count($calculation34_digit) == 2){
                                    $calculation34_digit_2 = $calculation34_digit[1];
                                    $calculation35 = $calculation34_digit_1 + $calculation6_digit_1;
                                }
                            }
                        }

                    } elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2){
                        if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1){
                            $calculation36 = $calculation3_digit_2 + $calculation4_digit_2;
                            $calculation36_digit = str_split($calculation36);
                            $calculation36_digit_1 = $calculation36_digit[0];

                            $calculation37 = $calculation3_digit_1 + $calculation6_digit_1;
                            $calculation37_digit = str_split($calculation37);
                            $calculation37_digit_1 = $calculation37_digit[0];
                            if(count($calculation37_digit) == 2){
                                $calculation37_digit_2 = $calculation37_digit[1];
                            }

                            if(count($calculation36_digit) == 2){
                                $calculation36_digit_2 = $calculation36_digit[1];
                                $calculation38 = $calculation36_digit_1 + $calculation37;
                                $calculation38_digit = str_split($calculation38);
                                $calculation38_digit_1 = $calculation38_digit[0];
                                if(count($calculation38_digit) == 2){
                                    $calculation38_digit_2 = $calculation38_digit[1];
                                }
                            }

                        } elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2){
                            $calculation39 = $calculation3_digit_2 + $calculation4_digit_1;
                            $calculation39_digit = str_split($calculation39);
                            $calculation39_digit_1 = $calculation39_digit[0];

                            $calculation40 = $calculation3_digit_1 + $calculation5_digit_2;
                            $calculation40_digit = str_split($calculation40);
                            $calculation40_digit_1 = $calculation40_digit[0];
                            if(count($calculation40_digit) == 2){
                                $calculation40_digit_2 = $calculation40_digit[1];
                                $calculation43 = $calculation40_digit_1 + $calculation5_digit_1;
                            }

                            if(count($calculation39_digit) == 2){
                                $calculation39_digit_2 = $calculation39_digit[1];
                                $calculation41 = $calculation39_digit_1 + $calculation40;
                                $calculation41_digit = str_split($calculation41);
                                $calculation41_digit_1 = $calculation41_digit[0];
                                if(count($calculation41_digit) == 2){
                                    $calculation41_digit_2 = $calculation41_digit[1];
                                    $calculation42 = $calculation41_digit_1 + $calculation5_digit_1;
                                }
                            }
                        } elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1){
                            $calculation43 = $calculation3_digit_2 + $calculation4_digit_1;
                            $calculation43_digit = str_split($calculation43);
                            $calculation43_digit_1 = $calculation43_digit[0];

                            $calculation44 = $calculation3_digit_1 + $calculation5_digit_1;
                            $calculation44_digit = str_split($calculation44);
                            $calculation44_digit_1 = $calculation44_digit[0];
                            if(count($calculation44_digit) == 2){
                                $calculation44_digit_2 = $calculation44_digit[1];
                            }

                            if(count($calculation43_digit) == 2){
                                $calculation43_digit_2 = $calculation43_digit[1];
                                $calculation45 = $calculation43_digit_1 + $calculation44;
                                $calculation45_digit = str_split($calculation45);
                                $calculation45_digit_1 = $calculation45_digit[0];
                                if(count($calculation45_digit) == 2){
                                    $calculation45_digit_2 = $calculation45_digit[1];
                                }
                            }
                        } elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2){
                            $calculation46 = $calculation3_digit_2 + $calculation4_digit_2;
                            $calculation46_digit = str_split($calculation46);
                            $calculation46_digit_1 = $calculation46_digit[0];

                            $calculation47 = $calculation3_digit_1 + $calculation6_digit_2;
                            $calculation47_digit = str_split($calculation47);
                            $calculation47_digit_1 = $calculation47_digit[0];
                            if(count($calculation47_digit) == 2){
                                $calculation47_digit_2 = $calculation47_digit[1];
                                $calculation50 = $calculation47_digit_1 + $calculation6_digit_1;
                            }

                            if(count($calculation46_digit) == 2){
                                $calculation46_digit_2 = $calculation46_digit[1];
                                $calculation48 = $calculation46_digit_1 + $calculation47;
                                $calculation48_digit = str_split($calculation48);
                                $calculation48_digit_1 = $calculation48_digit[0];
                                if(count($calculation48_digit) == 2){
                                    $calculation48_digit_2 = $calculation48_digit[1];
                                    $calculation49 = $calculation48_digit_1 + $calculation6_digit_1;
                                }
                            }
                        }
                    }
                @endphp
                <h5 class="drop-in">Solution</h5>
                <p class="drop-in" style="animation-delay: {{$delay}}s">Let's put it this way,</p>
                <div class="m-5">
                    @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                        <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 16}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 18}}s">
                                +
                            </span>
                        </h5>
                        <h5 class="drop-in" style="animation-delay: {{$delay + 6}}s">
                            <span class="move-text" style="animation-delay: {{$delay + 8}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 19}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 22}}s">
                                        {{$calculation1_digit_1}}
                                    </span>
                                </span>
                            </span>
                        </h5>
                    @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                        <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 16}}s">
                            <span class="drop-out" style="animation-delay: {{$delay + 18}}s">
                                +
                            </span>
                        </h5>
                        <h5 class="drop-in" style="animation-delay: {{$delay + 6}}s">
                            <span class="move-text" style="animation-delay: {{$delay + 8}}s">
                                <span class="color-animation" style="animation-delay: {{$delay + 19}}s">
                                    <span class="drop-out" style="animation-delay: {{$delay + 22}}s">
                                        {{$calculation1_digit_1}}
                                    </span>
                                </span>
                            </span>
                        </h5>
                    @endif
                    @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 36}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 38}}s">
                                    +
                                </span>
                            </h5>
                            <h5 class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                <span class="move-text-3a" style="animation-delay: {{$delay + 28}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            </h5>
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 36}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 38}}s">
                                    +
                                </span>
                            </h5>
                            <h5 class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                <span class="move-text-3a" style="animation-delay: {{$delay + 28}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            </h5>
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 26}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 28}}s">
                                    +
                                </span>
                            </h5>
                            <h5 class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                <span class="move-text-3a" style="animation-delay: {{$delay + 18}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            </h5>
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 26}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 28}}s">
                                    +
                                </span>
                            </h5>
                            <h5 class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                <span class="move-text-3a" style="animation-delay: {{$delay + 18}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            </h5>
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 26}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 28}}s">
                                    +
                                </span>
                            </h5>
                            <h5 class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                <span class="move-text-3a" style="animation-delay: {{$delay + 18}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            </h5>
                        @endif
                    @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 36}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 38}}s">
                                    +
                                </span>
                            </h5>
                            <h5 class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                <span class="move-text-3a" style="animation-delay: {{$delay + 28}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            </h5>
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            <h5 class="drop-in multiplication-plus-1 ml-4 text-primary" style="animation-delay: {{$delay + 36}}s">
                                <span class="drop-out" style="animation-delay: {{$delay + 38}}s">
                                    +
                                </span>
                            </h5>
                            <h5 class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                <span class="move-text-3a" style="animation-delay: {{$delay + 28}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            </h5>
                        @endif    
                    @endif
                    <h5 class="ml-5 drop-in" style="animation-delay: {{$delay + 1}}s">
                        <span class="color-animation" style="animation-delay:
                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                            {{$delay + 12}}s
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                            {{$delay + 7}}s
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                            {{$delay + 7}}s
                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                            {{$delay + 12}}s
                        @endif">
                            <span class="color-animation" style="animation-delay:
                                @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 32}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 27}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 32}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 17}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 17}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 22}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 22}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 17}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 17}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 22}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 32}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 27}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 27}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 32}}s
                                    @endif
                                @endif">
                                {{$case_4_input_1_digit_1}}
                            </span>
                        </span>
                        <span class="color-animation" style="animation-delay: {{$delay + 2}}s">
                            <span class="color-animation" style="animation-delay:
                                @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 22}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 22}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 22}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 12}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 12}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 12}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 12}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 12}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 12}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 12}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 22}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 22}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 22}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 22}}s
                                    @endif
                                @endif">
                                {{$case_4_input_1_digit_2}}
                            </span>
                        </span>
                    </h5>
                    <h5 class="ml-5 drop-in" style="animation-delay: {{$delay + 1}}s">
                        <span class="color-animation" style="animation-delay:
                            @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 24}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 24}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 24}}s
                                @endif
                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 14}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 14}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 14}}s
                                @endif
                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 14}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 14}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 14}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 14}}s
                                @endif
                            @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 24}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 24}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 24}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 24}}s
                                @endif
                            @endif">
                            <span class="color-animation" style="animation-delay:
                                @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 34}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 29}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 34}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 19}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 19}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 24}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 24}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 19}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 19}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 24}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 34}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 29}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 29}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 34}}s
                                    @endif
                                @endif">
                                {{$case_4_input_2_digit_1}}
                            </span>
                        </span>
                        <span class="color-animation" style="animation-delay: {{$delay + 4}}s">
                            <span class="color-animation" style="animation-delay: 
                                @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                    {{$delay + 14}}s 
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                    {{$delay + 9}}s
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                    {{$delay + 9}}s
                                @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                    {{$delay + 14}}s
                                @endif">
                                {{$case_4_input_2_digit_2}}
                            </span>
                        </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="color-animation" style="animation-delay: {{$delay + 3}}s">
                            <span class="color-animation" style="animation-delay:
                            @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                {{$delay + 13}}s
                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                {{$delay + 8}}s
                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                {{$delay + 8}}s
                            @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                {{$delay + 13}}s
                            @endif">
                                <span class="color-animation" style="animation-delay:
                                    @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                            {{$delay + 23}}s
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            {{$delay + 23}}s
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            {{$delay + 23}}s
                                        @endif
                                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                            {{$delay + 13}}s
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            {{$delay + 13}}s
                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            {{$delay + 13}}s
                                        @endif
                                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                            {{$delay + 13}}s
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                            {{$delay + 13}}s
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            {{$delay + 13}}s
                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            {{$delay + 13}}s
                                        @endif
                                    @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                            {{$delay + 23}}s
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                            {{$delay + 23}}s
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            {{$delay + 23}}s
                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            {{$delay + 23}}s
                                        @endif
                                    @endif">
                                    <span class="color-animation" style="animation-delay:
                                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                {{$delay + 33}}s
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                {{$delay + 28}}s
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                {{$delay + 33}}s
                                            @endif
                                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                {{$delay + 18}}s
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                {{$delay + 18}}s
                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                {{$delay + 23}}s
                                            @endif
                                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                {{$delay + 23}}s
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                {{$delay + 18}}s
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                {{$delay + 18}}s
                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                {{$delay + 23}}s
                                            @endif
                                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                {{$delay + 33}}s
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                {{$delay + 28}}s
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                {{$delay + 28}}s
                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                {{$delay + 33}}s
                                            @endif
                                        @endif">
                                        x
                                    </span>
                                </span>
                            </span>
                        </span>
                    </h5>
                    <hr class="drop-in" style="animation-delay: {{$delay + 1}}s">
                    <h5 class=
                        "@if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                            multiplication-result-1
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                            multiplication-result-3
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                            multiplication-result-1
                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                            multiplication-result-2
                        @endif">
                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                            <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 47}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 37}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 47}}s
                                    @endif">
                                    {{$calculation3_digit_1}}
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 6}}s">
                                <span class="color-animation" style="animation-delay: 
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 44}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 34}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 44}}s
                                @endif">
                                    {{$calculation1_digit_2}}
                                </span>
                            </span>
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                            <span class="drop-in" style="animation-delay: {{$delay + 11}}s">
                                <span class="color-animation" style="animation-delay: 
                                @if(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    @if(count($calculation14_digit) == 1)
                                        {{$delay + 32}}s
                                    @elseif(count($calculation14_digit) == 2)
                                        {{$delay + 37}}s
                                    @endif
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    @if(count($calculation18_digit) == 1)
                                        {{$delay + 32}}s
                                    @elseif(count($calculation18_digit) == 2)
                                        {{$delay + 37}}s
                                    @endif
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    @if(count($calculation21_digit) == 1)
                                        {{$delay + 42}}s
                                    @elseif(count($calculation21_digit) == 2)
                                        {{$delay + 46}}s
                                    @endif
                                @endif">
                                    {{$calculation2_digit_1}}
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 11}}s">
                                <span class="color-animation" style="animation-delay: 
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 27}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 27}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 37}}s
                                @endif">
                                    {{$calculation2_digit_2}}
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 6}}s">
                                <span class="color-animation" style="animation-delay:
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 24}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 24}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 34}}s
                                @endif">
                                    {{$calculation1_digit_1}}
                                </span>
                            </span>
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                            <span class="drop-in" style="animation-delay: {{$delay + 11}}s">
                                <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 37}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 27}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 27}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 37}}s
                                    @endif">
                                    {{$calculation2_digit_1}}
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 6}}s">
                                <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 34}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 24}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 24}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 34}}s
                                    @endif">
                                    {{$calculation1_digit_1}}
                                </span>
                            </span>
                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                            <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                <span class="color-animation" style="animation-delay: 
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    @if(count($calculation36_digit) == 1)
                                        {{$delay + 52}}s
                                    @elseif(count($calculation36_digit) == 2)
                                        {{$delay + 57}}s
                                    @endif
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    @if(count($calculation39_digit) == 1)
                                        {{$delay + 42}}s
                                    @elseif(count($calculation39_digit) == 2)
                                        {{$delay + 47}}s
                                    @endif
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1) 
                                    @if(count($calculation43_digit) == 1)
                                        {{$delay + 42}}s
                                    @elseif(count($calculation43_digit) == 2)
                                        {{$delay + 47}}s
                                    @endif
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    @if(count($calculation46_digit) == 1)
                                        {{$delay + 52}}s
                                    @elseif(count($calculation46_digit) == 2)
                                        {{$delay + 57}}s
                                    @endif
                                @endif">
                                    {{$calculation3_digit_1}}
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                <span class="color-animation" style="animation-delay: 
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 47}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 37}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 37}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 47}}s
                                @endif">
                                    {{$calculation3_digit_2}}
                                </span>
                            </span>
                            <span class="drop-in" style="animation-delay: {{$delay + 6}}s">
                                <span class="color-animation" style="animation-delay: 
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 44}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 34}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 34}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 44}}s
                                @endif">
                                    {{$calculation1_digit_2}}
                                </span>
                            </span>
                        @endif
                    </h5>
                    <h5 class=
                        "@if(count($calculation4_digit) == 2 && count($calculation5_digit) == 1)
                            multiplication-result-3
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            multiplication-result-4
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            multiplication-result-2
                        @elseif(count($calculation4_digit) == 2 && count($calculation5_digit) == 2)
                            multiplication-result-4
                        @endif">
                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation7_digit) == 1)
                                        {{$delay + 52}}s
                                    @elseif(count($calculation7_digit) == 2)
                                        {{$delay + 59}}s
                                    @endif">
                                        {{$calculation6_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 49}}s">
                                        {{$calculation4_digit_2}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                <h1>Not possible, if this text shows up then it means possible but i just don't figure out the number.</h1>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation9_digit) == 1)
                                        {{$delay + 42}}s
                                    @elseif(count($calculation9_digit) == 2)
                                        {{$delay + 49}}s
                                    @endif">
                                        {{$calculation5_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation11_digit) == 1)
                                        {{$delay + 55}}s
                                    @elseif(count($calculation11_digit) == 2)
                                        @if(count($calculation12_digit) == 1)
                                            {{$delay + 62}}s
                                        @elseif(count($calculation12_digit) == 2)
                                            {{$delay + 69}}s
                                        @endif
                                    @endif">
                                        {{$calculation6_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation11_digit) == 1)
                                        {{$delay + 52}}s
                                    @elseif(count($calculation11_digit) == 2)
                                        {{$delay + 59}}s
                                    @endif">
                                        {{$calculation6_digit_2}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 49}}s">
                                        {{$calculation4_digit_2}}
                                    </span>
                                </span>
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                <h1>Not possible, if this text shows up then it means possible but i just don't figure out the number.</h1>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                    <span class="color-animation" style="animation-delay:
                                    @if(count($calculation14_digit) == 1)
                                        @if(count($calculation15_digit) == 1)
                                            {{$delay + 37}}s
                                        @elseif(count($calculation15_digit) == 2)
                                            {{$delay + 44}}s
                                        @endif
                                    @elseif(count($calculation14_digit) == 2)
                                        @if(count($calculation16_digit) == 1)
                                            {{$delay + 44}}s
                                        @elseif(count($calculation16_digit) == 2)
                                            {{$delay + 51}}s
                                        @endif
                                    @endif">
                                        {{$calculation5_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation14_digit) == 1)
                                        {{$delay + 34}}s
                                    @elseif(count($calculation14_digit) == 2)
                                        {{$delay + 39}}s
                                    @endif">
                                        {{$calculation5_digit_2}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation18_digit) == 1)
                                        {{$delay + 34}}s
                                    @elseif(count($calculation18_digit) == 2)
                                        {{$delay + 39}}s
                                    @endif">
                                        {{$calculation5_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation21_digit) == 1)
                                        @if(count($calculation22_digit) == 1)
                                            {{$delay + 47}}s
                                        @elseif(count($calculation22_digit) == 2)
                                            {{$delay + 54}}s
                                        @endif
                                    @elseif(count($calculation21_digit) == 2)
                                        @if(count($calculation24_digit) == 1)
                                            {{$delay + 53}}s
                                        @elseif(count($calculation24_digit) == 2)
                                            {{$delay + 61}}s
                                        @endif
                                    @endif">
                                        {{$calculation6_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation21_digit) == 1)
                                        {{$delay + 44}}s
                                    @elseif(count($calculation21_digit) == 2)
                                        {{$delay + 48}}s
                                    @endif">
                                        {{$calculation6_digit_2}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_2}}
                                    </span>
                                </span>
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation26_digit) == 1)
                                        {{$delay + 42}}s
                                    @elseif(count($calculation26_digit) == 2)
                                        {{$delay + 49}}s
                                    @endif
                                    ">
                                        {{$calculation6_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_2}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation28_digit) == 1)
                                        {{$delay + 35}}s
                                    @elseif(count($calculation28_digit) == 2)
                                        @if(count($calculation29_digit) == 1)
                                            {{$delay + 42}}s
                                        @elseif(count($calculation29_digit) == 2)
                                            {{$delay + 49}}s
                                        @endif
                                    @endif">
                                        {{$calculation5_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation28_digit) == 1)
                                        {{$delay + 32}}s
                                    @elseif(count($calculation28_digit) == 2)
                                        {{$delay + 39}}s
                                    @endif">
                                        {{$calculation5_digit_2}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 21}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation31_digit) == 1)
                                        {{$delay + 32}}s
                                    @elseif(count($calculation31_digit) == 2)
                                        {{$delay + 39}}s
                                    @endif">
                                        {{$calculation5_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 29}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation33_digit) == 1)
                                        {{$delay + 45}}s
                                    @elseif(count($calculation33_digit) == 2)
                                        @if(count($calculation34_digit) == 1)
                                            {{$delay + 52}}s
                                        @elseif(count($calculation34_digit) == 2)
                                            {{$delay + 59}}s
                                        @endif
                                    @endif
                                    ">
                                        {{$calculation6_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation33_digit) == 1)
                                        {{$delay + 42}}s
                                    @elseif(count($calculation33_digit) == 2)
                                        {{$delay + 49}}s
                                    @endif">
                                        {{$calculation6_digit_2}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 16}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_2}}
                                    </span>
                                </span>
                            @endif
                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation36_digit) == 1)
                                        {{$delay + 54}}s
                                    @elseif(count($calculation36_digit) == 2)
                                        {{$delay + 59}}s
                                    @endif">
                                        {{$calculation6_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 49}}s">
                                        {{$calculation4_digit_2}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation39_digit) == 1)
                                        @if(count($calculation40_digit) == 1)
                                            @if(count($calculation40_digit) == 1)
                                                {{$delay + 47}}s
                                            @elseif(count($calculation40_digit) == 2)
                                                {{$delay + 54}}s
                                            @endif
                                        @endif
                                    @elseif(count($calculation39_digit) == 2)
                                        @if(count($calculation41_digit) == 1)
                                            {{$delay + 54}}s
                                        @elseif(count($calculation41_digit) == 2)
                                            {{$delay + 61}}s
                                        @endif
                                    @endif">
                                        {{$calculation5_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation39_digit) == 1)
                                        {{$delay + 44}}s
                                    @elseif(count($calculation39_digit) == 2)
                                        {{$delay + 49}}s
                                    @endif">
                                        {{$calculation5_digit_2}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation43_digit) == 1)
                                        {{$delay + 44}}s
                                    @elseif(count($calculation43_digit) == 2)
                                            {{$delay + 49}}s
                                    @endif
                                    ">
                                        {{$calculation5_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 39}}s">
                                        {{$calculation4_digit_1}}
                                    </span>
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation46_digit) == 1)
                                        @if(count($calculation47_digit) == 1)
                                            {{$delay + 57}}s
                                        @elseif(count($calculation47_digit) == 2)
                                            {{$delay + 64}}s
                                        @endif
                                    @elseif(count($calculation46_digit) == 2)
                                        @if(count($calculation48_digit) == 1)
                                            {{$delay + 64}}s
                                        @elseif(count($calculation48_digit) == 2)
                                            {{$delay + 71}}s
                                        @endif
                                    @endif">
                                        {{$calculation6_digit_1}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation46_digit) == 1)
                                        {{$delay + 54}}s
                                    @elseif(count($calculation46_digit) == 2)
                                        {{$delay + 59}}s
                                    @endif">
                                        {{$calculation6_digit_2}}
                                    </span>
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    <span class="color-animation" style="animation-delay: {{$delay + 49}}s">
                                        {{$calculation4_digit_2}}
                                    </span>
                                </span>
                            @endif    
                        @endif
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="drop-in" style="animation-delay: 
                            @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 43}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 33}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 43}}s
                                @endif
                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 23}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 23}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 33}}s
                                @endif
                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 33}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 23}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 23}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 33}}s
                                @endif
                            @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                    {{$delay + 43}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                    {{$delay + 33}}s
                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                    {{$delay + 33}}s
                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                    {{$delay + 43}}s
                                @endif    
                            @endif">
                            <span class="color-animation" style="animation-delay: 
                                @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 48}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 38}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 48}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 28}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 28}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 38}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 38}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 28}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 28}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 38}}s
                                    @endif
                                @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                        {{$delay + 48}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                        {{$delay + 38}}s
                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                        {{$delay + 38}}s
                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                        {{$delay + 48}}s
                                    @endif    
                                @endif" >
                                <span class="color-animation" style="animation-delay: 
                                    @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                            @if(count($calculation7_digit) == 2)
                                                {{$delay + 58}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                            
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            @if(count($calculation9_digit) == 2)
                                                {{$delay + 48}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            @if(count($calculation11_digit) == 2)
                                                {{$delay + 58}}s
                                            @endif
                                        @endif
                                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                            
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                            @if(count($calculation14_digit) == 1)
                                                @if(count($calculation15_digit) == 1)
                                                    {{$delay + 33}}s
                                                @elseif(count($calculation15_digit) == 2)
                                                    {{$delay + 43}}s
                                                @endif
                                            @elseif(count($calculation14_digit) == 2)
                                                {{$delay + 38}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            @if(count($calculation18_digit) == 1)
                                                {{$delay + 33}}s
                                            @elseif(count($calculation18_digit) == 2)
                                                {{$delay + 38}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            @if(count($calculation21_digit) == 1)
                                                {{$delay + 43}}s
                                            @elseif(count($calculation21_digit) == 2)
                                                {{$delay + 47}}s
                                            @endif
                                        @endif
                                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                            @if(count($calculation26_digit) == 2)
                                                {{$delay + 48}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                            @if(count($calculation28_digit) == 2)
                                                {{$delay + 38}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            @if(count($calculation31_digit) == 2)
                                                {{$delay + 38}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            @if(count($calculation33_digit) == 2)
                                                {{$delay + 48}}s
                                            @endif
                                        @endif
                                    @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                            @if(count($calculation36_digit) == 1)
                                                {{$delay + 53}}s
                                            @elseif(count($calculation36_digit) == 2)
                                                {{$delay + 58}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                            @if(count($calculation39_digit) == 1)
                                                @if(count($calculation40_digit) == 1)
                                                    {{$delay + 43}}s
                                                @elseif(count($calculation40_digit) == 2)
                                                    {{$delay + 53}}s
                                                @endif
                                            @elseif(count($calculation39_digit) == 2)
                                                {{$delay + 48}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                            @if(count($calculation43_digit) == 1)
                                                {{$delay + 43}}s
                                            @elseif(count($calculation43_digit) == 2)
                                                {{$delay + 48}}s
                                            @endif
                                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                            @if(count($calculation46_digit) == 1)
                                                {{$delay + 53}}s
                                            @endif
                                        @endif
                                    @endif" >
                                    <span class="color-animation" style="animation-delay: 
                                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                
                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                @if(count($calculation12_digit) == 2)
                                                    {{$delay + 68}}s
                                                @endif
                                            @endif
                                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                @if(count($calculation14_digit) == 2)
                                                    {{$delay + 40}}s
                                                @endif
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                @if(count($calculation18_digit) == 2)
                                                    {{$delay + 40}}s
                                                @endif
                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                @if(count($calculation21_digit) == 1)
                                                    @if(count($calculation22_digit) == 2)
                                                        {{$delay + 53}}s
                                                    @endif
                                                @elseif(count($calculation21_digit) == 2)
                                                    {{$delay + 49}}s
                                                @endif
                                            @endif
                                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                @if(count($calculation28_digit) == 2)
                                                    @if(count($calculation29_digit) == 2)
                                                        {{$delay + 48}}s
                                                    @endif
                                                @endif
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                
                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                @if(count($calculation33_digit) == 2)
                                                    @if(count($calculation34_digit) == 2)
                                                        {{$delay + 58}}s
                                                    @endif
                                                @endif
                                            @endif
                                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                @if(count($calculation36_digit) == 2)
                                                    {{$delay + 60}}s
                                                @endif
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                @if(count($calculation39_digit) == 2)
                                                    {{$delay + 50}}s
                                                @endif
                                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                @if(count($calculation43_digit) == 2)
                                                    {{$delay + 50}}s
                                                @endif
                                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                @if(count($calculation46_digit) == 1)
                                                    @if(count($calculation47_digit) == 2)
                                                        {{$delay + 63}}s
                                                    @endif
                                                @elseif(count($calculation46_digit) == 2)
                                                    {{$delay + 58}}s   
                                                @endif    
                                            @endif    
                                        @endif" >
                                        <span class="color-animation" style="animation-delay: 
                                            @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                    
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)

                                                @endif
                                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                    @if(count($calculation14_digit) == 2)
                                                        @if(count($calculation16_digit) == 2)
                                                            {{$delay + 50}}s
                                                        @endif
                                                    @endif
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                    @if(count($calculation21_digit) == 2)
                                                        @if(count($calculation24_digit) == 2)
                                                            {{$delay + 60}}s
                                                        @endif
                                                    @endif
                                                @endif
                                            @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                    
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                    
                                                @endif
                                            @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                                @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                    @if(count($calculation39_digit) == 2)
                                                        @if(count($calculation41_digit) == 2)
                                                            {{$delay + 60}}s
                                                        @endif
                                                    @endif
                                                @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                    
                                                @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                    @if(count($calculation46_digit) == 2)
                                                        {{$delay + 60}}s
                                                    @endif
                                                @endif    
                                            @endif" >
                                            <span class="color-animation" style="animation-delay: 
                                                @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                        
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)

                                                    @endif
                                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                    
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)

                                                    @endif
                                                @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                        
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                        
                                                    @endif
                                                @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                                                    @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                                    
                                                    @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                                        
                                                    @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                                        @if(count($calculation46_digit) == 2)
                                                            @if(count($calculation48_digit) == 2)
                                                                {{$delay + 70}}s
                                                            @endif
                                                        @endif
                                                    @endif    
                                                @endif" >
                                                +
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </h5>
                    <hr class="drop-in" style="animation-delay: 
                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                {{$delay + 43}}s
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)

                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                {{$delay + 33}}s
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                {{$delay + 43}}s
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)

                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                {{$delay + 23}}s
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                {{$delay + 23}}s
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                {{$delay + 33}}s
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                {{$delay + 33}}s
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                {{$delay + 23}}s
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                {{$delay + 23}}s
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                {{$delay + 33}}s
                            @endif
                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                {{$delay + 43}}s
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                {{$delay + 33}}s
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                {{$delay + 33}}s
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                {{$delay + 43}}s
                            @endif    
                        @endif">
                    @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation7_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                    <span class="move-text-3b" style="animation-delay: {{$delay + 53}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 57}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 61}}s">
                                                {{$calculation7_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation8_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                        <span class="move-text-3c" style="animation-delay: {{$delay + 63}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 67}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 71}}s">
                                                    {{$calculation8_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation9_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="move-text-3b" style="animation-delay: {{$delay + 43}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 47}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 51}}s">
                                                {{$calculation9_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation10_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        <span class="move-text-3c" style="animation-delay: {{$delay + 53}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 57}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 61}}s">
                                                    {{$calculation10_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation11_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                    <span class="move-text-3b" style="animation-delay: {{$delay + 53}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 57}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 61}}s">
                                                {{$calculation11_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                            @endif
                            @if(count($calculation12_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                    <span class="move-text-3c" style="animation-delay: {{$delay + 63}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 67}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 71}}s">
                                                {{$calculation12_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                        @if(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation14_digit) == 1)
                                @if(count($calculation15_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 38}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 42}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 46}}s">
                                                    {{$calculation15_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @elseif(count($calculation14_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="move-text-3e" style="animation-delay: {{$delay + 33}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 41}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 45}}s">
                                                {{$calculation14_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation16_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 43}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 45}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 49}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 53}}s">
                                                    {{$calculation16_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation18_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="move-text-3e" style="animation-delay: {{$delay + 33}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 41}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 45}}s">
                                                {{$calculation18_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation21_digit) == 1)
                                @if(count($calculation22_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 48}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 52}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 56}}s">
                                                    {{$calculation22_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @elseif(count($calculation21_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="move-text-3e" style="animation-delay: {{$delay + 42}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 50}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 54}}s">
                                                {{$calculation21_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation24_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 52}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 54}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 59}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 63}}s">
                                                    {{$calculation24_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation26_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="move-text-3c" style="animation-delay: {{$delay + 43}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 47}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 51}}s">
                                                {{$calculation26_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation28_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="move-text-3c" style="animation-delay: {{$delay + 33}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 37}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 41}}s">
                                                {{$calculation28_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation29_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 43}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 47}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 51}}s">
                                                    {{$calculation29_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation31_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                    <span class="move-text-3c" style="animation-delay: {{$delay + 33}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 37}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 41}}s">
                                                {{$calculation31_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)  
                            @if(count($calculation33_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="move-text-3c" style="animation-delay: {{$delay + 43}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 47}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 51}}s">
                                                {{$calculation33_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation34_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 53}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 57}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 61}}s">
                                                    {{$calculation34_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation36_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                    <span class="move-text-3e" style="animation-delay: {{$delay + 53}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 61}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 65}}s">
                                                {{$calculation36_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation39_digit) == 1)
                                @if(count($calculation40_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 48}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 52}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 56}}s">
                                                    {{$calculation40_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @elseif(count($calculation39_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="move-text-3e" style="animation-delay: {{$delay + 43}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 51}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 55}}s">
                                                {{$calculation39_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation41_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 53}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 55}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 59}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 61}}s">
                                                    {{$calculation41_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif

                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1) 
                            @if(count($calculation43_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    <span class="move-text-3e" style="animation-delay: {{$delay + 43}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 51}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 54}}s">
                                                {{$calculation43_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation46_digit) == 1)
                                @if(count($calculation47_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                        <span class="move-text-3d" style="animation-delay: {{$delay + 58}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 62}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 66}}s">
                                                    {{$calculation47_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @elseif(count($calculation46_digit) == 2)
                                <h5 class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                    <span class="move-text-3f" style="animation-delay: {{$delay + 53}}s">
                                        <span class="color-animation" style="animation-delay: {{$delay + 61}}s">
                                            <span class="drop-out" style="animation-delay: {{$delay + 64}}s">
                                                {{$calculation46_digit_1}}
                                            </span>
                                        </span>
                                    </span>
                                </h5>
                                @if(count($calculation48_digit) == 2)
                                    <h5 class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                        <span class="move-text-3g" style="animation-delay: {{$delay + 65}}s">
                                            <span class="color-animation" style="animation-delay: {{$delay + 69}}s">
                                                <span class="drop-out" style="animation-delay: {{$delay + 73}}s">
                                                    {{$calculation48_digit_1}}
                                                </span>
                                            </span>
                                        </span>
                                    </h5>
                                @endif
                            @endif
                        @endif
                    @endif
                    <h5 class="
                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                @if(count($calculation7_digit) == 1)
                                    multiplication-result-2
                                @elseif(count($calculation7_digit) == 2)
                                    @if(count($calculation8_digit) == 1) 
                                        multiplication-result-2
                                    @elseif(count($calculation8_digit) == 2) 
                                        multiplication-result-4
                                    @endif
                                @endif
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                @if(count($calculation9_digit) == 1)
                                    multiplication-result-2
                                @elseif(count($calculation9_digit) == 2)
                                    @if(count($calculation10_digit) == 1) 
                                        multiplication-result-2
                                    @elseif(count($calculation10_digit) == 2) 
                                        multiplication-result-4
                                    @endif
                                @endif
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                multiplication-result-4
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                            @if(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                multiplication-result-4
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                @if(count($calculation18_digit) == 1)
                                    @if(count($calculation19_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation19_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @elseif(count($calculation18_digit) == 2)
                                    @if(count($calculation20_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation20_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @endif
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                multiplication-result-4
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                @if(count($calculation26_digit) == 1)
                                    multiplication-result-2
                                @elseif(count($calculation26_digit) == 2)
                                    @if(count($calculation27_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation27_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @endif
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                multiplication-result-4
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                @if(count($calculation31_digit) == 1)
                                    multiplication-result-2
                                @elseif(count($calculation31_digit) == 2)
                                    @if(count($calculation32_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation32_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @endif
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                multiplication-result-4
                            @endif
                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                @if(count($calculation36_digit) == 1)
                                    @if(count($calculation37_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation37_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @elseif(count($calculation36_digit) == 2)
                                    @if(count($calculation38_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation38_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @endif
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                multiplication-result-4
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1) 
                                @if(count($calculation43_digit) == 1)
                                    @if(count($calculation44_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation44_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @elseif(count($calculation43_digit) == 2)
                                    @if(count($calculation45_digit) == 1)
                                        multiplication-result-2
                                    @elseif(count($calculation45_digit) == 2)
                                        multiplication-result-4
                                    @endif
                                @endif
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                multiplication-result-4
                            @endif
                        @endif">
                        @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                @if(count($calculation7_digit) == 1)
                                    <span class="drop-in" style="animation-delay: {{$delay + 54}}s">
                                        {{$calculation6_digit_1}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation7_digit_1}}
                                    </span>
                                @elseif(count($calculation7_digit) == 2)
                                    @if(count($calculation8_digit) == 1)    
                                        <span class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                            {{$calculation8_digit_1}}
                                        </span>
                                    @elseif(count($calculation8_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                            {{$calculation8_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                            {{$calculation8_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation7_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                    {{$calculation1_digit_2}}
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                @if(count($calculation9_digit) == 1)
                                    <span class="drop-in" style="animation-delay: {{$delay + 44}}s">
                                        {{$calculation5_digit_1}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation9_digit_1}}
                                    </span>
                                @elseif(count($calculation9_digit) == 2)
                                    @if(count($calculation10_digit) == 1)    
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation10_digit_1}}
                                        </span>
                                    @elseif(count($calculation10_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation10_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation10_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation9_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                    {{$calculation1_digit_2}}
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                @if(count($calculation11_digit) == 1)
                                    <span class="drop-in" style="animation-delay: {{$delay + 57}}s">
                                        {{$calculation6_digit_1}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 54}}s">
                                        {{$calculation6_digit_2}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation11_digit_1}}
                                    </span>
                                @elseif(count($calculation11_digit) == 2)
                                    @if(count($calculation12_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 64}}s">
                                            {{$calculation6_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                            {{$calculation12_digit_1}}
                                        </span>
                                    @elseif(count($calculation12_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 71}}s">
                                            {{$calculation13}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                            {{$calculation12_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation11_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                    {{$calculation1_digit_2}}
                                </span>
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                @if(count($calculation14_digit) == 1)
                                    @if(count($calculation15_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 39}}s">
                                            {{$calculation5_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                            {{$calculation15_digit_1}}
                                        </span>
                                    @elseif(count($calculation15_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation17}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                            {{$calculation15_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation14_digit_1}}
                                    </span>
                                @elseif(count($calculation14_digit) == 2)
                                    @if(count($calculation16_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation5_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 43}}s">
                                            {{$calculation16_digit_1}}
                                        </span>
                                    @elseif(count($calculation16_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 53}}s">
                                            {{$calculation17}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 43}}s">
                                            {{$calculation16_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation14_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    {{$calculation1_digit_1}}
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                @if(count($calculation18_digit) == 1)
                                    @if(count($calculation19_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                            {{$calculation19_digit_1}}
                                        </span>
                                    @elseif(count($calculation19_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                            {{$calculation19_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                            {{$calculation19_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation18_digit_1}}
                                    </span>
                                @elseif(count($calculation18_digit) == 2)
                                    @if(count($calculation20_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 43}}s">
                                            {{$calculation20_digit_1}}
                                        </span>
                                    @elseif(count($calculation20_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 43}}s">
                                            {{$calculation20_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 43}}s">
                                            {{$calculation20_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation18_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    {{$calculation1_digit_1}}
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                @if(count($calculation21_digit) == 1)
                                    @if(count($calculation22_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 49}}s">
                                            {{$calculation6_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation22_digit_1}}
                                        </span>
                                    @elseif(count($calculation22_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation23}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation22_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation21_digit_1}}
                                    </span>
                                @elseif(count($calculation21_digit) == 2)
                                    @if(count($calculation24_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 55}}s">
                                            {{$calculation6_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 52}}s">
                                            {{$calculation24_digit_1}}
                                        </span>
                                    @elseif(count($calculation24_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                            {{$calculation25}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 52}}s">
                                            {{$calculation24_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation21_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                    {{$calculation1_digit_1}}
                                </span>
                            @endif
                        @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                @if(count($calculation26_digit) == 1)
                                <span class="drop-in" style="animation-delay: {{$delay + 44}}s">
                                    {{$calculation6_digit_1}}
                                </span>
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    {{$calculation26_digit_1}}
                                </span>
                                @elseif(count($calculation26_digit) == 2)
                                    @if(count($calculation27_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation27_digit_1}}
                                        </span>
                                    @elseif(count($calculation27_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation27_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation27_digit_2}}
                                        </span>
                                    @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                    {{$calculation26_digit_2}}
                                </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                    {{$calculation1_digit_1}}
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                @if(count($calculation28_digit) == 1)
                                    <span class="drop-in" style="animation-delay: {{$delay + 37}}s">
                                        {{$calculation5_digit_1}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 34}}s">
                                        {{$calculation5_digit_2}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation28_digit_1}}
                                    </span>
                                @elseif(count($calculation28_digit) == 2)
                                    @if(count($calculation29_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 44}}s">
                                            {{$calculation5_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                            {{$calculation29_digit_1}}
                                        </span>
                                    @elseif(count($calculation29_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation30}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                            {{$calculation29_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation28_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    {{$calculation1_digit_1}}
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                                @if(count($calculation31_digit) == 1)
                                    <span class="drop-in" style="animation-delay: {{$delay + 34}}s">
                                        {{$calculation5_digit_1}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation31_digit_1}}
                                    </span>
                                @elseif(count($calculation31_digit) == 2)
                                    @if(count($calculation32_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                            {{$calculation32_digit_1}}
                                        </span>
                                    @elseif(count($calculation32_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                            {{$calculation32_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                            {{$calculation32_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 31}}s">
                                        {{$calculation31_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 26}}s">
                                    {{$calculation1_digit_1}}
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)  
                                @if(count($calculation33_digit) == 1)
                                    <span class="drop-in" style="animation-delay: {{$delay + 47}}s">
                                        {{$calculation6_digit_1}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 44}}s">
                                        {{$calculation6_digit_2}}
                                    </span>
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation33_digit_1}}
                                    </span>
                                @elseif(count($calculation33_digit) == 2)
                                    @if(count($calculation34_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 54}}s">
                                            {{$calculation6_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation34_digit_1}}
                                        </span>
                                    @elseif(count($calculation34_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 61}}s">
                                            {{$calculation35}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                            {{$calculation34_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation33_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                    {{$calculation1_digit_1}}
                                </span>
                            @endif
                        @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                            @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                                @if(count($calculation36_digit) == 1)
                                    @if(count($calculation37_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation37_digit_1}}
                                        </span>
                                    @elseif(count($calculation37_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation37_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation37_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation36_digit_1}}
                                    </span>
                                @elseif(count($calculation36_digit) == 2)
                                    @if(count($calculation38_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                            {{$calculation38_digit_1}}
                                        </span>
                                    @elseif(count($calculation38_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                            {{$calculation38_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                            {{$calculation38_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation36_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                    {{$calculation1_digit_2}}
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                                @if(count($calculation39_digit) == 1)
                                    @if(count($calculation40_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 49}}s">
                                            {{$calculation5_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation40_digit_1}}
                                        </span>
                                    @elseif(count($calculation40_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation43}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation40_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation39_digit_1}}
                                    </span>
                                @elseif(count($calculation39_digit) == 2)
                                    @if(count($calculation41_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation5_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 53}}s">
                                            {{$calculation41_digit_1}}
                                        </span>
                                    @elseif(count($calculation41_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                            {{$calculation42}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 53}}s">
                                            {{$calculation41_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation39_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                    {{$calculation1_digit_2}}
                                </span>
                            @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1) 
                                @if(count($calculation43_digit) == 1)
                                    @if(count($calculation44_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation44_digit_1}}
                                        </span>
                                    @elseif(count($calculation44_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation44_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                            {{$calculation44_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation43_digit_1}}
                                    </span>
                                @elseif(count($calculation43_digit) == 2)
                                    @if(count($calculation45_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 53}}s">
                                            {{$calculation45_digit_1}}
                                        </span>
                                    @elseif(count($calculation45_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 53}}s">
                                            {{$calculation45_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 53}}s">
                                            {{$calculation45_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 41}}s">
                                        {{$calculation43_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 36}}s">
                                    {{$calculation1_digit_2}}
                                </span>
                            @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                                @if(count($calculation46_digit) == 1)
                                    @if(count($calculation47_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 59}}s">
                                            {{$calculation6_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation47_digit_1}}
                                        </span>
                                    @elseif(count($calculation47_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 66}}s">
                                            {{$calculation50}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 56}}s">
                                            {{$calculation47_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation46_digit_1}}
                                    </span>
                                @elseif(count($calculation46_digit) == 2)
                                    @if(count($calculation48_digit) == 1)
                                        <span class="drop-in" style="animation-delay: {{$delay + 66}}s">
                                            {{$calculation6_digit_1}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                            {{$calculation48_digit_1}}
                                        </span>
                                    @elseif(count($calculation48_digit) == 2)
                                        <span class="drop-in" style="animation-delay: {{$delay + 73}}s">
                                            {{$calculation49}}
                                        </span>
                                        <span class="drop-in" style="animation-delay: {{$delay + 63}}s">
                                            {{$calculation48_digit_2}}
                                        </span>
                                    @endif
                                    <span class="drop-in" style="animation-delay: {{$delay + 51}}s">
                                        {{$calculation46_digit_2}}
                                    </span>
                                @endif
                                <span class="drop-in" style="animation-delay: {{$delay + 46}}s">
                                    {{$calculation1_digit_2}}
                                </span>
                            @endif    
                        @endif
                    </h5>
                </div>
                <h5 class="mt-2 drop-in" style="animation-delay: 
                    @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation7_digit) == 1)
                                {{$delay + 55}}s
                            @elseif(count($calculation7_digit) == 2)
                                {{$delay + 62}}s
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation9_digit) == 1)
                                {{$delay + 45}}s
                            @elseif(count($calculation9_digit) == 2)
                                {{$delay + 52}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation11_digit) == 1)
                                {{$delay + 58}}s
                            @elseif(count($calculation11_digit) == 2)
                                @if(count($calculation12_digit) == 1)
                                    {{$delay + 65}}s
                                @elseif(count($calculation12_digit) == 2)
                                    {{$delay + 72}}s
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                        @if(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation14_digit) == 1)
                                @if(count($calculation15_digit) == 1)
                                    {{$delay + 40}}s
                                @elseif(count($calculation15_digit) == 2)
                                    {{$delay + 47}}s
                                @endif
                            @elseif(count($calculation14_digit) == 2)
                                @if(count($calculation16_digit) == 1)
                                    {{$delay + 47}}s
                                @elseif(count($calculation16_digit) == 2)
                                    {{$delay + 54}}s
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation18_digit) == 1)
                                {{$delay + 37}}s
                            @elseif(count($calculation18_digit) == 2)
                                {{$delay + 44}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation21_digit) == 1)
                                @if(count($calculation22_digit) == 1)
                                    {{$delay + 50}}s
                                @elseif(count($calculation22_digit) == 2)
                                    {{$delay + 57}}s
                                @endif
                            @elseif(count($calculation21_digit) == 2)
                                @if(count($calculation24_digit) == 1)
                                    {{$delay + 56}}s
                                @elseif(count($calculation24_digit) == 2)
                                    {{$delay + 64}}s
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation26_digit) == 1)
                                {{$delay + 45}}s
                            @elseif(count($calculation26_digit) == 2)
                                {{$delay + 52}}s
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation28_digit) == 1)
                                {{$delay + 38}}s
                            @elseif(count($calculation28_digit) == 2)
                                @if(count($calculation29_digit) == 1)
                                    {{$delay + 45}}s
                                @elseif(count($calculation29_digit) == 2)
                                    {{$delay + 52}}s
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation31_digit) == 1)
                                {{$delay + 35}}s
                            @elseif(count($calculation31_digit) == 2)
                                {{$delay + 42}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)  
                            @if(count($calculation33_digit) == 1)
                                {{$delay + 48}}s
                            @elseif(count($calculation33_digit) == 2)
                                @if(count($calculation34_digit) == 1)
                                    {{$delay + 55}}s
                                @elseif(count($calculation34_digit) == 2)
                                    {{$delay + 62}}s
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation36_digit) == 1)
                                {{$delay + 57}}s
                            @elseif(count($calculation36_digit) == 2)
                                {{$delay + 64}}s
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation39_digit) == 1)
                                @if(count($calculation40_digit) == 1)
                                    {$delay + 50}}s
                                @elseif(count($calculation40_digit) == 2)
                                    {{$delay + 57}}s
                                @endif
                            @elseif(count($calculation39_digit) == 2)
                                @if(count($calculation41_digit) == 1)
                                    {{$delay + 57}}s
                                @elseif(count($calculation41_digit) == 2)
                                    {{$delay + 63}}s
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1) 
                            @if(count($calculation43_digit) == 1)
                                {{$delay + 47}}s
                            @elseif(count($calculation43_digit) == 2)
                                {{$delay + 54}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation46_digit) == 1)
                                @if(count($calculation47_digit) == 1)
                                    {{$delay + 60}}s
                                @elseif(count($calculation47_digit) == 2)
                                    {{$delay + 67}}s
                                @endif
                            @elseif(count($calculation46_digit) == 2)
                                @if(count($calculation48_digit) == 1)
                                    {{$delay + 67}}s
                                @elseif(count($calculation48_digit) == 2)
                                    {{$delay + 74}}s
                                @endif
                            @endif
                        @endif
                    @endif">
                    Result
                </h5>
                <h5 class="mt-2 drop-in" style="animation-delay: 
                    @if(count($calculation1_digit) == 2 && count($calculation3_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation7_digit) == 1)
                                {{$delay + 56}}s
                            @elseif(count($calculation7_digit) == 2)
                                {{$delay + 63}}s
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation9_digit) == 1)
                                {{$delay + 46}}s
                            @elseif(count($calculation9_digit) == 2)
                                {{$delay + 53}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation11_digit) == 1)
                                {{$delay + 59}}s
                            @elseif(count($calculation11_digit) == 2)
                                @if(count($calculation12_digit) == 1)
                                    {{$delay + 66}}s
                                @elseif(count($calculation12_digit) == 2)
                                    {{$delay + 73}}s
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 2)
                        @if(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation14_digit) == 1)
                                @if(count($calculation15_digit) == 1)
                                    {{$delay + 41}}s
                                @elseif(count($calculation15_digit) == 2)
                                    {{$delay + 48}}s
                                @endif
                            @elseif(count($calculation14_digit) == 2)
                                @if(count($calculation16_digit) == 1)
                                    {{$delay + 48}}s
                                @elseif(count($calculation16_digit) == 2)
                                    {{$delay + 55}}s
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation18_digit) == 1)
                                {{$delay + 38}}s
                            @elseif(count($calculation18_digit) == 2)
                                {{$delay + 45}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation21_digit) == 1)
                                @if(count($calculation22_digit) == 1)
                                    {{$delay + 51}}s
                                @elseif(count($calculation22_digit) == 2)
                                    {{$delay + 58}}s
                                @endif
                            @elseif(count($calculation21_digit) == 2)
                                @if(count($calculation24_digit) == 1)
                                    {{$delay + 57}}s
                                @elseif(count($calculation24_digit) == 2)
                                    {{$delay + 65}}s
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 1 && count($calculation2_digit) == 1)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation26_digit) == 1)
                                {{$delay + 46}}s
                            @elseif(count($calculation26_digit) == 2)
                                {{$delay + 53}}s
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation28_digit) == 1)
                                {{$delay + 39}}s
                            @elseif(count($calculation28_digit) == 2)
                                @if(count($calculation29_digit) == 1)
                                    {{$delay + 46}}s
                                @elseif(count($calculation29_digit) == 2)
                                    {{$delay + 53}}s
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1)
                            @if(count($calculation31_digit) == 1)
                                {{$delay + 36}}s
                            @elseif(count($calculation31_digit) == 2)
                                {{$delay + 43}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation33_digit) == 1)
                                {{$delay + 49}}s
                            @elseif(count($calculation33_digit) == 2)
                                @if(count($calculation34_digit) == 1)
                                    {{$delay + 56}}s
                                @elseif(count($calculation34_digit) == 2)
                                    {{$delay + 63}}s
                                @endif
                            @endif
                        @endif
                    @elseif(count($calculation1_digit) == 2 && count($calculation3_digit) == 2)
                        @if(count($calculation4_digit) == 2 && count($calculation6_digit) == 1)
                            @if(count($calculation36_digit) == 1)
                                {{$delay + 58}}s
                            @elseif(count($calculation36_digit) == 2)
                                {{$delay + 65}}s
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 2)
                            @if(count($calculation39_digit) == 1)
                                @if(count($calculation40_digit) == 1)
                                    {$delay + 51}}s
                                @elseif(count($calculation40_digit) == 2)
                                    {{$delay + 58}}s
                                @endif
                            @elseif(count($calculation39_digit) == 2)
                                @if(count($calculation41_digit) == 1)
                                    {{$delay + 58}}s
                                @elseif(count($calculation41_digit) == 2)
                                    {{$delay + 64}}s
                                @endif
                            @endif
                        @elseif(count($calculation4_digit) == 1 && count($calculation5_digit) == 1) 
                            @if(count($calculation43_digit) == 1)
                                {{$delay + 48}}s
                            @elseif(count($calculation43_digit) == 2)
                                {{$delay + 55}}s
                            @endif
                        @elseif(count($calculation4_digit) == 2 && count($calculation6_digit) == 2)
                            @if(count($calculation46_digit) == 1)
                                @if(count($calculation47_digit) == 1)
                                    {{$delay + 61}}s
                                @elseif(count($calculation47_digit) == 2)
                                    {{$delay + 68}}s
                                @endif
                            @elseif(count($calculation46_digit) == 2)
                                @if(count($calculation48_digit) == 1)
                                    {{$delay + 68}}s
                                @elseif(count($calculation48_digit) == 2)
                                    {{$delay + 75}}s
                                @endif
                            @endif
                        @endif
                    @endif">
                    <b>{{$result}}</b>
                </h5>
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
