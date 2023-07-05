<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use App\Models\CardModel;
use App\Models\DashboardModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{

    

     public function dashboard()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $dashboardModel = new DashboardModel();

        $data['title'] = 'Dashboard'; 
        $dataUser = $usersModel->getUserByUsername($username);
        $data['totalUser'] = $dashboardModel->getTotalUsers();
        $data['totalSub'] = $dashboardModel->getTotalSubscriptions();
        $data['totalSale'] = $dashboardModel->getTotalAmount();
        $data['totalAlbums'] = $dashboardModel->getTotalAlbums();
        // $data['topAlbums'] = $dashboardModel->getTopPurchasedAlbums();
        print_r($data['totalAlbums']);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $dob = $dataUser['date_of_birth'];
            $data['formattedDate'] = date('F j, Y', strtotime($dob));   
        return  view('components/navbar',$data) .
                view('pages/admin/dashboard') .
                view('components/footer.php');
    }
     public function profile()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $data['title'] = 'Dashboard'; 
        $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $dob = $dataUser['date_of_birth'];
            $data['formattedDate'] = date('F j, Y', strtotime($dob));   
        return  view('components/navbar',$data) .
                view('pages/admin/profile') .
                view('components/footer.php');
    }
    public function userList()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $userSubscriptionModel = new UserSubscriptionModel();
        $data['title'] = 'User List'; 
        $dataUser = $usersModel->getUserByUsername($username);
        $data['users'] = $userSubscriptionModel->getSubscriptions();
        // $data['users'] = $userSubscriptionModel->getUsersWithoutSubscription();
        print_r($data['users']);

        foreach ($data['users'] as &$user) {
            if (!isset($user['sub_name'])) {
                $user['sub_name'] = "Free Plan";
            }
            if (!isset($user['ended_date'])) {
                $user['ended_date'] = "-";
            }
        }
        $data['username'] = $dataUser['username'];
        $data['nickname'] = $dataUser['nickname'];
        // $data['users'] = $usersModel->where('role_id !=', 1)->findAll();
        return  view('components/navbar',$data) .
                view('pages/admin/user-list',$data) .
                view('components/footer.php');
    }
    public function editProfile()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $data['title'] = 'Dashboard'; 
        $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $data['gender'] = $dataUser['gender'];
            $dob = $dataUser['date_of_birth'];
            $data['dob'] = $dataUser['date_of_birth'];
            $data['formattedDate'] = date('F j, Y', strtotime($dob));   
        return  view('components/navbar',$data) .
                view('pages/admin/edit_profile') .
                view('components/footer.php');
    }

     public function memberships()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $data['title'] = 'Dashboard'; 
        $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $dob = $dataUser['date_of_birth'];
            $data['formattedDate'] = date('F j, Y', strtotime($dob));   
        return  view('components/navbar',$data) .
                view('pages/admin/memberships') .
                view('components/footer.php');
    }

    public function singleUser($username){
        $usersModel = new UsersModel();
        $data['title'] = 'Edit' . $username; 
        $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['gender'] = $dataUser['gender'];
            $data['email'] = $dataUser['email'];
            $data['dob'] = $dataUser['date_of_birth'];
            
        return  view('components/navbar',$data) .
                view('pages/admin/edit-user',$data) .
                view('components/footer.php');
    }

    public function updateSingleUser()
    {
        // Get the form input values
        $username = $this->request->getPost('username');
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

        return redirect()->to('admin/user-list');

        // Handle successful profile update
        // Return a success message or redirect to a success page
    }

    public function deleteUser($username)
    {

        $usersModel = new UsersModel();
        $session = session(); 
        $dataUser = $usersModel->deleteUserByUsername($username);
        $data['title'] = 'Delete'; 


        return redirect()->to('admin/user-list');
    }
}