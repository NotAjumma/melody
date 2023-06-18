<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
     public function index()
    {
        return view('pages/index');
    }
    public function login()
    {
        return view('pages/login');
    }

    public function loginProcess()
{
    $usersModel = new UsersModel();

    // Retrieve the input values from the form
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Validate the user's credentials
    $user = $usersModel->where('username', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
        // Valid credentials, proceed with login logic
        // For example, set session data or redirect to a protected area
        // You can customize this part based on your application's requirements

        // Example: Set session data and redirect based on the role ID
        session()->set('username', $user['username'] );
        session()->set('role_id', $user['role_id'] );
        if ($user['role_id'] == 1) {
            return redirect()->to('admin/dashboard');
        } else {
            return redirect()->to('user/profile');
        }
    } else {
        // Invalid credentials, display an error message
        // You can customize this part based on your application's requirements

        // Example: Set flashdata and redirect back to login page
        session()->setFlashdata('error', 'Invalid username or password');
        return redirect()->back();
    }
}



    public function signup()
    {
        return view('pages/signup');
    }

    public function signupProcess()
    {
        $usersModel = new UsersModel();

        // Retrieve the input values from the form
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('text');
        $password = $this->request->getPost('password');
        $dob = $this->request->getPost('date_of_birth');
        $gender = $this->request->getPost('gender');

        // Check if the username already exists
        if ($usersModel->where('username', $username)->first()) {
            session()->setFlashdata('error', 'Username already exists');
            return redirect()->back();
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the data for insertion
        $data = [
            'email' => $email,
            'username' => $username,
            'password' => $hashedPassword,
            'date_of_birth' => $dob,
            'gender' => $gender
        ];

        // Insert the user data into the database
        $usersModel->insert($data);

        // Set success flashdata and redirect to login page
        session()->setFlashdata('success', 'Signup successful. Please login.');
        return redirect()->to('login');
    }


    public function logout()
    {
        // Load the session library
        $session = session();

        // Destroy the session
        $session->destroy();

        // Redirect the user to the login page or any other desired page
        return redirect()->to('/');
    }

}
