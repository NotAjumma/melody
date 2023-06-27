<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
     public function index()
    {
        $data['title'] = 'Homepage'; 
        return  view('components/navbar',$data) .
                view('pages/index') .
                view('components/footer.php');
    }
    public function login()
    {
        $session = session();

        // Check if the user is logged in
        if (session()->has('username')) {
            // User is logged in, redirect to promotion page
            return redirect()->to('profile');
        } else {
            // User is not logged in, redirect to login page
            $data['title'] = 'Login'; 
            return  view('components/navbar',$data) .
                    view('pages/login') ;
        }
        
    }
    
      public function profile()
    {
        $session = session();

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Profile'; 
            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/user/profile') .
                    view('components/footer.php');
        }
        
    }

    public function loginProcess()
    {
        $usersModel = new UsersModel();
        $userSubscriptionModel = new UserSubscriptionModel();
        $subscriptionModel = new SubscriptionModel();
        
        // Retrieve the input values from the form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $messageRedirect = $this->request->getPost('messageRedirect');
        
        // Validate the user's credentials
        $user = $usersModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Valid credentials, proceed with login logic
            // For example, set session data or redirect to a protected area
            // You can customize this part based on your application's requirements

            // Example: Set session data and redirect based on the role ID
            session()->set('username', $user['username'] );
            session()->set('email', $user['email'] );
            session()->set('dob', $user['date_of_birth'] );
            session()->set('role_id', $user['role_id'] );

            // Find the user subscription based on the username
            $userSubscription = $userSubscriptionModel->where('username', $username)->first();
            if ($userSubscription) {
                $sub_id = $userSubscription['sub_id'];
                session()->set('plan', $sub_id);
            
                // Find the subscription based on the sub_id
                $subscription = $subscriptionModel->find($sub_id);

                if ($subscription) {
                    $sub_name = $subscription['sub_name'];
                    session()->set('plan_name', $sub_name);
                    // echo $sub_name;

                    // // Get the subscription features
                    // $subscriptionFeatures = $subscriptionModel->select('feature_id')
                    //     ->where('id', $sub_id)
                    //     ->findAll();

                    // // Extract the feature IDs
                    // $featureIds = array_column($subscriptionFeatures, 'feature_id');
                    // session()->set('list_feature', $featureIds);
                }
            }

            if ($user['role_id'] == 1) {
                // $data['title'] = 'Admin Dashboard'; 
                return redirect()->to(base_url($messageRedirect));

                // return  view('components/navbar',$data) .
                //         view('pages/admin/dashboard') .
                //         view('components/footer.php');
            } else if ($user['role_id'] == 2) {
                return redirect()->to(base_url($messageRedirect));
                // $data['title'] = 'User Dashboard'; 
                // return  view('components/navbar',$data) .
                //         view('pages/user/profile') .
                //         view('components/footer.php');
            } else {
                return  view('components/navbar',$data) .
                        view('pages/login') .
                        view('components/footer');
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
        $data['title'] = 'Signup'; 
        return  view('components/navbar',$data) .
                view('pages/signup') ;
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

    public function checkLoginStatus($page)
    {
        // Load the session library
        $session = session();

        // Check if the user is logged in
        if (session()->has('username')) {
            // User is logged in, redirect to the specified page
            if ($page == 'checkout') {
               return redirect()->to(site_url('plan/checkout/promote'));
            } elseif ($page == 'promotion') {
                return redirect()->to('promotion');
            } else {
                // Invalid page parameter, redirect to default page
                return redirect()->to('default');
            }
        } else {
             if ($page == 'checkout') {
               return redirect()->to('login?message=plan/checkout/promote');
            } elseif ($page == 'promotion') {
                return redirect()->to('promotion');
            } else {
                // Invalid page parameter, redirect to default page
                return redirect()->to('default');
            }
            // User is not logged in, redirect to login page
            
        }
    }


}
