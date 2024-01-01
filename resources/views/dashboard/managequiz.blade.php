<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Manage Quiz</title>

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
            <a class="text-decoration-none font-weight-bold text-dark" href="{{ route('app') }}"><< back</a>
            <h4 class="text-center my-5">Manage Quiz</h4>
            <nav class="border bg-white">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link border-top-0 border-left-0 border-right-0 text-dark active" id="nav-kindergarten-tab" data-toggle="tab" href="#nav-kindergarten" role="tab" aria-controls="nav-kindergarten" aria-selected="true">Kindergarten</a>
                    <a class="nav-item nav-link border-top-0 border-left-0 border-right-0 text-dark" id="1-2-Grade" data-toggle="tab" href="#nav-1-2-Grade" role="tab" aria-controls="nav-1-2-Grade" aria-selected="false">1<sup>st</sup> & 2<sup>nd</sup> Grade</a>
                    <a class="nav-item nav-link border-top-0 border-left-0 border-right-0 text-dark" id="3-4-Grade" data-toggle="tab" href="#nav-3-4-Grade" role="tab" aria-controls="nav-3-4-Grade" aria-selected="false">3<sup>rd</sup> & 4<sup>th</sup> Grade</a>
                    <a class="nav-item nav-link border-top-0 border-left-0 border-right-0 text-dark" id="5-6-Grade" data-toggle="tab" href="#nav-5-6-Grade" role="tab" aria-controls="nav-5-6-Grade" aria-selected="false">5<sup>th</sup> & 6<sup>th</sup> Grade</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-kindergarten" role="tabpanel" aria-labelledby="nav-kindergarten-tab">
                    <div class="d-flex justify-content-between my-4">
                        <h4>Level: Kindergarten</h4>
                        <button type="button" class="btn btn-danger rounded-0" data-toggle="modal" data-target="#addModal">+ Add Question</button>
                    </div>
                    <div class="table-container border">
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Added by</th>
                                <th scope="col">Date added</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($questions->where('QuestionLevel', 'Kindergarten')->sortByDesc('created_at') as $question)
                                    <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{ $question->Question}}</td>
                                    <td>{{ $question->Answer}}</td>
                                    <td>@if($question->created_at != NULL){{ $question->user->name}}@endif</td>
                                    <td>@if($question->created_at != NULL){{ $question->created_at->format('d-m-Y')}}@endif</td>
                                    <td>
                                        @if($question->created_at != NULL)
                                            <a href="{{ route('editquestion', $question->id) }}">Edit</a>
                                            <span>|</span>
                                            <a href="{{ route('deletequestion', ['id' => $question->id]) }}" class="text-danger" onclick="return confirm('Are you sure want to delete this question?')">Delete</a>
                                        @endif
                                    </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-1-2-Grade" role="tabpanel" aria-labelledby="1-2-Grade">
                    <div class="d-flex justify-content-between my-4">
                        <h4>Level: 1<sup>st</sup> & 2<sup>nd</sup> Grade</h4>
                        <button type="button" class="btn btn-danger rounded-0" data-toggle="modal" data-target="#addModal">+ Add Question</button>
                    </div>
                    <div class="table-container border">
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Added by</th>
                                <th scope="col">Date added</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($questions->where('QuestionLevel', '1&2Grade')->sortByDesc('created_at') as $question)
                                    <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{ $question->Question}}</td>
                                    <td>{{ $question->Answer}}</td>
                                    <td>@if($question->created_at != NULL){{ $question->user->name}}@endif</td>
                                    <td>@if($question->created_at != NULL){{ $question->created_at->format('d-m-Y')}}@endif</td>
                                    <td>
                                        @if($question->created_at != NULL)
                                            <a href="{{ route('editquestion', $question->id) }}">Edit</a>
                                            <span>|</span>
                                            <a href="{{ route('deletequestion', ['id' => $question->id]) }}" class="text-danger" onclick="return confirm('Are you sure want to delete this question?')">Delete</a>
                                        @endif
                                    </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-3-4-Grade" role="tabpanel" aria-labelledby="3-4-Grade">
                    <div class="d-flex justify-content-between my-4">
                        <h4>Level: 3<sup>rd</sup> & 4<sup>th</sup> Grade</h4>
                        <button type="button" class="btn btn-danger rounded-0" data-toggle="modal" data-target="#addModal">+ Add Question</button>
                    </div>
                    <div class="table-container border">
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Added by</th>
                                <th scope="col">Date added</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($questions->where('QuestionLevel', '3&4Grade')->sortByDesc('created_at') as $question)
                                    <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{ $question->Question}}</td>
                                    <td>{{ $question->Answer}}</td>
                                    <td>@if($question->created_at != NULL){{ $question->user->name}}@endif</td>
                                    <td>@if($question->created_at != NULL){{ $question->created_at->format('d-m-Y')}}@endif</td>
                                    <td>
                                        @if($question->created_at != NULL)
                                            <a href="{{ route('editquestion', $question->id) }}">Edit</a>
                                            <span>|</span>
                                            <a href="{{ route('deletequestion', ['id' => $question->id]) }}" class="text-danger" onclick="return confirm('Are you sure want to delete this question?')">Delete</a>
                                        @endif
                                    </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-5-6-Grade" role="tabpanel" aria-labelledby="5-6-Grade">
                    <div class="d-flex justify-content-between my-4">
                        <h4>Level: 5<sup>th</sup> & 6<sup>th</sup> Grade</h4>
                        <button type="button" class="btn btn-danger rounded-0" data-toggle="modal" data-target="#addModal">+ Add Question</button>
                    </div>
                    <div class="table-container border">
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Added by</th>
                                <th scope="col">Date added</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($questions->where('QuestionLevel', '5&6Grade')->sortByDesc('created_at') as $question)
                                    @php
                                        ${"question{$i}"} = $question->Question;
                                        session(["question{$i}" => ${"question{$i}"}]);
                                        $formattedQuestion = preg_replace('/(\d+)\^(\d+)/', '$1<sup>$2</sup>', $question->Question);
                                    @endphp
                                    <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{!! $formattedQuestion !!}</td>
                                    <td>{{ $question->Answer}}</td>
                                    <td>@if($question->created_at != NULL){{ $question->user->name}}@endif</td>
                                    <td>@if($question->created_at != NULL){{ $question->created_at->format('d-m-Y')}}@endif</td>
                                    <td>
                                        @if($question->created_at != NULL)
                                            <a href="{{ route('editquestion', $question->id) }}">Edit</a>
                                            <span>|</span>
                                            <a href="{{ route('deletequestion', ['id' => $question->id]) }}" class="text-danger" onclick="return confirm('Are you sure want to delete this question?')">Delete</a>
                                        @endif
                                    </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('statusedit'))
        <script>
            window.onload = function() {
                alert("{{ session('statusedit') }}");
            }
        </script>
    @endif
    @if(session('statusdelete'))
        <script>
            window.onload = function() {
                alert("{{ session('statusdelete') }}");
            }
        </script>
    @endif
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('addquestion') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div>
                                <p><i>
                                    Notes: 
                                    <ul>
                                        <li>
                                            For <b>Kindergarten Level</b>, to avoid any errors please follow the following question format,<br><br>[0-9] [+/-] [0-9]<br><br>Example: 1 + 1
                                        </li>
                                        <br>
                                        <li>
                                            Use '^' for <b>Exponentiation</b><br><br>Example: 3^2
                                        </li>
                                        <br>
                                        <li>
                                            Copy these provided symbols if needed:
                                            <ul>
                                                <br>
                                                <li>÷</li>
                                                <li>√</li>
                                                <br>
                                            </ul>
                                        </li>
                                    </ul>
                                </i></p>
                            </div>
                            <label for="QuestionLevel">Question Level</label>
                            <select name="QuestionLevel" class="form-control" id="QuestionLevel">
                                <option value="" selected disabled>Select Level</option>
                                <option value="Kindergarten">Kindergarten</option>
                                <option value="1&2Grade">1st & 2nd Grade</option>
                                <option value="3&4Grade">3rd & 4th Grade</option>
                                <option value="5&6Grade">5th & 6th Grade</option>
                            </select>
                            <div class="my-2 text-danger">
                                @error('QuestionLevel')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="Question">Question</label>
                            <input type="text" name="Question" class="form-control rounded-0" id="Question" placeholder="Question" value="{{ old('Question') }}">
                            <div class="my-2 text-danger">
                                @error('Question')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="Answer">Answer</label>
                            <input type="text" name="Answer" class="form-control rounded-0" id="Answer" placeholder="Answer" value="{{ old('Answer') }}">
                            <div class="my-2 text-danger">
                                @error('Answer')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-0">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if($errors->hasAny(['QuestionLevel', 'Question', 'Answer']))
        <script>
            $(document).ready(function() {
                $('#addModal').modal('show');
            });
        </script>
    @endif
    @if(session('statusadd'))
        <script>
            window.onload = function() {
                alert("{{ session('statusadd') }}");
            }
        </script>
    @endif
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