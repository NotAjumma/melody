<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use CodeIgniter\Controller;

class UserController extends Controller
{

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
            $data['username'] = $session->get('username'); 
            $data['nickname'] = $session->get('nickname'); 
            $data['email'] = $session->get('email'); 
            $dob = $session->get('dob'); 
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

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Edit Profile'; 
            $data['username'] = $session->get('username'); 
            $data['nickname'] = $session->get('nickname'); 
            $data['email'] = $session->get('email'); 
            $data['dob'] = $session->get('dob'); 
            $data['gender'] = $session->get('gender'); 
            $data['plan_name'] = $session->get('list_feature');
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

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
            $data['title'] = 'Admin Dashboard'; 
             

            return  view('components/navbar',$data) .
                    view('pages/admin/dashboard') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Change Password'; 
            $data['username'] = $session->get('username'); 
            // $data['nickname'] = $session->get('nickname'); 
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




    
}