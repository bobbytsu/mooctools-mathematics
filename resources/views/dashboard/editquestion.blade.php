<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>Edit Question</title>

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
    <div class="container py-5 d-flex justify-content-center">
        <div class="p-5 col-xl-6 bg-light">
            <a class="text-decoration-none font-weight-bold text-dark" href="{{ route('managequiz') }}"><< back</a>
            <h5 class="text-center my-3">Edit Question</h5>
            <form method="POST" action="{{ route('editquestionapp', $question->id)}}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="QuestionLevel">Question Level</label>
                    <select name="QuestionLevel" class="form-control" id="QuestionLevel">
                        <option value="" selected disabled>Select Level</option>
                        <option value="Kindergarten">Kindergarten</option>
                        <option value="1&2Grade">1st & 2nd Grade</option>
                        <option value="3&4Grade">3rd & 4th Grade</option>
                        <option value="5&6Grade">5th & 6th Grade</option>
                    </select>
                </div>
                <div class="my-2 text-danger">
                    @error('QuestionLevel')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Question" class="col-form-label">Question</label>
                    <input type="text" class="form-control" name="Question" id="Question" value="{{ old('Question') ?? $question->Question }}" placeholder="Question">
                </div>
                <div class="my-2 text-danger">
                    @error('Question')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Answer" class="col-form-label">Answer</label>
                    <input type="text" class="form-control" name="Answer" id="Answer" value="{{ old('Answer') ?? $question->Answer }}" placeholder="Answer">
                </div>
                <div class="my-2 text-danger">
                    @error('Answer')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <small class="text-muted">
                    @if($question->UpdatedByID != NULL)
                        @if($question->UpdatedByID == $question->user->id)
                            <i>Last edited by {{ $question->user->name }} on {{ $question->updated_at->format('d-m-Y') }}</i>
                        @else
                            <i>Last edited by {{ $question->UpdatedByName }} on {{ $question->updated_at->format('d-m-Y') }}</i>
                        @endif
                    @endif
                </small>
                <button type="submit" class="btn btn-danger btn-block rounded-0 mt-4">Save</button>
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