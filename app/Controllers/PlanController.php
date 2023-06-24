<?php

namespace App\Controllers;

use App\Models\UsersModel;
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
    public function checkout()
    {
        $data['title'] = 'Checkout Premium'; 
        return  view('components/navbar',$data) .
                view('pages/plan/card') .
                view('components/footer.php');
    }
}