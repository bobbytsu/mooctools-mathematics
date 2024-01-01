<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>Quiz 5th & 6th Grade Result</title>

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
            <a class="text-decoration-none font-weight-bold text-dark float-right" href="{{ route('addition') }}">continue >></a>
            <h4 class="text-center my-5">Quiz Result: 5<sup>th</sup> & 6<sup>th</sup> Grade</h4>
            <h5 class="mb-5">Question</h5>
            <div class="form-group row d-flex align-items-center">
                <label for="question1" class="col-auto col-form-label">
                    <h5>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question1')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question1" placeholder="{{ $answer1 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned1->Answer) == preg_replace('/[,.]/', '', $answer1))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned1->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question2" class="col-auto col-form-label">
                    <h5>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question2')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question2" placeholder="{{ $answer2 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned2->Answer) == preg_replace('/[,.]/', '', $answer2))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned2->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question3" class="col-auto col-form-label">
                    <h5>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question3')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question3" placeholder="{{ $answer3 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned3->Answer) == preg_replace('/[,.]/', '', $answer3))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned3->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question4" class="col-auto col-form-label">
                    <h5>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question4')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question4" placeholder="{{ $answer4 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned4->Answer) == preg_replace('/[,.]/', '', $answer4))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned4->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question5" class="col-auto col-form-label">
                    <h5>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question5')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question5" placeholder="{{ $answer5 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned5->Answer) == preg_replace('/[,.]/', '', $answer5))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned5->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question6" class="col-auto col-form-label">
                    <h5>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question6')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question6" placeholder="{{ $answer6 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned6->Answer) == preg_replace('/[,.]/', '', $answer6))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned6->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question7" class="col-auto col-form-label">
                    <h5>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question7')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question7" placeholder="{{ $answer7 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned7->Answer) == preg_replace('/[,.]/', '', $answer7))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned7->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question8" class="col-auto col-form-label">
                    <h5>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question8')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question8" placeholder="{{ $answer8 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned8->Answer) == preg_replace('/[,.]/', '', $answer8))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned8->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question9" class="col-auto col-form-label">
                    <h5>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question9')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question9" placeholder="{{ $answer9 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned9->Answer) == preg_replace('/[,.]/', '', $answer9))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned9->Answer }}</b></small>
                    </div>
                @endif
            </div>
            <div class="form-group row d-flex align-items-center">
                <label for="question10" class="col-auto col-form-label">
                    <h5>10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', session('question10')) !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=</h5>
                </label>
                <div class="col-auto">
                    <input type="text" class="form-control text-center rounded-0 p-0 square-input" id="question10" placeholder="{{ $answer10 }}" readonly>
                </div>
                @if(preg_replace('/[,.]/', '', $questioned10->Answer) == preg_replace('/[,.]/', '', $answer10))
                    <div class="col-auto">
                        <h5 class="text-success">Correct</h5>
                    </div>
                @else
                    <div class="col-auto">
                        <h5 class="text-danger">Incorrect</h5>
                    </div>
                    <div class="col-auto">
                        <small>Answer: <b>{{ $questioned10->Answer }}</b></small>
                    </div>
                @endif
            </div>
            @php
                $score = 0;
                if($questioned1->Answer == $answer1){
                    $score+=10;
                } 
                if($questioned2->Answer == $answer2){
                    $score+=10;
                }
                if($questioned3->Answer == $answer3){
                    $score+=10;
                }
                if($questioned4->Answer == $answer4){
                    $score+=10;
                }
                if($questioned5->Answer == $answer5){
                    $score+=10;
                }
                if($questioned6->Answer == $answer6){
                    $score+=10;
                }
                if($questioned7->Answer == $answer7){
                    $score+=10;
                }
                if($questioned8->Answer == $answer8){
                    $score+=10;
                }
                if($questioned9->Answer == $answer9){
                    $score+=10;
                }
                if($questioned10->Answer == $answer10){
                    $score+=10;
                }
            @endphp
            <div class="text-right">
                <h5>Score:</h5>
                <h5 class="mb-5">{{ $score }}</h5>
                <a href="{{ route('selectquiz') }}">
                    <button type="button" class="btn btn-danger rounded-0">
                        <img src="{{ asset('assets/refresh.png') }}" alt="reload" height="20px">
                        Try Again
                    </button>
                </a>
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