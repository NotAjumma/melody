<?php

namespace App\Controllers;

use App\Models\UserSubscriptionModel;
use App\Models\SubscriptionModel;
use App\Models\CardModel;
use CodeIgniter\Controller;

class PlanController extends Controller
{
     public function individual()
    {
        $data['title'] = 'Plan Individual'; 
        return  view('components/navbar',$data) .
                view('pages/plan/individual') .
                view('components/footer.php');
    }
    public function yearly()
    {
        $data['title'] = 'Plan Yearly'; 
        return  view('components/navbar',$data) .
                view('pages/plan/yearly') .
                view('components/footer.php');
    }
    public function checkoutForm($month)
    {
        $session = session();
        $username = $session->get('username'); 
        $userSubModel = new UserSubscriptionModel();
        $cardModel = new CardModel();

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
        $data['title'] = 'Checkout Premium'; 
        return  view('components/navbar',$data) .
                view('pages/plan/checkout'.$month) .
                view('components/footer.php');
    }

    public function checkoutStore() {
    
        //Store user card
        $cardId = $this->request->getPost('cardCheckoutInput');
        $sub_id = $this->request->getVar('sub_id');
        // echo $sub_id;


        // Store Subscription made by user
        $dataSubscription = [
            'sub_id' => $this->request->getVar('sub_id'),
            'username' => $this->request->getVar('username'),
            'started_date'  => $this->request->getVar('started_date'),
            'ended_date'  => $this->request->getVar('ended_date'),
            'durationMonth'  => $this->request->getVar('total_duration'),
            'total_amount'  => $this->request->getVar('total_amount'),
            'status'  => "active",
            'card_id'  => $cardId,
        ];
        // print_r($dataSubscription);
        $userSubscriptionModel = new UserSubscriptionModel();
        $subscriptionModel = new SubscriptionModel();


        $userSubId = $userSubscriptionModel->insertUserSub($dataSubscription);
        // echo $dataSubInsert;
        // return redirect()->to('profile');getSubUsingSubId
        // $subModel = $subscriptionModel->getSubUsingSubId($sub_id);
        // $subName = $subModel['sub_name'];
        // echo $subName;
        if($sub_id==1){
            $sub_name="Monthly";
        }elseif($sub_id==2){
            $sub_name="Yearly";
        }
        $data['alertBody'] = "Succesfully buy ". $sub_name ." membership.";

        return redirect()->to('profile')->with('alertSuccess', view('components/alertSuccess',$data));

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
        return  redirect()->to('plan/checkout/promote');
    }

    public function addCardCheckout1m(){

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
        return  redirect()->to('plan/checkout/1m');

        // $data['alertBody'] = "Succesfully buy membership.";

        // return redirect()->to('plan/checkout/1m')->with('alertSuccess', view('components/alertSuccess',$data));
    }

    public function addCardCheckout1y(){

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
        return  redirect()->to('plan/checkout/1y');
    }

    public function addCardCheckout3m(){

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
        return  redirect()->to('plan/checkout/3m');
    }

    public function addCardCheckout6m(){

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
        return  redirect()->to('plan/checkout/6m');
    }
}