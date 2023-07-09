<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use App\Models\AlbumsListModel;
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
        $albumsListModel = new AlbumsListModel();

        $data['title'] = 'Dashboard'; 
        $dataUser = $usersModel->getUserByUsername($username);
        $data['totalUser'] = $dashboardModel->getTotalUsers();
        // echo $data['totalUser'];
        $data['totalSub'] = $dashboardModel->getTotalSubscriptions();
        $data['totalSale'] = $dashboardModel->getTotalAmount();
        $data['totalAlbums'] = $dashboardModel->getTotalAlbums();
        $data['totalAlbumsBuy'] = $dashboardModel->sumTotalAlbumOccurrences();
        $dataTopAlbums = $dashboardModel->findTopAlbums();
        $data['$dataTopAlbums']=$dataTopAlbums;
        $topAlbumListBuyed = [];
            // $albumIDs = array_column($dataUserAlbumsDetails, 'id');
            foreach ($dataTopAlbums as $album) {
                $albumID = $album['album_id'];
                $dataAlbums = $albumsListModel->getSingleAlbumsByIDs($albumID);
                $dataAlbums[0]['occurrence'] = $album['occurrence'];
                $topAlbumListBuyed[] = $dataAlbums; // Append $dataAlbums to the $result array
               
            }
            $data['TopAlbumListBuyed'] = $topAlbumListBuyed;
           $data['charts'] = $albumsListModel->db->table('user_albums')
                ->select('date_purchased, COUNT(*) as total_users')
                ->where('date_purchased >=', date('Y-m-d', strtotime('-7 days')))
                ->groupBy('date_purchased')
                ->get()
                ->getResultArray();
        // print_r($data['TopAlbumListBuyed']);


        // $data['topAlbums'] = $dashboardModel->getTopPurchasedAlbums();
        // print_r($data['totalAlbums']);
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
        // print_r($data['users']);

        foreach ($data['users'] as &$user) {
            if (!isset($user['sub_name'])) {
                $user['sub_name'] = "Free Plan";
                $user['status'] = "Free";
            }
            if (!isset($user['ended_date']) || $user['ended_date'] === '0000-00-00') {
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
        $userSubscriptionModel = new UserSubscriptionModel();
        $subscriptionModel = new SubscriptionModel();

        $data['title'] = 'Edit' . $username; 
        $dataUser = $usersModel->getUserByUsername($username);
        $data['users'] = $userSubscriptionModel->getSubscriptionsByUsername($username);
        $dataUserSub=$data['users'];
        // print_r($dataUserSub);

        // $data['users'] = $userSubscriptionModel->getUsersWithoutSubscription();
        // print_r($data['users']);

        foreach ($data['users'] as &$user) {
            if (!isset($user['sub_name'])) {
                $user['sub_name'] = "Free Plan";
                $user['sub_id'] = "0";
                $user['status'] = "Free";
                $user['id'] = "0";
                
            }
            if (!isset($user['ended_date'])) {
                $user['ended_date'] = "-";
            }
             if (!isset($user['started_date'])) {
                $user['started_date'] = "-";
            }
        }

            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['gender'] = $dataUser['gender'];
            $data['email'] = $dataUser['email'];
            $data['dob'] = $dataUser['date_of_birth'];
            $data['sub_name'] = $user['sub_name'];
            $data['sub_id'] = $user['sub_id'];
            $data['subscriptionTypes'] = $subscriptionModel->getAllSub();
            $data['status']=$user['status'];
            $data['id'] = $user['id'];
            $data['start_date']=$user['started_date'];
            // print_r($data['subscriptionTypes']);
            // echo $data['sub_name'];
            // print_r($data['users']);
            
            
        return  view('components/navbar',$data) .
                view('pages/admin/edit-user',$data) .
                view('components/footer.php');
    }

    public function updateSingleUser()
    {
        // Get the form input values
        // echo "inside";
        $username = $this->request->getPost('username');
        $plan = $this->request->getPost('plan_update');
        $sub_id = $this->request->getPost('sub_id');
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status_update');
        $email = $this->request->getPost('email');
        $nickname = $this->request->getPost('nickname');
        $dateOfBirth = $this->request->getPost('dob');
        $gender = $this->request->getPost('gender');
        $start_date = $this->request->getPost('start_date');
        $userSubId = $this->request->getPost('id');
        

        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $userSubscriptionModel = new UserSubscriptionModel();

        // Prepare the updated user data
        $updatedUserData = [
            'email' => $email,
            'nickname' => $nickname,
            'date_of_birth' => $dateOfBirth,
            'gender' => $gender
        ];
        $updatedUserSubData = [
            'sub_id' => $plan,
            'started_date' => ($plan == 0) ? null : $start_date,
            'status' => ($plan == 0) ? 'Free' : $status,
            'ended_date' => ($plan == 1) ? date('Y-m-d', strtotime('+1 month', strtotime($start_date))) :
                (($plan == 2) ? date('Y-m-d', strtotime('+1 year', strtotime($start_date))) : null)
        ];

        $insertUserSubData = [
            'sub_id' => $plan,
            'username' => $username,
            'durationMonth' => ($plan == 1) ? 1 : 12,
            'total_amount' => ($plan == 1) ? 14.9 : 130.9,
            'started_date' =>  $start_date,
            'status' => $status,
            'card_id' => 0,
            'ended_date' => ($plan == 1) ? date('Y-m-d', strtotime('+1 month', strtotime($start_date))) :
                (($plan == 2) ? date('Y-m-d', strtotime('+1 year', strtotime($start_date))) : null)
        ];

        // var_dump($updatedUserData);
        // var_dump($updatedUserSubData);

        // Update the user profile
        $afterInsertUser = $usersModel->update($username, $updatedUserData);
        if(!empty($id) && $plan){
            echo "if";
            $afterInsertUserSub = $userSubscriptionModel->updateUserSubByUsername($username, $updatedUserSubData);
        }elseif (empty($id)){
            echo "elseif";
            $afterInsertUserSub = $userSubscriptionModel->insertUserSub($insertUserSubData);
        }else{
            echo "else";
            $afterUpdateUserSub = $userSubscriptionModel->deleteSubscriptionByUsernameAndId($username, $userSubId);
        }
        
        // var_dump($insertUserSubData);
        // var_dump($afterInsertUserSub);

        $data['alertBody'] = "Succesfully updated user profile.";

        return redirect()->to('admin/user-list')->with('alertSuccess', view('components/alertSuccess',$data));

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

    public function albumsList()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $userSubscriptionModel = new UserSubscriptionModel();
        $dashboardModel = new DashboardModel();
        $albumsListModel = new AlbumsListModel();
        $data['title'] = 'Albums List'; 
        // echo "indise";
        $dataTopAlbums = $dashboardModel->findAllAlbums();
        // print_r($dataTopAlbums);
        $data['$dataTopAlbums']=$dataTopAlbums;
        // $topAlbumListBuyed = [];
        //     // $albumIDs = array_column($dataUserAlbumsDetails, 'id');
        //     foreach ($dataTopAlbums as $album) {
        //         $albumID = $album['album_id'];
        //         $dataAlbums = $albumsListModel->getSingleAlbumsByIDs($albumID);
        //         $dataAlbums[0]['occurrence'] = $album['occurrence'];
        //         $topAlbumListBuyed[] = $dataAlbums; // Append $dataAlbums to the $result array
               
        //     }
        usort($dataTopAlbums, function ($a, $b) {
            return $b['occurrence'] - $a['occurrence'];
        });
        $data['TopAlbumListBuyed'] = $dataTopAlbums;
        // print_r($data['TopAlbumListBuyed']);
        $dataUser = $usersModel->getUserByUsername($username);
        

        $data['username'] = $dataUser['username'];
        $data['nickname'] = $dataUser['nickname'];
        // $data['users'] = $usersModel->where('role_id !=', 1)->findAll();
        return  view('components/navbar',$data) .
                view('pages/admin/albums-list',$data) .
                view('components/footer.php');
    }

    public function singleAlbum($album_id){
        
        $session = session();
        $username = $session->get('username'); 
        // echo $username;
        $usersModel = new UsersModel();
        $dataUser = $usersModel->getUserByUsername($username);
        
        $data['username'] = $dataUser['username'];
        $data['nickname'] = $dataUser['nickname'];
        $albumsListModel = new AlbumsListModel();
        // $userSubscriptionModel = new UserSubscriptionModel();
        // $subscriptionModel = new SubscriptionModel();
        // echo "inside";
        $data['title'] = 'Edit' ; 
        $dataAlbum = $albumsListModel->getSingleAlbumsByIDs($album_id);
        // echo $album_id;

        // print_r($dataAlbum);
        // $data['users'] = $userSubscriptionModel->getSubscriptionsByUsername($username);
        // $dataUserSub=$data['users'];
        // print_r($dataUserSub);

        // $data['users'] = $userSubscriptionModel->getUsersWithoutSubscription();
        // print_r($data['users']);

        // foreach ($data['users'] as &$user) {
        //     if (!isset($user['sub_name'])) {
        //         $user['sub_name'] = "Free Plan";
        //         $user['sub_id'] = "0";
        //         $user['status'] = "Free";
        //         $user['id'] = "0";
                
        //     }
        //     if (!isset($user['ended_date'])) {
        //         $user['ended_date'] = "-";
        //     }
        //      if (!isset($user['started_date'])) {
        //         $user['started_date'] = "-";
        //     }
        // }

            $data['id'] = $dataAlbum[0]['id'];
            // echo $data['id'];
            $data['album_title'] = $dataAlbum[0]['album_title'];
            $data['artist'] = $dataAlbum[0]['artist'];
            $data['genre'] = $dataAlbum[0]['genre'];
            $data['release_date'] = $dataAlbum[0]['release_date'];
            $data['average_rating'] = $dataAlbum[0]['average_rating'];
            $data['descriptions'] = $dataAlbum[0]['descriptions'];
            $data['ranking'] = $dataAlbum[0]['ranking'];
            $data['album_cover'] = $dataAlbum[0]['album_cover'];
            $data['price'] = $dataAlbum[0]['price'];
            // $data['subscriptionTypes'] = $subscriptionModel->getAllSub();
            // $data['status']=$user['status'];
            // $data['id'] = $user['id'];
            // $data['start_date']=$user['started_date'];
            // print_r($data['subscriptionTypes']);
            // echo $data['sub_name'];
            // print_r($data['users']);
            
            
        return  view('components/navbar',$data) .
                view('pages/admin/edit-album',$data) .
                view('components/footer.php');
    }

    public function updateSingleAlbum()
    {
        // Get the form input values
        // echo "inside";
        $album_title = $this->request->getPost('album_title');
        $artist = $this->request->getPost('artist');
        $genre = $this->request->getPost('genre');
        $id = $this->request->getPost('id');
        $release_date = $this->request->getPost('release_date');
        $descriptions = $this->request->getPost('descriptions');
        $album_cover = $this->request->getPost('album_cover');
        $price = $this->request->getPost('price');

        // echo $id;
            // echo "id outside ".$id;

        
        // $dateOfBirth = $this->request->getPost('dob');
        // $gender = $this->request->getPost('gender');
        // $start_date = $this->request->getPost('start_date');
        // $userSubId = $this->request->getPost('id');
        
        // Create an instance of the UsersModel
        $albumsListModel = new AlbumsListModel();
        // $userSubscriptionModel = new UserSubscriptionModel();

        // Prepare the updated user data
        $updatedAlbumData = [
            'album_title' => $album_title,
            'artist' => $artist,
            'genre' => $genre,
            'descriptions' => $descriptions,
            'album_cover' => $album_cover,
            'price' => $price,
            'release_date' => $release_date
        ];

        // print_r($updatedAlbumData);
        // $updatedUserSubData = [
        //     'sub_id' => $plan,
        //     'started_date' => ($plan == 0) ? null : $start_date,
        //     'status' => ($plan == 0) ? 'Free' : $status,
        //     'ended_date' => ($plan == 1) ? date('Y-m-d', strtotime('+1 month', strtotime($start_date))) :
        //         (($plan == 2) ? date('Y-m-d', strtotime('+1 year', strtotime($start_date))) : null)
        // ];

        // $insertUserSubData = [
        //     'sub_id' => $plan,
        //     'username' => $username,
        //     'durationMonth' => ($plan == 1) ? 1 : 12,
        //     'total_amount' => ($plan == 1) ? 14.9 : 130.9,
        //     'started_date' =>  $start_date,
        //     'status' => $status,
        //     'card_id' => 0,
        //     'ended_date' => ($plan == 1) ? date('Y-m-d', strtotime('+1 month', strtotime($start_date))) :
        //         (($plan == 2) ? date('Y-m-d', strtotime('+1 year', strtotime($start_date))) : null)
        // ];

        // var_dump($updatedUserData);
        // var_dump($updatedUserSubData);

        // Update the user profile

        $afterInsertAlbum = $albumsListModel->updateAlbum($id, $updatedAlbumData);
        // if(!empty($id) && $plan){
        //     $afterInsertUserSub = $userSubscriptionModel->updateUserSubByUsername($username, $updatedUserSubData);
        // }elseif (empty($id)){
        //     echo "elseif";
        //     $afterInsertUserSub = $userSubscriptionModel->insertUserSub($insertUserSubData);
        // }else{
        //     echo "else";
        //     $afterUpdateUserSub = $userSubscriptionModel->deleteSubscriptionByUsernameAndId($username, $userSubId);
        // }
        
        // var_dump($afterInsertAlbum);
        // var_dump($afterInsertUserSub);

        $data['alertBody'] = "Succesfully updated album.";

        return redirect()->to('admin/albums-list')->with('alertSuccess', view('components/alertSuccess',$data));

        // Handle successful profile update
        // Return a success message or redirect to a success page
    }

    public function deleteAlbum($album_id)
    {

        $albumsListModel = new AlbumsListModel();
        // $session = session(); 
        $dataUser = $albumsListModel->deleteAlbumById($album_id);
        $data['title'] = 'Delete'; 

        $data['alertBody'] = "Succesfully delete album.";
        return redirect()->to('admin/albums-list')->with('alertSuccess', view('components/alertSuccess',$data));
    }

     public function changePassword()
    {
        $session = session();
        $username = $session->get('username'); 
        // echo $username;
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();

        // Check if the user is logged in
        if (session()->has('username') && session('role_id') == 1) {
             $data['title'] = 'Change Password'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname']; 
            $data['password'] = $dataUser['password']; 
            // $data['email'] = $session->get('email'); 
            // $dob = $session->get('dob'); 
            // $data['plan_name'] = $session->get('plan_name'); 
            // $data['plan_name'] = $session->get('list_feature');
            // $data['formattedDate'] = date('F j, Y', strtotime($dob));   

            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/admin/change_password',$data) .
                    view('components/footer.php');
        } else  {
           return redirect()->to('/');
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
        // echo $username;
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

            $data['alertBody'] = "New password succesfully updated";

            return redirect()->to('admin/profile')->with('alertSuccess', view('components/alertSuccess',$data));
            // return false; // Current password is incorrect
        }else{
            return redirect()->to('admin/profile');
        }

       
    }
}