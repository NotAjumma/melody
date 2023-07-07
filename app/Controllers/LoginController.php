<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use App\Models\CardModel;
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
            session()->set('nickname', $user['nickname'] );
            session()->set('email', $user['email'] );
            session()->set('dob', $user['date_of_birth'] );
            session()->set('role_id', $user['role_id'] );
            session()->set('gender', $user['gender'] );
            session()->set('password', $user['password'] );

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
                if ($messageRedirect == "profile"){
                    $messageRedirect = "admin/dashboard";
                }
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
        $username = $this->request->getPost('username');
        $nickname = $this->request->getPost('nickname');
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
            'nickname' => $nickname,
            'password' => $hashedPassword,
            'date_of_birth' => $dob,
            'gender' => $gender,
            "role_id" => 2,
            'profile_pic' => "none"
        ];

        // print_r($data);
        
        // Insert the user data into the database
        $usersModel->addUser($data);

        // Set success flashdata and redirect to login page
        // session()->setFlashdata('success', 'Signup successful. Please login.');
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
            if ($page == 'checkout1m') {
               return redirect()->to(site_url('plan/checkout/1m'));
            } elseif ($page == 'checkout3m') {
               return redirect()->to(site_url('plan/checkout/3m'));
            } elseif ($page == 'checkout6m') {
               return redirect()->to(site_url('plan/checkout/6m'));
            } elseif ($page == 'promotion') {
                return redirect()->to('promotion');
            } elseif ($page == 'checkoutAlbums') {
                return redirect()->to('checkout-albums-list');
            }else {
                // Invalid page parameter, redirect to default page
                // return redirect()->to('default');
            }
        } else {
             if ($page == 'checkout1m') {
               return redirect()->to('login?message=plan/checkout/1m');
            } else if ($page == 'checkout3m') {
               return redirect()->to('login?message=plan/checkout/3m');
            }else if ($page == 'checkout6m') {
               return redirect()->to('login?message=plan/checkout/6m');
            } elseif ($page == 'promotion') {
                return redirect()->to('promotion');
            }elseif ($page == 'checkoutAlbums') {
                return redirect()->to('login?message=checkout-albums-list');
            }else {
                // Invalid page parameter, redirect to default page
                return redirect()->to('default');
            }
            // User is not logged in, redirect to login page
            
        }
    }



    public function albumCheckout()
    {
        // $cartItems = json_decode($this->input->getPost('cartItems'), true);
        // $cartItems = json_decode($this->request->getPost('cartItems'));
        
        $session = session();
        $username = $session->get('username'); 
        $usersModel = new UsersModel();
        $cardModel = new CardModel();
        $userSubscriptionModel = new UserSubscriptionModel();
        $subscriptionModel = new SubscriptionModel();
        $dataUser = $usersModel->getUserByUsername($username);
        $data['email'] = $dataUser['email'];
        

        $dataUserSub = $userSubscriptionModel->getUserSubUsingUsername($username);
            
            if (!empty($dataUserSub)) {
                $sub_id = $dataUserSub[0]['sub_id'];
                $data['sub_id'] = $dataUserSub[0]['sub_id'];

                $dataSub = $subscriptionModel->getSubUsingSubId($sub_id);

                if (!empty($dataSub)) {
                    $data['sub_name'] = $dataSub[0]['sub_name'];
                } else {
                    $data['sub_name'] = ''; // Set a default value if sub_name is not found
                }
            } else {
                $data['sub_id'] = ''; // Set a default value if sub_id is not found
                $data['sub_name'] = ''; // Set a default value if sub_name is not found
            }
        $dataCard = $cardModel->getCardByUsername($username);
        if (!empty($dataCard)) {
            foreach ($dataCard as $card) {
                // Process each card record
                $card['lastFourDigit'] = $card['card_number'];
                $card['name'] = $card['name'];
                $data['cards'][] = $card;
            }
            $data['name'] = $dataCard[0]['card_number'];
        } else {
            $data['cards'] = []; // Set an empty array if no cards found
        }

        // print_r($data['cards']);

        $data['title'] = 'Checkout Albums'; 
        return  view('components/navbar',$data) .
                view('pages/checkout-albums') ;
    }


}
