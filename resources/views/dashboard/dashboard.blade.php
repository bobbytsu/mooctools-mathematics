<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Dashboard</title>

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
            <h4 class="text-center my-5">Dashboard</h4>
            <div class="mt-5 mb-4 d-flex justify-content-between">
                <h5 class="mr-2">Your Profile</h5>
                <button type="button" class="btn btn-danger rounded-0" data-toggle="modal" data-target="#editModal">
                    <img src="{{ asset('assets/edit.png') }}" alt="edit" height="20px">
                    Edit Profile
                </button>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('editprofile') }}">
                            @method('PATCH')
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') ?? auth()->user()->username }}" placeholder="Username">
                                    <div class="my-2 text-danger">
                                        @error('username')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="name" class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? auth()->user()->name }}" placeholder="name">
                                    <div class="my-2 text-danger">
                                        @error('name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ?? auth()->user()->email }}" placeholder="email">
                                    <div class="my-2 text-danger">
                                        @error('email')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="phone" class="col-form-label">Phone Number <small class="text-muted">(Optional)</small></label>
                                    <input type="phone" class="form-control" name="phone" id="phone" value="{{ old('phone') ?? auth()->user()->phone }}" placeholder="Phone Number">
                                    <div class="my-2 text-danger">
                                        @error('phone')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger rounded-0">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($errors->hasAny(['username', 'name']))
                <script>
                    $(document).ready(function() {
                        $('#editModal').modal('show');
                    });
                </script>
            @endif
            @if(session('statusedit'))
                <script>
                    window.onload = function() {
                        alert("{{ session('statusedit') }}");
                    }
                </script>
            @endif
            <p>Username: {{ auth()->user()->username }}</p>
            <p>Name: {{ auth()->user()->name }}</p>
            <p>Email: {{ auth()->user()->email }}</p>
            <p>Phone: {{ auth()->user()->phone }}</p>
            <a type="button" class="mb-4" data-toggle="modal" data-target="#changeModal">
                Change password?
            </a>
            @if(auth()->user()->created_at != NULL)
                <form method="POST" action="{{ route('deleteaccount') }}" onsubmit="return confirm('Are you sure want to delete your admin account?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger rounded-0 mb-5">
                        <img src="{{ asset('assets/delete.png') }}" alt="edit" height="20px">
                        Delete Account
                    </button>
                </form>
            @endif
            <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="changeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changeModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('changepassword') }}">
                            @method('PATCH')
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Current Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    <div class="my-2 text-danger">
                                        @error('password')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="newpassword" class="col-form-label">New Password</label>
                                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                                    <div class="my-2 text-danger">
                                        @error('newpassword')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="confirmnewpassword" class="col-form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" name="confirmnewpassword" id="confirmnewpassword"  placeholder="Confirm New Password">
                                    <div class="my-2 text-danger">
                                        @error('confirmnewpassword')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger rounded-0">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($errors->hasAny(['password', 'newpassword', 'confirmnewpassword']))
                <script>
                    $(document).ready(function() {
                        $('#changeModal').modal('show');
                    });
                </script>
            @endif
            @if(session('statuspassword'))
                <script>
                    window.onload = function() {
                        alert("{{ session('statuspassword') }}");
                    }
                </script>
            @endif
            <div class="mt-5 mb-4 d-flex justify-content-between">
                <h5 class="mr-2">Others Admin</h5>
                @if(auth()->user()->created_at == NULL)
                    <a href="{{ route('register') }}">
                        <button class="btn btn-danger rounded-0">+ Add New Admin</button>
                    </a>
                @endif
            </div>
            <div class="table-responsive border">
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        @if(auth()->user()->created_at == NULL)
                            <th scope="col">Actions</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($users->sortByDesc('created_at') as $user)
                            @if( $user->id != auth()->user()->id)
                                <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                @if(auth()->user()->created_at == NULL)
                                    <td>
                                    @if($user->created_at != NULL)
                                        <a type="button" class="text-info" data-toggle="modal" data-target="#infoModal">Info</a>
                                        <span>|</span>
                                        <a href="{{ route('resetpassword', ['id' => $user->id]) }}" onclick="return confirm('Are you sure want to reset {{$user->name}}\'s password?')">Reset Password</a>
                                        @if(session('statusreset'))
                                            <script>
                                                window.onload = function() {
                                                    alert("{{ session('statusreset') }}");
                                                }
                                            </script>
                                        @endif
                                        <span>|</span>
                                        <a href="{{ route('deleteaccount2', ['id' => $user->id]) }}" class="text-danger" onclick="return confirm('Are you sure want to delete {{$user->name}}\'s admin account?')">Delete Account</a>
                                        @if(session('statusaccountdelete'))
                                            <script>
                                                window.onload = function() {
                                                    alert("{{ session('statusaccountdelete') }}");
                                                }
                                            </script>
                                        @endif
                                    </td>
                                    @endif
                                @endif
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="infoModalLabel">Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>
                                    <p><u>Reset Password:</u> This will be resetting the desired admin account's password into a default password. Here is the default password,<br><br><b>admin</b><br></p>
                                </li>
                                <li>
                                    <p><u>Delete Account:</u> This will be deleting all data of the desired admin's account. Remember to make sure before deleting an account because this action is irreversible.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('statusregister'))
                <script>
                    window.onload = function() {
                        alert("{{ session('statusregister') }}");
                    }
                </script>
            @endif
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