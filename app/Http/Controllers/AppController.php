<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\CaseSensitiveExists;
use Illuminate\Support\Facades\Session;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Question;

class AppController extends Controller
{
    // App View
    public function app_view(){
        return view('app.app');
    }

    // Login View
    public function login_view(){

        return view('auth.login');
    }

        // Login App
        public function login_app(Request $request){

            $request->validate([
                'username' => ['required', new CaseSensitiveExists],
                'password' => 'required'
            ]);

            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {

                return redirect()->route('app');
            }
                return redirect()->back()->with(['error' => 'Incorrect Username/Password']);
        }

    // Logout
    public function logout(){

        Auth::logout();
        return redirect()->back();
    }

    // Dashboard View
    public function dashboard_view(){

        $users = User::all();

        return view('dashboard.dashboard', compact('users'));
    }

        // Profile Edit
        public function profile_edit(Request $request){

            $user = Auth::user();

            $request->validate([
                'username' => [
                    'required',
                    Rule::unique('users')->ignore($user->id, 'id'),
                ],
                'name' => 'required',
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($user->id, 'id'),
                ],
                'phone' => 'nullable'
            ]);

            User::where('id', $user->id)->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);

            return redirect()->route('dashboard')->with('statusedit', 'Profile Updated!');
        }

        // Change Password
        public function change_password(Request $request){

            $user = Auth::user();

            $request->validate([
                'password' => ['required', 'min:5', new MatchOldPassword],
                'newpassword' => ['required', 'min:5'],
                'confirmnewpassword' => ['required', 'min:5', 'same:newpassword']
            ]);

            User::where('id', $user->id)->update([
                'password'=> Hash::make($request->newpassword)
            ]);

            return redirect()->route('dashboard')->with('statuspassword', 'Password Changed!');
        }

        // Delete Account
        public function delete_account(){

            $user = Auth::user();

            Auth::logout();

            $user->delete();

            return redirect()->route('app')->with('statusaccount', 'Account Deleted!');
        }

        // Register View
        public function register_view(){

            return view('dashboard.register');
        }

        // Register App
        public function register_app(Request $request){

            $request->validate([
                'username' => 'required|unique:users',
                'name' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'nullable',
                'password' => 'required|min:5|confirmed'
            ]);

            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password'=> Hash::make($request->password)
            ]);

            return redirect()->route('dashboard')->with('statusregister', 'Registration Completed!');

        }

        // Reset Password App
        public function reset_password($id){

            $user = User::find($id);

            $user->password = Hash::make('admin');
            $user->save();

            return redirect()->route('dashboard')->with('statusreset', $user->name . ' password resetted!');
        }

        // Delete Account 2
        public function delete_account_2($id){

            $user = User::find($id);

            $user->delete();

            return redirect()->route('dashboard')->with('statusaccountdelete', 'Account Deleted!');
        }

    // Manage Quiz View
    public function manage_quiz_view(){

        $questions = Question::all();

        return view('dashboard.managequiz', compact('questions'));
    }

    // Add Question App
    public function add_question(Request $request){

        $request->validate([
            'QuestionLevel' => 'required',
            'Question' => 'required',
            'Answer' => 'required',
        ]);
        
        $question = Question::create([
            'QuestionLevel' => $request->QuestionLevel,
            'Question' => $request->Question,
            'Answer' => $request->Answer
        ]);

        Question::where('id', $question->id)->update([
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('managequiz')->with('statusadd', 'Question Added!');
    }

    // Edit Question View
    public function edit_question_view(Question $question){

        return view('dashboard.editquestion', compact('question'));
    }

        // Edit Question App
        public function edit_question_app(Request $request, Question $question){

            $request->validate([
                'QuestionLevel' => 'required',
                'Question' => 'required',
                'Answer' => 'required'
            ]);

            Question::where('id', $question->id)->update([
                'QuestionLevel' => $request->QuestionLevel,
                'Question' => $request->Question,
                'Answer' => $request->Answer,
                'UpdatedByID' => auth()->user()->id,
                'UpdatedByName' => auth()->user()->name
            ]);
    
            return redirect()->route('managequiz')->with('statusedit', 'Question Updated!');
        }

    // Delete Question
    public function delete_question($id){

        $question = Question::find($id);

        $question->delete();

        return redirect()->route('managequiz')->with('statusdelete', 'Question Deleted!');
    }

    // Addition Kindergarten View
    public function addition_kindergarten_view(){
        return view('addition.app_kindergarten');
    }

    // Addition View
    public function addition_view(){
        return view('addition.app');
    }

        // Addition Kindergarten App
        public function addition_kindergarten_app(Request $request){
            $request->validate([
                'input_1' => 'required|numeric|between:0,9|regex:/^[0-9]+$/',
                'input_2' => 'required|numeric|between:0,9|regex:/^[0-9]+$/',
            ]);

            $input_1 = $request->input('input_1');
            $input_2 = $request->input('input_2');

            $result = $input_1 + $input_2;
                
            return view('addition.case1_kindergarten', compact('input_1', 'input_2', 'result'));

        }

        // Addition App
        public function addition_app(Request $request){
            $request->validate([
                'input_1' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
                'input_2' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
            ]);

            $input_1 = $request->input('input_1');
            $input_2 = $request->input('input_2');

            $digit_1 = str_split($input_1);
            $digit_2 = str_split($input_2);

            $result = $input_1 + $input_2;
            $result_digit = str_split($result);
            
            if(count($digit_1) === 2 && count($digit_2) === 1 && count($result_digit) === 2){
                $case_2_input_1_digit_1 = $digit_1[0];
                $case_2_input_1_digit_2 = $digit_1[1];

                $case_2_input_2_digit_1 = $digit_2[0];


                $calculation_1 = $case_2_input_1_digit_2 + $case_2_input_2_digit_1;
                $calculation_1_digit = str_split($calculation_1);
                

                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];

                if(count($calculation_1_digit) === 1){
                    return view('addition.case2a', compact('input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2'));

                } else if(count($calculation_1_digit) === 2){
                    $calculation_1_digit_1 = $calculation_1_digit[0];
                    $calculation_1_digit_2 = $calculation_1_digit[1];

                    return view('addition.case2b', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2'));
                }

            } else if(count($digit_1) === 2 && count($digit_2) === 1 && count($result_digit) === 3){
                $case_2_input_1_digit_1 = $digit_1[0];
                $case_2_input_1_digit_2 = $digit_1[1];

                $case_2_input_2_digit_1 = $digit_2[0];


                $calculation_1 = $case_2_input_1_digit_2 + $case_2_input_2_digit_1;
                $calculation_1_digit = str_split($calculation_1);
                $calculation_1_digit_1 = $calculation_1_digit[0];
                $calculation_1_digit_2 = $calculation_1_digit[1];

                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];
                $result_digit_3 = $result_digit[2];

                return view('addition.case2c', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2', 'result_digit_3'));

            } else if(count($digit_1) === 1 && count($digit_2) === 2 && count($result_digit) === 2){
                $case_3_input_1_digit_1 = $digit_1[0];

                $case_3_input_2_digit_1 = $digit_2[0];
                $case_3_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_3_input_2_digit_2 + $case_3_input_1_digit_1;
                $calculation_1_digit = str_split($calculation_1);


                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];

                if(count($calculation_1_digit) === 1){
                    return view('addition.case3a', compact('input_1', 'input_2', 'result', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'case_3_input_1_digit_1', 'result_digit_1', 'result_digit_2'));

                } else if(count($calculation_1_digit) === 2){
                    $calculation_1_digit_1 = $calculation_1_digit[0];
                    $calculation_1_digit_2 = $calculation_1_digit[1];

                    return view('addition.case3b', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'case_3_input_1_digit_1', 'result_digit_1', 'result_digit_2'));
                }

            } else if(count($digit_1) === 1 && count($digit_2) === 2 && count($result_digit) === 3){
                $case_3_input_1_digit_1 = $digit_1[0];
                
                $case_3_input_2_digit_1 = $digit_2[0];
                $case_3_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_3_input_2_digit_2 + $case_3_input_1_digit_1;
                $calculation_1_digit = str_split($calculation_1);
                $calculation_1_digit_1 = $calculation_1_digit[0];
                $calculation_1_digit_2 = $calculation_1_digit[1];

                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];
                $result_digit_3 = $result_digit[2];

                return view('addition.case3c', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'case_3_input_1_digit_1', 'result_digit_1', 'result_digit_2', 'result_digit_3'));


            } else if(count($digit_1) && count($digit_2) === 1){
                
                return view('addition.case1', compact('input_1', 'input_2', 'result'));

            } else if(count($digit_1) && count($digit_2) === 2 && count($result_digit) === 2){
                $case_4_input_1_digit_1 = $digit_1[0];
                $case_4_input_1_digit_2 = $digit_1[1];

                $case_4_input_2_digit_1 = $digit_2[0];
                $case_4_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_4_input_1_digit_2 + $case_4_input_2_digit_2;
                $calculation_1_digit = str_split($calculation_1);
                $calculation_2 = $case_4_input_1_digit_1 + $case_4_input_2_digit_1;
                $calculation_2_digit = str_split($calculation_2);

                
                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];


                if(count($calculation_1_digit) === 1 && count($calculation_2_digit) === 1){

                    return view('addition.case4a', compact('input_1', 'input_2', 'result','case_4_input_1_digit_1', 'case_4_input_1_digit_2', 'case_4_input_2_digit_1', 'case_4_input_2_digit_2', 'result_digit_1', 'result_digit_2'));

                } else if(count($calculation_1_digit) === 2 && count($calculation_2_digit) === 1){
                    $calculation_1_digit_1 = $calculation_1_digit[0];
                    $calculation_1_digit_2 = $calculation_1_digit[1];

                    return view('addition.case4b', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result','case_4_input_1_digit_1', 'case_4_input_1_digit_2', 'case_4_input_2_digit_1', 'case_4_input_2_digit_2', 'result_digit_1', 'result_digit_2'));

                }
            } else if(count($digit_1) && count($digit_2) === 2 && count($result_digit) === 3){
                $case_4_input_1_digit_1 = $digit_1[0];
                $case_4_input_1_digit_2 = $digit_1[1];

                $case_4_input_2_digit_1 = $digit_2[0];
                $case_4_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_4_input_1_digit_2 + $case_4_input_2_digit_2;
                $calculation_1_digit = str_split($calculation_1);
                $calculation_2 = $case_4_input_1_digit_1 + $case_4_input_2_digit_1;
                $calculation_2_digit = str_split($calculation_2);
                $calculation_1_digit_1 = $calculation_1_digit[0];
                $calculation_1_digit_2 = $calculation_1_digit[1];
                
                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];
                $result_digit_3 = $result_digit[2];

                return view('addition.case4c', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result','case_4_input_1_digit_1', 'case_4_input_1_digit_2', 'case_4_input_2_digit_1', 'case_4_input_2_digit_2', 'result_digit_1', 'result_digit_2', 'result_digit_3'));

            }
        }

    // Subtraction Kindergarten View
    public function view_subtraction_kindergarten(){
        return view('subtraction.app_kindergarten');
    }

    // Subtraction View
    public function view_subtraction(){
        return view('subtraction.app');
    }

        // Subtraction Kindergarten App
        public function subtraction_kindergarten_app(Request $request){
            $validated = $request->validate([
                'input_1' => 'required|numeric|between:0,9|regex:/^[0-9]+$/',
                'input_2' => 'required|numeric|between:0,9|regex:/^[0-9]+$/',
            ]);

            $input_1 = $request->input('input_1');
            $input_2 = $request->input('input_2');

            $digit_1 = str_split($input_1);
            $digit_2 = str_split($input_2);

            $result = $input_1 - $input_2;
            
            if($result < 0){

                return view('subtraction.case1b_kindergarten', compact('input_1', 'input_2', 'result'));

            } else if(count($digit_1) && count($digit_2) === 1 && $result >= 0){

                return view('subtraction.case1a_kindergarten', compact('input_1', 'input_2', 'result'));

            }
        }

        // Subtraction App
        public function subtraction_app(Request $request){
            $validated = $request->validate([
                'input_1' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
                'input_2' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
            ]);

            $input_1 = $request->input('input_1');
            $input_2 = $request->input('input_2');

            $digit_1 = str_split($input_1);
            $digit_2 = str_split($input_2);

            $result = $input_1 - $input_2;
            $result_digit = str_split($result);

            
            if($result < 0){

                if($input_1 == 0){
    
                    if(count($digit_1) === count($digit_2)){

                        return view('subtraction.case1d', compact('input_1', 'input_2', 'result'));

                    } else if(count($digit_1) < count($digit_2)){

                        return view('subtraction.case1e', compact('input_1', 'input_2', 'result'));

                    }

                } else if(count($digit_1) === count($digit_2)){

                    return view('subtraction.case1b', compact('input_1', 'input_2', 'result'));

                } else if(count($digit_1) < count($digit_2)){

                    return view('subtraction.case1c', compact('input_1', 'input_2', 'result'));

                }

            } else if(count($digit_1) === 2 && count($digit_2) === 1 && count($result_digit) === 1){
                $case_2_input_1_digit_1 = $digit_1[0];
                $case_2_input_1_digit_2 = $digit_1[1];

                $case_2_input_2_digit_1 = $digit_2[0];


                return view('subtraction.case2a', compact('input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1'));

            } else if(count($digit_1) === 2 && count($digit_2) === 1 && count($result_digit) === 2){
                $case_2_input_1_digit_1 = $digit_1[0];
                $case_2_input_1_digit_2 = $digit_1[1];

                $case_2_input_2_digit_1 = $digit_2[0];


                $calculation_1 = $case_2_input_1_digit_2 - $case_2_input_2_digit_1;


                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];

                if($calculation_1 >= 0){

                    return view('subtraction.case2b', compact('input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2'));

                } else if($calculation_1 < 0){
                    $borrowed = $case_2_input_1_digit_1 - 1;
                    $borrow = $case_2_input_1_digit_2 + 10;

                    return view('subtraction.case2c', compact('borrowed', 'borrow', 'input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2'));

                }
                
            } else if(count($digit_1) && count($digit_2) === 1 && $result >= 0){

                return view('subtraction.case1a', compact('input_1', 'input_2', 'result'));

            } else if(count($digit_1) && count($digit_2) === 2 && $result >= 0 && count($result_digit) === 1){
                $case_3_input_1_digit_1 = $digit_1[0];
                $case_3_input_1_digit_2 = $digit_1[1];

                $case_3_input_2_digit_1 = $digit_2[0];
                $case_3_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_3_input_1_digit_2 - $case_3_input_2_digit_2;
                $calculation_2 = $case_3_input_1_digit_1 - $case_3_input_2_digit_1;


                if($calculation_1 >= 0 && $calculation_2 >= 0){

                    return view('subtraction.case3a', compact('input_1', 'input_2', 'result', 'case_3_input_1_digit_1', 'case_3_input_1_digit_2', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2'));

                } else if($calculation_1 < 0 && $calculation_2 >= 0){
                    $borrowed = $case_3_input_1_digit_1 - 1;
                    $borrow = $case_3_input_1_digit_2 + 10;

                    return view('subtraction.case3b', compact('borrowed', 'borrow', 'input_1', 'input_2', 'result', 'case_3_input_1_digit_1', 'case_3_input_1_digit_2', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2'));

                }

            } else if(count($digit_1) && count($digit_2) === 2 && $result >= 0 && count($result_digit) === 2){
                $case_3_input_1_digit_1 = $digit_1[0];
                $case_3_input_1_digit_2 = $digit_1[1];

                $case_3_input_2_digit_1 = $digit_2[0];
                $case_3_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_3_input_1_digit_2 - $case_3_input_2_digit_2;
                $calculation_2 = $case_3_input_1_digit_1 - $case_3_input_2_digit_1;


                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];

                
                if($calculation_1 >= 0 && $calculation_2 >= 0){

                    return view('subtraction.case3c', compact('input_1', 'input_2', 'result', 'case_3_input_1_digit_1', 'case_3_input_1_digit_2', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'result_digit_1', 'result_digit_2'));

                } else if($calculation_1 < 0 && $calculation_2 >= 0){
                    $borrowed = $case_3_input_1_digit_1 - 1;
                    $borrow = $case_3_input_1_digit_2 + 10;

                    return view('subtraction.case3d', compact('borrowed', 'borrow', 'input_1', 'input_2', 'result', 'case_3_input_1_digit_1', 'case_3_input_1_digit_2', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'result_digit_1', 'result_digit_2'));

                }

            }
        }

    // View Multiplication
    public function view_multiplication(){
        return view('multiplication.app');
    }

        // Multiplication App
        public function multiplication_app(Request $request){
            $validated = $request->validate([
                'input_1' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
                'input_2' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
            ]);

            $input_1 = $request->input('input_1');
            $input_2 = $request->input('input_2');

            $digit_1 = str_split($input_1);
            $digit_2 = str_split($input_2);

            $result = $input_1 * $input_2;
            $result_digit = str_split($result);

            
            if(count($digit_1) === 2 && count($digit_2) === 1 && count($result_digit) === 2) {
                $case_2_input_1_digit_1 = $digit_1[0];
                $case_2_input_1_digit_2 = $digit_1[1];

                $case_2_input_2_digit_1 = $digit_2[0];


                $calculation_1 = $case_2_input_1_digit_2 * $case_2_input_2_digit_1;
                $calculation_1_digit = str_split($calculation_1);
                

                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];

                if(count($calculation_1_digit) === 1){
                    return view('multiplication.case2a', compact('input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2'));

                } else if(count($calculation_1_digit) === 2){
                    $calculation_1_digit_1 = $calculation_1_digit[0];
                    $calculation_1_digit_2 = $calculation_1_digit[1];

                    return view('multiplication.case2b', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2'));
                }

            } else if(count($digit_1) === 2 && count($digit_2) === 1 && count($result_digit) === 3){
                $case_2_input_1_digit_1 = $digit_1[0];
                $case_2_input_1_digit_2 = $digit_1[1];

                $case_2_input_2_digit_1 = $digit_2[0];


                $calculation_1 = $case_2_input_1_digit_2 * $case_2_input_2_digit_1;
                $calculation_1_digit = str_split($calculation_1);
                $calculation_1_digit_1 = $calculation_1_digit[0];
                $calculation_1_digit_2 = $calculation_1_digit[1];

                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];
                $result_digit_3 = $result_digit[2];

                return view('multiplication.case2c', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_2_input_1_digit_1', 'case_2_input_1_digit_2', 'case_2_input_2_digit_1', 'result_digit_1', 'result_digit_2', 'result_digit_3'));

            } else if(count($digit_1) === 1 && count($digit_2) === 2 && count($result_digit) === 2){
                $case_3_input_1_digit_1 = $digit_1[0];

                $case_3_input_2_digit_1 = $digit_2[0];
                $case_3_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_3_input_2_digit_2 * $case_3_input_1_digit_1;
                $calculation_1_digit = str_split($calculation_1);


                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];

                if(count($calculation_1_digit) === 1){
                    return view('multiplication.case3a', compact('input_1', 'input_2', 'result', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'case_3_input_1_digit_1', 'result_digit_1', 'result_digit_2'));

                } else if(count($calculation_1_digit) === 2){
                    $calculation_1_digit_1 = $calculation_1_digit[0];
                    $calculation_1_digit_2 = $calculation_1_digit[1];

                    return view('multiplication.case3b', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'case_3_input_1_digit_1', 'result_digit_1', 'result_digit_2'));
                }

            } else if(count($digit_1) === 1 && count($digit_2) === 2 && count($result_digit) === 3){
                $case_3_input_1_digit_1 = $digit_1[0];
                
                $case_3_input_2_digit_1 = $digit_2[0];
                $case_3_input_2_digit_2 = $digit_2[1];


                $calculation_1 = $case_3_input_2_digit_2 * $case_3_input_1_digit_1;
                $calculation_1_digit = str_split($calculation_1);
                $calculation_1_digit_1 = $calculation_1_digit[0];
                $calculation_1_digit_2 = $calculation_1_digit[1];

                $result_digit_1 = $result_digit[0];
                $result_digit_2 = $result_digit[1];
                $result_digit_3 = $result_digit[2];

                return view('multiplication.case3c', compact('calculation_1_digit_1', 'input_1', 'input_2', 'result', 'case_3_input_2_digit_1', 'case_3_input_2_digit_2', 'case_3_input_1_digit_1', 'result_digit_1', 'result_digit_2', 'result_digit_3'));

            } else if(count($digit_1) && count($digit_2) === 1){
                
                return view('multiplication.case1', compact('input_1', 'input_2', 'result'));
                
            } else if(count($digit_1) && count($digit_2) === 2){
                $case_4_input_1_digit_1 = $digit_1[0];
                $case_4_input_1_digit_2 = $digit_1[1];

                $case_4_input_2_digit_1 = $digit_2[0];
                $case_4_input_2_digit_2 = $digit_2[1];


                return view('multiplication.case4', compact('input_1', 'input_2', 'result','case_4_input_1_digit_1', 'case_4_input_1_digit_2', 'case_4_input_2_digit_1', 'case_4_input_2_digit_2'));

            }
        }

    // View Division
    public function view_division(){
        return view('division.app');
    }

        // Division App
        public function division_app(Request $request){
            $validated = $request->validate([
                'input_1' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
                'input_2' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
            ]);

            $input_1 = $request->input('input_1');
            $input_2 = $request->input('input_2');

            $digit_1 = str_split($input_1);
            $digit_2 = str_split($input_2);

            if($input_1 != 0 && $input_2 != 0){
                $result = floor($input_1 / $input_2 * 1000) / 1000;

            } else {
                return view('division.case1', compact('input_1', 'input_2'));

            }

            $result_digit = str_split($result);

            if(count($digit_1) === 2 && count($digit_2) === 1){
                $case_3_input_1_digit_1 = $digit_1[0];
                $case_3_input_1_digit_2 = $digit_1[1];

                $case_3_input_2_digit_1 = $digit_2[0];

                return view('division.case3', compact('input_1', 'input_2', 'result', 'case_3_input_1_digit_1', 'case_3_input_1_digit_2', 'case_3_input_2_digit_1'));

            } else if(count($digit_1) && count($digit_2) === 1){
                return view('division.case2a', compact('input_1', 'input_2', 'result'));
                
            } else if(count($digit_1) === 1 && count($digit_2) === 2 || count($digit_1) === 2 && count($digit_2) === 2){
                return view('division.case2b', compact('input_1', 'input_2', 'result'));
                
            }
        }

    // View Exponentiation
    public function view_exponentiation(){
        return view('exponentiation.app');
    }

        // Exponentiation App
        public function exponentiation_app(Request $request){
            $validated = $request->validate([
                'input_1' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
                'input_2' => 'required|numeric|between:0,9|regex:/^[0-9]+$/',
            ]);

            $input_1 = $request->input('input_1');
            $input_2 = $request->input('input_2');

            $digit_1 = str_split($input_1);
            $digit_2 = str_split($input_2);

            $result = $input_1 ** $input_2;
            $result_digit = str_split($result);

            if($input_2 == 0){

                return view('exponentiation.case1', compact('input_1', 'input_2', 'result'));

            } else if($input_2 != 0){
                if(count($digit_1) && count($digit_2) === 1 || 
                count($digit_1) === 2 && count($digit_2) === 1){
                    
                    return view('exponentiation.case2', compact('input_1', 'input_2', 'result'));
                }
            }

        }

    // View Square Root
    public function view_square_root(){
        return view('squareroot.app');
    }

        // Square Root App
        public function square_root_app(Request $request){
            $validated = $request->validate([
                'input' => 'required|numeric|between:0,99|regex:/^[0-9]+$/',
            ]);

            $input = $request->input('input');
            $result = sqrt($input);

            if(round($result) != $result){

                $nearestresult = floor($result);
                $nearestsquareroot = $nearestresult * $nearestresult;

                $calculation1 = $input - $nearestsquareroot;
                $calculation2 = $nearestresult * 2;
                for ($i = 0; $i <= 9; $i++) {
                    $calculation3 = ($calculation2 + ($i / 10)) * (($i / 10));
                    if ($calculation3 <= $calculation1) {
                        $calculation4 = $i;
                    }
                }
                $calculation5 = $calculation4 / 10;
                $calculation6 = ($calculation2 + $calculation5) * $calculation5;
                $calculation7 = $calculation1 - $calculation6;

                $count = 0;
                $calculations = [];
                foreach (range(1, 999) as $j) {
                    $calculation = ($calculation2 + ($j / 10)) * ($j / 10);
                    if ($calculation <= $calculation1) {
                        $calculations[] = $calculation;
                        $count++;
                    }
                }

                if($count === 1) {

                    return view('squareroot.case2a', compact('input', 'nearestresult', 'nearestsquareroot', 'calculation1', 'calculation2', 'calculation3', 'calculation4', 'calculation5', 'calculation6', 'calculation7', 'count', 'calculations', 'calculation', 'result'));

                } else if($count === 2) {

                    return view('squareroot.case2b', compact('input', 'nearestresult', 'nearestsquareroot', 'calculation1', 'calculation2', 'calculation3', 'calculation4', 'calculation5', 'calculation6', 'calculation7', 'count', 'calculations', 'calculation', 'result'));

                } else if($count > 2) {

                    return view('squareroot.case2c', compact('input', 'nearestresult', 'nearestsquareroot', 'calculation1', 'calculation2', 'calculation3', 'calculation4', 'calculation5', 'calculation6', 'calculation7', 'count', 'calculations', 'calculation', 'result'));

                }


            } else {

                return view('squareroot.case1', compact('input', 'result'));

            }
        }
    
    // View Select Quiz
    public function view_select_quiz(){
        return view('quiz.selectquiz');
    }

        // Quiz Kindergarten App
        public function quiz_kindergarten_app(){
            $questions = Question::where('QuestionLevel', 'Kindergarten')->get();

            return view('quiz.quizkindergarten', compact('questions'));
        }

        // Quiz Kindergarten Result App
        public function quiz_kindergarten_result_app(Request $request){

            $answer1 = $request->input('question1');
            $answer2 = $request->input('question2');
            $answer3 = $request->input('question3');
            $answer4 = $request->input('question4');
            $answer5 = $request->input('question5');
            $answer6 = $request->input('question6');
            $answer7 = $request->input('question7');
            $answer8 = $request->input('question8');
            $answer9 = $request->input('question9');
            $answer10 = $request->input('question10');
            
            $question1 = session('question1');
            $question2 = session('question2');
            $question3 = session('question3');
            $question4 = session('question4');
            $question5 = session('question5');
            $question6 = session('question6');
            $question7 = session('question7');
            $question8 = session('question8');
            $question9 = session('question9');
            $question10 = session('question10');

            $questioned1 = \App\Question::where('Question', $question1)->first();
            $questioned2 = \App\Question::where('Question', $question2)->first();
            $questioned3 = \App\Question::where('Question', $question3)->first();
            $questioned4 = \App\Question::where('Question', $question4)->first();
            $questioned5 = \App\Question::where('Question', $question5)->first();
            $questioned6 = \App\Question::where('Question', $question6)->first();
            $questioned7 = \App\Question::where('Question', $question7)->first();
            $questioned8 = \App\Question::where('Question', $question8)->first();
            $questioned9 = \App\Question::where('Question', $question9)->first();
            $questioned10 = \App\Question::where('Question', $question10)->first();

            return view('quiz.quizkindergartenresult', compact('question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10', 'questioned1', 'questioned2', 'questioned3', 'questioned4', 'questioned5', 'questioned6', 'questioned7', 'questioned8', 'questioned9', 'questioned10', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6', 'answer7', 'answer8', 'answer9', 'answer10'));
        }

        // Quiz 1st & 2nd Grade App
        public function quiz_1st_2nd_grade_app(){
            $questions = Question::where('QuestionLevel', '1&2Grade')->get();

            return view('quiz.quiz1st&2ndgrade', compact('questions'));
        }

        // Quiz 1st & 2nd Grade Result App
        public function quiz_1st_2nd_grade_result_app(Request $request){

            $answer1 = $request->input('question1');
            $answer2 = $request->input('question2');
            $answer3 = $request->input('question3');
            $answer4 = $request->input('question4');
            $answer5 = $request->input('question5');
            $answer6 = $request->input('question6');
            $answer7 = $request->input('question7');
            $answer8 = $request->input('question8');
            $answer9 = $request->input('question9');
            $answer10 = $request->input('question10');
            
            $question1 = session('question1');
            $question2 = session('question2');
            $question3 = session('question3');
            $question4 = session('question4');
            $question5 = session('question5');
            $question6 = session('question6');
            $question7 = session('question7');
            $question8 = session('question8');
            $question9 = session('question9');
            $question10 = session('question10');

            $questioned1 = \App\Question::where('Question', $question1)->first();
            $questioned2 = \App\Question::where('Question', $question2)->first();
            $questioned3 = \App\Question::where('Question', $question3)->first();
            $questioned4 = \App\Question::where('Question', $question4)->first();
            $questioned5 = \App\Question::where('Question', $question5)->first();
            $questioned6 = \App\Question::where('Question', $question6)->first();
            $questioned7 = \App\Question::where('Question', $question7)->first();
            $questioned8 = \App\Question::where('Question', $question8)->first();
            $questioned9 = \App\Question::where('Question', $question9)->first();
            $questioned10 = \App\Question::where('Question', $question10)->first();

            return view('quiz.quiz1st&2ndgraderesult', compact('question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10', 'questioned1', 'questioned2', 'questioned3', 'questioned4', 'questioned5', 'questioned6', 'questioned7', 'questioned8', 'questioned9', 'questioned10', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6', 'answer7', 'answer8', 'answer9', 'answer10'));
        }

        // Quiz 3rd & 4th Grade App
        public function quiz_3rd_4th_grade_app(){
            $questions = Question::where('QuestionLevel', '3&4Grade')->get();

            return view('quiz.quiz3rd&4thgrade', compact('questions'));
        }

        // Quiz 3rd & 4th Grade Result App
        public function quiz_3rd_4th_grade_result_app(Request $request){

            $answer1 = $request->input('question1');
            $answer2 = $request->input('question2');
            $answer3 = $request->input('question3');
            $answer4 = $request->input('question4');
            $answer5 = $request->input('question5');
            $answer6 = $request->input('question6');
            $answer7 = $request->input('question7');
            $answer8 = $request->input('question8');
            $answer9 = $request->input('question9');
            $answer10 = $request->input('question10');
            
            $question1 = session('question1');
            $question2 = session('question2');
            $question3 = session('question3');
            $question4 = session('question4');
            $question5 = session('question5');
            $question6 = session('question6');
            $question7 = session('question7');
            $question8 = session('question8');
            $question9 = session('question9');
            $question10 = session('question10');

            $questioned1 = \App\Question::where('Question', $question1)->first();
            $questioned2 = \App\Question::where('Question', $question2)->first();
            $questioned3 = \App\Question::where('Question', $question3)->first();
            $questioned4 = \App\Question::where('Question', $question4)->first();
            $questioned5 = \App\Question::where('Question', $question5)->first();
            $questioned6 = \App\Question::where('Question', $question6)->first();
            $questioned7 = \App\Question::where('Question', $question7)->first();
            $questioned8 = \App\Question::where('Question', $question8)->first();
            $questioned9 = \App\Question::where('Question', $question9)->first();
            $questioned10 = \App\Question::where('Question', $question10)->first();

            return view('quiz.quiz3rd&4thgraderesult', compact('question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10', 'questioned1', 'questioned2', 'questioned3', 'questioned4', 'questioned5', 'questioned6', 'questioned7', 'questioned8', 'questioned9', 'questioned10', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6', 'answer7', 'answer8', 'answer9', 'answer10'));
        }

        // Quiz 5th & 6th Grade App
        public function quiz_5th_6th_grade_app(){
            $questions = Question::where('QuestionLevel', '5&6Grade')->get();

            return view('quiz.quiz5th&6thgrade', compact('questions'));
        }

        // Quiz 5th & 6th Grade Result App
        public function quiz_5th_6th_grade_result_app(Request $request){

            $answer1 = $request->input('question1');
            $answer2 = $request->input('question2');
            $answer3 = $request->input('question3');
            $answer4 = $request->input('question4');
            $answer5 = $request->input('question5');
            $answer6 = $request->input('question6');
            $answer7 = $request->input('question7');
            $answer8 = $request->input('question8');
            $answer9 = $request->input('question9');
            $answer10 = $request->input('question10');
            
            $question1 = session('question1');
            $question2 = session('question2');
            $question3 = session('question3');
            $question4 = session('question4');
            $question5 = session('question5');
            $question6 = session('question6');
            $question7 = session('question7');
            $question8 = session('question8');
            $question9 = session('question9');
            $question10 = session('question10');

            $questioned1 = \App\Question::where('Question', $question1)->first();
            $questioned2 = \App\Question::where('Question', $question2)->first();
            $questioned3 = \App\Question::where('Question', $question3)->first();
            $questioned4 = \App\Question::where('Question', $question4)->first();
            $questioned5 = \App\Question::where('Question', $question5)->first();
            $questioned6 = \App\Question::where('Question', $question6)->first();
            $questioned7 = \App\Question::where('Question', $question7)->first();
            $questioned8 = \App\Question::where('Question', $question8)->first();
            $questioned9 = \App\Question::where('Question', $question9)->first();
            $questioned10 = \App\Question::where('Question', $question10)->first();

            return view('quiz.quiz5th&6thgraderesult', compact('question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10', 'questioned1', 'questioned2', 'questioned3', 'questioned4', 'questioned5', 'questioned6', 'questioned7', 'questioned8', 'questioned9', 'questioned10', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6', 'answer7', 'answer8', 'answer9', 'answer10'));
        }

    // View About
    public function view_about(){
        return view('footer.about');
    }

    // View Contact
    public function view_contact(){
        return view('footer.contact');
    }

    // View Privacy
    public function view_privacy(){
        return view('footer.privacy');
    }

    // View Terms
    public function view_terms(){
        return view('footer.terms');
    }
}