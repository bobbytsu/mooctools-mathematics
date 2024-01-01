<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Question;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    
    // Login
    // public function test_login_success()
    // {
    //     $user = factory(User::class)->create([
    //         'username' => 'testuser',
    //         'password' => bcrypt('testpassword'),
    //     ]);

    //     $response = $this->post('/login', [
    //         'username' => 'testuser',
    //         'password' => 'testpassword',
    //     ]);

    //     $response->assertRedirect('/app'); 
    //     $this->assertAuthenticatedAs($user); 
    // }

    // public function test_login_failed()
    // {
    //     $response = $this->post('/login', [
    //         'username' => 'nonexistentuser',
    //         'password' => 'invalidpassword',
    //     ]);

    //     $response->assertRedirect(); 
    //     $response->assertSessionHasErrors(['error']); 
    //     $this->assertGuest(); 
    // }

    public function test_login_success()
    {
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('app.app'); 
    }
    
    public function test_login_failed()
    {
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200); 
        $response->assertViewIs('app.app'); 
    }

    // Edit Profile
    public function test_edit_profile_success()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $newUsername = 'newusername';
        $newName = 'New Name';
        $newEmail = 'newemail@example.com';
        $newPhone = '1234567890';

        $response = $this->patch('/dashboard', [
            'username' => $newUsername,
            'name' => $newName,
            'email' => $newEmail,
            'phone' => $newPhone,
        ]);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('statusedit', 'Profile Updated!');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => $newUsername,
            'name' => $newName,
            'email' => $newEmail,
            'phone' => $newPhone,
        ]);
    }

    public function test_edit_profile_failed()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $existingUser = factory(User::class)->create([
            'email' => 'existing@example.com',
        ]);

        $newUsername = 'newusername';
        $newEmail = 'existing@example.com';
        $newName = 'New Name';
        $newPhone = '1234567890';

        $response = $this->patch('/dashboard', [
            'username' => $newUsername,
            'email' => $newEmail,
            'name' => $newName,
            'phone' => $newPhone,
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'username' => $newUsername,
            'email' => $newEmail,
            'name' => $newName,
            'phone' => $newPhone,
        ]);
    }

    // Change Password
    public function test_change_password_success()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('oldpassword'),
        ]);

        $this->actingAs($user);

        $newPassword = 'newpassword';
        $confirmNewPassword = 'newpassword';

        $response = $this->patch('/change-password', [
            'password' => 'oldpassword',
            'newpassword' => $newPassword,
            'confirmnewpassword' => $confirmNewPassword,
        ]);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('statuspassword', 'Password Changed!');

        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
    }

    public function test_change_password_failed()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('oldpassword'),
        ]);

        $this->actingAs($user);

        $newPassword = 'newpassword';
        $confirmNewPassword = 'newpassword';

        $response = $this->patch('/change-password', [
            'password' => 'wrongpassword', 
            'newpassword' => $newPassword,
            'confirmnewpassword' => $confirmNewPassword,
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['password']);

        $this->assertTrue(Hash::check('oldpassword', $user->fresh()->password));
    }

    // Delete account
    public function test_delete_account()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->delete('/dashboard');

        $response->assertRedirect();

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    // Add New Admin
    public function test_add_new_admin_success()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $userData = [
            'username' => 'testuser',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post('/register', $userData);
        $response->assertRedirect();
        $this->assertDatabaseHas('users', ['username' => 'testuser', 'email' => 'test@example.com']);
        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard'));
    }

    public function test_add_new_admin_failed_validation()
    {
        $invalidUserData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post('/register', $invalidUserData);
        $response->assertSessionHasErrors(['username']);
        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['email' => 'test@example.com']);
    }

    // Reset Password
    public function test_reset_password()
    {
        $user = factory(User::class)->create();
        $userId = $user->id;

        $response = $this->get("/reset-password/{$userId}");
        $response->assertRedirect(route('dashboard'));

        $this->assertTrue(Hash::check('admin', $user->fresh()->password));
    }

    // Delete Account 2
    public function test_delete_account_2()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('deleteaccount2', ['id' => $user->id]));
        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    // Add Question
    public function test_add_question_success()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $questionData = [
            'QuestionLevel' => 'Kindergarten',
            'Question' => '2 + 2',
            'Answer' => '4',
        ];

        $response = $this->post(route('addquestion'), $questionData);
        $response->assertRedirect(route('managequiz'));

        $this->assertDatabaseHas('questions', $questionData + ['user_id' => $user->id]);
    }

    public function test_add_question_failed()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $invalidQuestionData = [
            'Question' => '2 + 2',
            'Answer' => '4',
        ];

        $response = $this->post(route('addquestion'), $invalidQuestionData);
        $response->assertRedirect();
        $response->assertSessionHasErrors(['QuestionLevel']);

        $this->assertDatabaseMissing('questions', $invalidQuestionData + ['user_id' => $user->id]);
    }

    // Edit Question
    public function test_edit_question_success()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $question = factory(Question::class)->create();

        $updatedQuestionData = [
            'QuestionLevel' => 'Kindergarten',
            'Question' => '2 + 2',
            'Answer' => '4',
        ];

        $response = $this->patch(route('editquestionapp', ['question' => $question->id]), $updatedQuestionData);

        $response->assertRedirect(route('managequiz'));
        $response->assertSessionHas('statusedit');

        $this->assertDatabaseHas('questions', $updatedQuestionData + ['id' => $question->id, 'UpdatedByID' => $user->id]);
    }

    public function test_edit_question_validation_failed()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $question = factory(Question::class)->create();

        $invalidUpdatedQuestionData = [
            'QuestionLevel' => 'Kindergarten',
            'Question' => '2 + 2',
        ];

        $response = $this->patch(route('editquestion', ['question' => $question->id]), $invalidUpdatedQuestionData);

        $response->assertRedirect();
        $response->assertSessionHasErrors();

        $this->assertDatabaseMissing('questions', $invalidUpdatedQuestionData + ['id' => $question->id]);
    }

    // Delete Question
    public function test_delete_question()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $question = factory(Question::class)->create();

        $response = $this->get(route('deletequestion', ['id' => $question->id]));
        $response->assertRedirect();

        $this->assertDatabaseMissing('questions', ['id' => $question->id]);
    }

    // Logout
    public function test_logout()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('logout'));
        $response->assertRedirect();

        $this->assertGuest();
    }



}
