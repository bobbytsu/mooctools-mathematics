<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OperationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    // Kindergarten Addition
    public function test_valid_addition_kindergarten_input()
    {
        // Arrange
        $response = $this->post('/kindergarten/addition', [
            'input_1' => 2,
            'input_2' => 3,
        ]);

        // Act and Assert
        $response->assertStatus(200); //  200 is (OK)
        $response->assertViewIs('addition.case1_kindergarten'); // display view
        $response->assertViewHasAll(['input_1', 'input_2', 'result']); // passing value to view
        $this->assertEquals(2, $response->original->getData()['input_1']);
        $this->assertEquals(3, $response->original->getData()['input_2']);
        $this->assertEquals(5, $response->original->getData()['result']);
    }

    public function test_invalid_addition_kindergarten_input()
    {
        // Arrange
        $response = $this->post('/kindergarten/addition', [
            'input_1' => 10, // Invalid, should be between 0 and 9
            'input_2' => 'abc', // Invalid, not numeric
        ]);

        // Act and Assert
        $response->assertStatus(302); // 302 (redirect)
        $response->assertSessionHasErrors(['input_1', 'input_2']); // display validation errors 
    }

    // Kindergarten Subtraction
    public function test_valid_subtraction_kindergarten_input()
    {
        // Arrange
        $response = $this->post('/kindergarten/subtraction', [
            'input_1' => 5,
            'input_2' => 3,
        ]);

        // Act and Assert
        $response->assertStatus(200); // 200 is (OK)
        $response->assertViewIs('subtraction.case1a_kindergarten'); // display view
        $response->assertViewHasAll(['input_1', 'input_2', 'result']); // passing value to view
        $this->assertEquals(5, $response->original->getData()['input_1']);
        $this->assertEquals(3, $response->original->getData()['input_2']);
        $this->assertEquals(2, $response->original->getData()['result']);
    }

    public function test_invalid_subtraction_kindergarten_input()
    {
        // Arrange
        $response = $this->post('/kindergarten/subtraction', [
            'input_1' => 10, // Invalid, should be between 0 and 9
            'input_2' => 'abc', // Invalid, not numeric
        ]);

        // Act and Assert
        $response->assertStatus(302); //  302 (redirect)
        $response->assertSessionHasErrors(['input_1', 'input_2']); // display validation errors 
    }

    public function test_valid_addition_input()
    {
        $response = $this->post('/elementary/addition', [
            'input_1' => 5,
            'input_2' => 3,
        ]);

        $response->assertStatus(200); 
        $response->assertViewIs('addition.case1'); 
        $response->assertViewHasAll(['input_1', 'input_2', 'result']); 
        $this->assertEquals(5, $response->original->getData()['input_1']);
        $this->assertEquals(3, $response->original->getData()['input_2']);
        $this->assertEquals(8, $response->original->getData()['result']);
    }

    public function test_invalid_addition_input()
    {
        $response = $this->post('/elementary/addition', [
            'input_1' => 105, 
            'input_2' => 'abc', 
        ]);

        $response->assertStatus(302); 
        $response->assertSessionHasErrors(['input_1', 'input_2']); 
    }

    public function test_valid_subtraction_input()
    {
        // Arrange
        $response = $this->post('/elementary/subtraction', [
            'input_1' => 4,
            'input_2' => 3,
        ]);

        // Act and Assert
        $response->assertStatus(200); // 200 is (OK)
        $response->assertViewIs('subtraction.case1a'); // display view
        $response->assertViewHasAll(['input_1', 'input_2', 'result']); // passing value to view
        $this->assertEquals(4, $response->original->getData()['input_1']);
        $this->assertEquals(3, $response->original->getData()['input_2']);
        $this->assertEquals(1, $response->original->getData()['result']);
    }

    public function test_invalid_subtraction_input()
    {
        // Arrange
        $response = $this->post('/elementary/subtraction', [
            'input_1' => 105, // Invalid, should be between 0 and 99
            'input_2' => 'abc', // Invalid, not numeric
        ]);

        // Act and Assert
        $response->assertStatus(302); // 302 (redirect)
        $response->assertSessionHasErrors(['input_1', 'input_2']); // display validation errors
    }

    public function test_valid_multiplication_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/multiplication', [
            'input_1' => 3,
            'input_2' => 9,
        ]);

        // Assert
        $response->assertStatus(200); //  200 is (OK)
        $response->assertViewIs('multiplication.case1'); // display view 
        $this->assertEquals(3, $response->viewData('input_1'));
        $this->assertEquals(9, $response->viewData('input_2'));
        $this->assertEquals(27, $response->viewData('result'));
    }

    public function test_invalid_multiplication_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/multiplication', [
            'input_1' => 105,
            'input_2' => 'abc',
        ]);

        // Assert
        $response->assertStatus(302); //  302 (redirect)
        $response->assertSessionHasErrors(['input_1', 'input_2']); // display validation errors 
    }

    public function test_valid_division_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/division', [
            'input_1' => 9,
            'input_2' => 3,
        ]);

        // Assert
        $response->assertStatus(200); //  200 is (OK)
        $response->assertViewIs('division.case2a'); // display view 
        $this->assertEquals(9, $response->viewData('input_1'));
        $this->assertEquals(3, $response->viewData('input_2'));
        $this->assertEquals(3, $response->viewData('result'));
    }

    public function test_invalid_division_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/division', [
            'input_1' => 105,
            'input_2' => 'abc',
        ]);

        // Assert
        $response->assertStatus(302); //  302 (redirect)
        $response->assertSessionHasErrors(['input_1', 'input_2']); // display validation errors 
    }

    public function test_valid_exponentiation_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/exponentiation', [
            'input_1' => 5,
            'input_2' => 2,
        ]);

        // Assert
        $response->assertStatus(200); //  200 is (OK)
        $response->assertViewIs('exponentiation.case2'); // display view 
        $this->assertEquals(5, $response->viewData('input_1'));
        $this->assertEquals(2, $response->viewData('input_2'));
        $this->assertEquals(25, $response->viewData('result'));
    }

    public function test_invalid_exponentiation_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/exponentiation', [
            'input_1' => 105,
            'input_2' => 'abc',
        ]);

        // Assert
        $response->assertStatus(302); //  302 (redirect)
        $response->assertSessionHasErrors(['input_1', 'input_2']); // display validation errors 
    }

    public function test_valid_square_root_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/square-root', [
            'input' => 25,
        ]);

        // Assert
        $response->assertStatus(200); //  200 is (OK)
        $response->assertViewIs('squareroot.case1'); // display view 
        $this->assertEquals(25, $response->viewData('input'));
        $this->assertEquals(5, $response->viewData('result'));
    }

    public function test_invalid_square_root_input()
    {
        // Arrange and Act
        $response = $this->post('/elementary/square-root', [
            'input' => 105,
        ]);

        // Assert
        $response->assertStatus(302); //  302 (redirect)
        $response->assertSessionHasErrors(['input']); // display validation errors 
    }
}
