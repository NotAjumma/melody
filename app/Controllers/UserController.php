<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use App\Models\CardModel;
use CodeIgniter\Controller;

class UserController extends Controller
{

     public function profile()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $userSubscriptionModel = new UserSubscriptionModel();
        $subscriptionModel = new SubscriptionModel();

        // Retrieve the user data by username

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
             

            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Profile'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $dob = $dataUser['date_of_birth'];

            
            $dataUserSub = $userSubscriptionModel->getUserSubUsingUsername($username);
            $sub_id = $dataUserSub[0]['sub_id'];
            $data['sub_id'] = $dataUserSub[0]['sub_id'];

            $dataSub = $subscriptionModel->getSubUsingSubId($sub_id);
            $data['sub_name'] = $dataSub[0]['sub_name'];

            $data['plan_name'] = $session->get('plan_name'); 
            $data['plan_id'] = $session->get('plan'); 
            $data['list_plan'] = $session->get('list_feature');
            $data['formattedDate'] = date('F j, Y', strtotime($dob));   

            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/user/profile',$data) .
                    view('components/footer.php');
        }
        
    }


    public function editProfile()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Edit Profile'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $data['dob'] = $dataUser['date_of_birth'];
            $data['gender'] = $dataUser['gender'];

            // $dataUserSub = $userSubscriptionModel->getUserSubUsingUsername($username);
            // $sub_id = $dataUserSub[0]['sub_id'];

            // $dataSub = $subscriptionModel->getSubUsingSubId($sub_id);
            // $data['sub_name'] = $dataSub[0]['sub_name'];
            

            // $data['formattedDate'] = date('F j, Y', strtotime($dob));  
            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/user/edit_profile',$data) .
                    view('components/footer.php');
        }
        
    }

    public function editProfileProcess2()
    {
        $usersModel = new UsersModel();
        $this->load->library('session'); // Load the session library
            // Check if a file was uploaded
        if ($_FILES['profile_pic']['error'] !== UPLOAD_ERR_NO_FILE) {
            $session = session();
            $username = $session->get('username');

            // Set the upload path and file name
            $uploadPath = './public/uploads/profile_pics/';
            $fileName = $username . '_' . $_FILES['profile_pic']['name'];
            
            // Set the configuration for file upload
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB max size
            $config['file_name'] = $fileName;

            // Load the upload library and initialize it with the config
            $this->load->library('upload', $config);

            // Perform the upload
            if ($this->upload->do_upload('profile_pic')) {

                $session = session();
                $username = $session->get('username'); 

                // File uploaded successfully
                // Update the profile_pic column in the users table
                $profile_pic = $fileName;
                $usersModel->where('username', $username)->update(['profile_pic' => $profile_pic]);
                
                // Redirect or display a success message
                return redirect()->to('profile');
            } else {
                // Error in file upload
                $error = $this->upload->display_errors();
                // Handle the error as per your application's needs
                echo $error;
            }
        } else {
            return redirect()->to('edit-profile');
            // No file uploaded
            // Handle the situation as per your application's needs
        }

    }

     public function changePassword()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
             

            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Change Password'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname']; 
            // $data['email'] = $session->get('email'); 
            // $dob = $session->get('dob'); 
            // $data['plan_name'] = $session->get('plan_name'); 
            // $data['plan_name'] = $session->get('list_feature');
            // $data['formattedDate'] = date('F j, Y', strtotime($dob));   

            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/user/change_password',$data) .
                    view('components/footer.php');
        }
        
    }

    public function changePasswordProcess(){
        // Get the form inputs
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $repeatNewPassword = $this->request->getPost('repeat_new_password');

        // Get the currently logged-in user's ID
        $session = session(); 
        $username = $session->get('username');// Get the user ID based on your authentication mechanism, e.g., session

        // Update the password in the database
        $usersModel = new UsersModel();
        $user = $usersModel->where('username', $username)->first();

        if ($user && password_verify($currentPassword, $user['password'])) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user's password
            $data = [
                'password' => $hashedPassword,
            ];
            $usersModel->update($user['username'], $data);

            return redirect()->to('profile');

            // return false; // Current password is incorrect
        }else{
            return redirect()->to('edit-profile');
        }

       
    }

    public function editProfileProcess()
    {
        // Get the form input values
        $session = session();
        $username = $session->get('username'); 
        $email = $this->request->getPost('email');
        $nickname = $this->request->getPost('nickname');
        $dateOfBirth = $this->request->getPost('dob');
        $gender = $this->request->getPost('gender');

        // Create an instance of the UsersModel
        $usersModel = new UsersModel();

        // Prepare the updated user data
        $updatedUserData = [
            'email' => $email,
            'nickname' => $nickname,
            'date_of_birth' => $dateOfBirth,
            'gender' => $gender
        ];

        var_dump($updatedUserData);
        var_dump($username);

        // Update the user profile
        $usersModel->update($username, $updatedUserData);

        return redirect()->to('profile');

        // Handle successful profile update
        // Return a success message or redirect to a success page
    }

     public function savedPaymentCard()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $cardModel = new CardModel();

        // Retrieve the user data by username

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
             

            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Profile'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            // $dob = $dataUser['date_of_birth'];

            
            $dataCard = $cardModel->getCardByUsername($username);
            if (!empty($dataCard)) {
                foreach ($dataCard as $card) {
                    // Process each card record
                    $lastFourDigits = substr($card['card_number'], -4);
                    $card_type = $card['card_type'];
                    $expiration = $card['exppiration'];
                    // ...
                }
            } else {
                // No card records found
            }



            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/user/black') .
                    view('components/footer.php');
        }
        
    }

     public function savedPaymentCard2()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $cardModel = new CardModel();


        // Retrieve the user data by username

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
             

            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Saved Payment Card'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            // print_r($data['username']);


           $dataCard = $cardModel->getCardByUsername("naim");
           foreach ($dataCard as $card) {
                // Process each card record
                $card['lastFourDigit'] = $card['card_number'];
                $data['cards'][] = $card;
            }
            $data['name'] = $dataCard[0]['card_number'];
        //   print_r("NEW ARRAY CARD: " . print_r($data['cards'], true));



//  $data['nickname'] = $dataUser['nickname'];
//            print_r($dataCard);
//             print_r($data['nickname']);

            
            // $data['username'] = $dataCard['username'];

        //    if (!empty($dataCard)) {
        //         foreach ($dataCard as $card) {
                    // // Process each card record
                    // $data['lastFourDigit'] = $dataCard['card_number'];
                    // $data['cards'][] = $card;
                //     }
                // } else {
                //     // No card records found
                // }

            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/user/saved_payment_card', $data) .
                    view('components/footer.php');
        }
        
    }

    public function deleteCard($id)
    {
        $cardModel = new CardModel();
        $session = session();
        $username = $session->get('username'); 
        
        $dataCard = $cardModel->deleteCardByUsernameAndId($username,$id);

        $cardId = $this->request->getPost('cardId');
        // Perform card deletion logic here using the $cardId

        // Return a JSON response indicating success or failure
        $response = [
            'success' => true, // or false if deletion failed
            'message' => 'Card deleted successfully', // Optional message
        ];
        return $this->response->setJSON($response);
    }



    
}