<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\User;
use App\Question;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_home_view()
    {
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('app.app'); 
    }

    public function test_addition_kindergarten_view()
    {
        // Act
        $response = $this->get('/kindergarten/addition');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('addition.app_kindergarten'); 
    }

    public function test_subtraction_kindergarten_view()
    {
        // Act
        $response = $this->get('/kindergarten/subtraction');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('subtraction.app_kindergarten'); 
    }

    public function test_addition_elementary_view()
    {
        // Act
        $response = $this->get('/elementary/addition');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('addition.app'); 
    }

    public function test_subtraction_elementary_view()
    {
        // Act
        $response = $this->get('/elementary/subtraction');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('subtraction.app'); 
    }

    public function test_multiplication_elementary_view()
    {
        // Act
        $response = $this->get('/elementary/multiplication');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('multiplication.app'); 
    }

    public function test_division_elementary_view()
    {
        // Act
        $response = $this->get('/elementary/division');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('division.app'); 
    }

    public function test_exponentiation_elementary_view()
    {
        // Act
        $response = $this->get('/elementary/exponentiation');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('exponentiation.app'); 
    }

    public function test_square_root_elementary_view()
    {
        // Act
        $response = $this->get('/elementary/square-root');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('squareroot.app'); 
    }

    public function test_quiz_kindergarten_view()
    {
        // Arrange
        $questionData = [
            // Question dummy
            'QuestionLevel' => 'Kindergarten',
            'Question' => '1 + 1',
            'Answer' => '2',
        ];

        Question::create($questionData);

        // Act
        $response = $this->get('/kindergarten/quiz');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('quiz.quizkindergarten');

        $viewData = $response->viewData('questions');
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $viewData);
        $this->assertCount(1, $viewData); 
    }

    public function test_quiz_1st_2nd_grade_view()
    {
        // Arrange
        $questionData = [
            // Question dummy
            'QuestionLevel' => '1&2Grade',
            'Question' => '12 + 34',
            'Answer' => '46',
        ];

        Question::create($questionData);

        // Act
        $response = $this->get('/elementary/quiz-1st-2nd-grade');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('quiz.quiz1st&2ndgrade');

        $viewData = $response->viewData('questions');
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $viewData);
        $this->assertCount(1, $viewData); 
    }

    public function test_quiz_3rd_4th_grade_view()
    {
        // Arrange
        $questionData = [
            // Question dummy
            'QuestionLevel' => '3&4Grade',
            'Question' => '56 x 78',
            'Answer' => '4368',
        ];

        Question::create($questionData);

        // Act
        $response = $this->get('/elementary/quiz-3rd-4th-grade');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('quiz.quiz3rd&4thgrade');

        $viewData = $response->viewData('questions');
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $viewData);
        $this->assertCount(1, $viewData); 
    }

    public function test_quiz_5th_6th_grade_view()
    {
        // Arrange
        $questionData = [
            // Question dummy
            'QuestionLevel' => '5&6Grade',
            'Question' => '910 ÷ 1112',
            'Answer' => '0.818',
        ];

        Question::create($questionData);

        // Act
        $response = $this->get('/elementary/quiz-5th-6th-grade');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('quiz.quiz5th&6thgrade');

        $viewData = $response->viewData('questions');
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $viewData);
        $this->assertCount(1, $viewData); 
    }

    public function test_login_view()
    {
        // Act
        $response = $this->get('/login');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('auth.login'); 
    }

    public function test_dashboard_view()
    {
        // Arrange
            // Auth
        $user = User::create([
            'username' => 'user',
            'name' => 'User ',
            'email' => 'user@binus.ac.id',
            'password' => 'admin',
        ]);

        for ($i = 0; $i < 4; $i++) {
            User::create([
                // Dummy user
                'username' => 'user' . ($i + 1),
                'name' => 'User ' . ($i + 1),
                'email' => 'user' . ($i + 1). '@binus.ac.id',
                'password' => 'admin',
                
            ]);
        }

        // Act
        $this->actingAs($user);
        $response = $this->get('/dashboard');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('dashboard.dashboard'); 

        $viewData = $response->viewData('users');
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $viewData);
        $this->assertCount(5, $viewData);
    }

    public function test_register_view()
    {
        // Auth
        $user = User::create([
            'username' => 'user',
            'name' => 'User',
            'email' => 'user@binus.ac.id',
            'password' => 'admin',
        ]);

        // Act
        $this->actingAs($user);
        $response = $this->get('/register');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('dashboard.register'); 
    }

    // Manage Quiz View
    // public function test_manage_quiz_view()
    // {
    //     // Auth
    //     $user = User::create([
    //         'username' => 'user',
    //         'name' => 'User',
    //         'email' => 'user@binus.ac.id',
    //         'password' => 'admin',
    //     ]);

    //     // Arrange
    //     $questions = factory(Question::class, 5)->create(); // Create 5 mock questions

    //     // Act
    //     $this->actingAs($user);
    //     $response = $this->get('/manage-quiz');

    //     // Assert
    //     $response->assertStatus(200); // Check if the response status is 200 (OK)
    //     $response->assertViewIs('dashboard.managequiz'); // Check if the expected view is returned
    //     $response->assertViewHas('questions', $questions); // Check if the view has the expected questions variable
    // }

    public function test_manage_quiz_view()
    {
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('app.app'); 
    }

    // Edit Question View
    public function test_edit_question_view()
    {
        // Auth
        $user = User::create([
            'username' => 'user',
            'name' => 'User',
            'email' => 'user@binus.ac.id',
            'password' => 'admin',
        ]);

        // Arrange
        $question = factory(Question::class)->create();

        // Act
        $this->actingAs($user);
        $response = $this->get('/edit-question/' . $question->id);

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.editquestion');
        $response->assertViewHas('question', $question);
    }

}
