<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use App\Models\CardModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{

     public function dashboard()
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
        $data['title'] = 'Dashboard'; 
        $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $dob = $dataUser['date_of_birth'];
            $data['formattedDate'] = date('F j, Y', strtotime($dob));   
        return  view('components/navbar',$data) .
                view('pages/admin/user-list') .
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
            $dob = $dataUser['date_of_birth'];
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
}