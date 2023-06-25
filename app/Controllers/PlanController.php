<?php

namespace App\Controllers;

use App\Models\UserSubscriptionModel;
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
    public function checkoutForm()
    {
        $data['title'] = 'Checkout Premium'; 
        return  view('components/navbar',$data) .
                view('pages/plan/checkout') .
                view('components/footer.php');
    }

    public function checkoutStore() {
        $userSubModel = new UserSubscriptionModel();
        $cardModel = new CardModel();

        //Store user card
        $dataCard = [
            'username' => $this->request->getVar('username'),
            'name'  => $this->request->getVar('name'),
            'card_number'  => $this->request->getVar('card_number'),
            'expiration'  => $this->request->getVar('expiration'),
            'security_code'  => $this->request->getVar('security_code'),
            'card_type'  => $this->request->getVar('card_type'),
        ];
        $cardId = $cardModel->insert($dataCard);


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
        $userSubModel->insert($dataSubscription);
        return redirect()->to(base_url());

    }
}