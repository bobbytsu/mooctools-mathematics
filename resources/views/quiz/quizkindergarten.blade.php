<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>Quiz Kindergarten</title>

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
            <a class="text-decoration-none font-weight-bold text-dark" href="{{ url()->previous() }}"><< back</a>
            <h4 class="text-center my-5">Quiz: Kindergarten</h4>
            <h5 class="mb-5">Question</h5>
            <form method="POST" action="{{ route('quizkindergartenresult') }}" onsubmit="return confirm('Are you sure want to submit these answers?')">
                @csrf
                @php
                    $i = 1;
                @endphp
                @foreach($questions->shuffle()->take(10) as $question)
                    @php
                        ${"question{$i}"} = $question->Question;
                        session(["question{$i}" => ${"question{$i}"}]);
                    @endphp
                    <div class="form-group row d-flex align-items-center">
                        <label for="question{{ $i }}" class="col-auto col-form-label">
                            <h5>
                                <span>{{ $i }}.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                    @for($j=1; $j<=substr($question->Question, 0, 1); $j++)
                                        <img src="{{ asset('assets/candy-cane.png') }}" class="my-2" height="50px" alt="candy">
                                    @endfor
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>{{substr($question->Question, 1, 2)}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                    @for($j=1; $j<=substr($question->Question, 4); $j++)
                                        <img src="{{ asset('assets/candy-cane.png') }}" class="my-2" height="50px" alt="candy">
                                    @endfor
                                </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>=</span>
                            </h5>
                        </label>
                        <div class="col-auto">
                            <input type="text" class="form-control text-center rounded-0 square-input" id="question{{ $i }}" name="question{{ $i }}" value="{{ old('question'.$i) }}">                           
                        </div>
                        @error('question'.$i)
                            <span class="ml-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
                <div class="text-right">
                    <button type="submit" class="btn btn-danger rounded-0 square-submit-button">Submit Quiz</button>
                </div>
            </form>
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