<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use App\Models\CardModel;
use App\Models\AlbumsListModel;
use App\Models\UserAlbumsListModel;
use App\Models\UserAlbumsDetailsListModel;
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
                    view('pages/admin/profile') .
                    view('components/footer.php');
        } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Profile'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            $data['email'] = $dataUser['email'];
            $dob = $dataUser['date_of_birth'];

            
            $dataUserSub = $userSubscriptionModel->getUserSubUsingUsername($username);
            // print_r($dataUserSub);
            if (!empty($dataUserSub)) {
                $sub_id = $dataUserSub[0]['sub_id'];
                $userSubId = $dataUserSub[0]['id'];
                $data['userSubId'] = $dataUserSub[0]['id'];

                $data['sub_id'] = $dataUserSub[0]['sub_id'];
                // $data['status'] = $dataUserSub[0]['status'];

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
            // echo $data['sub_name'];
            $data['userSubId'] = $userSubId;
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
            $data['password'] = $dataUser['password']; 
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

        if($username=="admin"){
            return redirect()->to('admin/profile');
        }else{
            return redirect()->to('profile');
        }
        

        // Handle successful profile update
        // Return a success message or redirect to a success page
    }


     public function savedPaymentCard()
    {
        $session = session();
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
            $username = $session->get('username'); 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname'];
            // print_r($data['username']);


           $dataCard = $cardModel->getCardByUsername($username);
           if (!empty($dataCard)) {
                foreach ($dataCard as $card) {
                    // Process each card record
                    $card['lastFourDigit'] = $card['card_number'];
                    $data['cards'][] = $card;
                }
                $data['name'] = $dataCard[0]['card_number'];
            } else {
                $data['cards'] = []; // Set an empty array if no cards found
            }

        //   print_r("NEW ARRAY CARD: " . print_r($data['cards'], true));


            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/user/saved_payment_card', $data) .
                    view('components/footer.php');
        }
        
    }

    public function deleteUserSubscription($id)
    {
        $userSubscriptionModel = new UserSubscriptionModel();
        $session = session();
        $username = $session->get('username'); 
        $data['title'] = 'Profile'; 

        $dataUserSubscription = $userSubscriptionModel->deleteSubscriptionByUsernameAndId($username,$id);

        $usersubscriptionId = $this->request->getPost('usersubscriptionId');
        // Perform card deletion logic here using the $usersubscriptionId

        // Return a JSON response indicating success or failure
        $response = [
            'success' => true, // or false if deletion failed
            'message' => 'Subscription deleted successfully', // Optional message
        ];

        return redirect()->to('profile');

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

    public function addCard(){

        $session = session();
        $username = $session->get('username'); 
        $name = $this->request->getPost('name');
        $card_number = $this->request->getPost('card_number');
        $expiration = $this->request->getPost('expiration');
        $security_code = $this->request->getPost('security_code');
        $card_type = $this->request->getPost('card_type');

        $cardModel = new CardModel();

        $data = [
            'username' => $username,
            'name' => $name,
            'card_number' => $card_number,
            'expiration' => $expiration,
            'security_code' => $security_code,
            'card_type' => $card_type
        ];

        $cardId = $cardModel->addCard($data);
        return  redirect()->to('saved-payment-cards');
    }

    public function addCardCheckout(){

        $session = session();
        $username = $session->get('username'); 
        $name = $this->request->getPost('name');
        $card_number = $this->request->getPost('card_number');
        $expiration = $this->request->getPost('expiration');
        $security_code = $this->request->getPost('security_code');
        $card_type = $this->request->getPost('card_type');

        $cardModel = new CardModel();

        $data = [
            'username' => $username,
            'name' => $name,
            'card_number' => $card_number,
            'expiration' => $expiration,
            'security_code' => $security_code,
            'card_type' => $card_type
        ];

        $cardId = $cardModel->addCard($data);
        return  redirect()->to('checkout-albums-list');
    }

    public function albumsList()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $albumsListModel = new AlbumsListModel();

        // Check if the user is logged in
        // if (session()->has('username') && session('role_id') == 1) {
            // $data['title'] = 'Admin Dashboard'; 
            // return  view('components/navbar',$data) .
            //         view('pages/admin/dashboard') .
            //         view('components/footer.php');
        // } else if (session()->has('username') && session('role_id') == 2) {
            $data['title'] = 'Albums List'; 
            // $dataUser = $usersModel->getUserByUsername($username);
            // $data['username'] = $dataUser['username'];
            // $data['nickname'] = $dataUser['nickname'];
            // $data['email'] = $dataUser['email'];
            // $data['dob'] = $dataUser['date_of_birth'];
            // $data['gender'] = $dataUser['gender'];


              // Get the list of albums sorted by genre
            $albums = $albumsListModel->getAlbumsSortedByGenre();
            // print_r($albums);
            
            $hipHopAlbums = [];
            $rockAlbums = [];
            $popAlbums = [];

            foreach ($albums as $album) {
                $genre = strtolower($album['genre']);

                if (strpos($genre, 'hip') !== false) {
                    $hipHopAlbums[] = $album;
                } elseif (strpos($genre, 'rock') !== false) {
                    $rockAlbums[] = $album;
                } elseif (strpos($genre, 'pop') !== false) {
                    $popAlbums[] = $album;
                }
            }

            // Sort the arrays by genre
            usort($hipHopAlbums, function ($a, $b) {
                return strcasecmp($a['genre'], $b['genre']);
            });

            usort($rockAlbums, function ($a, $b) {
                return strcasecmp($a['genre'], $b['genre']);
            });

            usort($popAlbums, function ($a, $b) {
                return strcasecmp($a['genre'], $b['genre']);
            });

            $data['hipHopAlbums'] = array_slice($hipHopAlbums, 0, 8);
            $data['rockAlbums'] = array_slice($rockAlbums, 0, 8);
            $data['popAlbums'] = array_slice($popAlbums, 0, 8);


            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/albums-list',$data) .
                    view('components/footer.php');
        
    }

     public function addCardModal()
    {
        return view('pages/add-card') ;
    }

    public function albumCheckoutProcess(){
        // Get the form inputs
        $cartItems = $this->request->getPost('cartItems');

        // Decode the cartItems JSON data
        $cartItemsData = json_decode($cartItems, true);

        // Display the received data
        // var_dump($cartItemsData);

        // $currentPassword = $this->request->getPost('cartItems');
        $totalPay = $this->request->getPost('totalInput');
        $cardId = $this->request->getPost('cardCheckoutInput');
        $username = $this->request->getPost('username');
        // echo "username ". $username;
        // echo "cardId ". $cardId;
        $userAlbumsListModel = new UserAlbumsListModel();
        
        $albumsID = $userAlbumsListModel->storeAlbums($username,$cartItemsData,$totalPay,$cardId);

        // $usersModel = new UsersModel();
        // echo "username ". $albumsID;


        // $data['title'] = 'Receipt'; 
        // Update the password in the database
        // $user = $usersModel->where('username', $username)->first();
        // return  redirect()->to('receipt');
        return redirect()->to('receipt')->with('albumsID', $albumsID);


       
    }

    public function receipt()
    {
        $session = session();
        $username = $session->get('username'); 
        // Create an instance of the UsersModel
        $usersModel = new UsersModel();
        $userSubscriptionModel = new UserSubscriptionModel();
        $subscriptionModel = new SubscriptionModel();
        $userAlbumsListModel = new UserAlbumsListModel();
        $userAlbumsDetailsListModel= new UserAlbumsDetailsListModel();
        $cardModel = new CardModel();
        $albumsListModel = new AlbumsListModel();
        // echo $albumsIDfromCheckout;
        $albumsID = session('albumsID');
            // echo $albumsID;


        // Check if the user is logged in
        // && $albumsID != null
        if (session()->has('username') && session('role_id') == 2 ) {
            $data['title'] = 'Receipt'; 
            $dataUser = $usersModel->getUserByUsername($username);
            $data['username'] = $dataUser['username'];
            $data['nickname'] = $dataUser['nickname']; 
            $data['email'] = $dataUser['email']; 
            $dataUserSub = $userSubscriptionModel->getUserSubUsingUsername($username);
            $sub_id = $dataUserSub[0]['sub_id'];
            $data['sub_id'] = $dataUserSub[0]['sub_id'];
    
            $dataSub = $subscriptionModel->getSubUsingSubId($sub_id);
            // echo $albumsID;
            
            
            $data['sub_name'] = $dataSub[0]['sub_name'];
            $dataUserAlbums = $userAlbumsListModel->getAlbumsByUsernameAndAlbumdId($username, $albumsID);
            // print_r($dataUserAlbums);
            $data['date_purchased'] = $dataUserAlbums[0]['date_purchased'];
            $data['total_amount'] = $dataUserAlbums[0]['total_amount']; 
            $data['order_id'] = $dataUserAlbums[0]['id']; 
            $order_id = $dataUserAlbums[0]['id']; 
            $card_id = $dataUserAlbums[0]['card_id']; 
            // echo $card_id;
            $dataCard = $cardModel->getCardById($card_id);
            $dataUserAlbumsDetails = $userAlbumsDetailsListModel->getAlbumsDetailsByUserAlbumId($order_id);
            // print_r($dataUserAlbumsDetails);


            $data['card_type'] = $dataCard[0]['card_type']; 
            $data['card_number'] = $dataCard[0]['card_number']; 

            $albumListBuyed = [];
            // $albumIDs = array_column($dataUserAlbumsDetails, 'id');
            foreach ($dataUserAlbumsDetails as $album) {
                $albumID = $album['album_id'];
                $dataAlbums = $albumsListModel->getSingleAlbumsByIDs($albumID);
                $albumListBuyed[] = $dataAlbums; // Append $dataAlbums to the $result array
               
            }
            $data['ListAlbumsBuyed'] = $albumListBuyed;
            //  print_r($albumListBuyed);

            // echo $data['card_number'];


            // print_r($dataUserAlbums);


            // $data['email'] = $session->get('email'); 
            // $data['formattedDate'] = date('F j, Y', strtotime($dob));   

            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/receipt',$data) .
                    view('components/footer.php');
        } else {

             $data['title'] = 'Homepage'; 

            return  view('components/navbar',$data) .
                    // view('components/promotionHeader.php') .
                    view('pages/index') .
                    view('components/footer.php');
            
        }
        
    }
    
}