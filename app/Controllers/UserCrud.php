<?php 
namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\Controller;
class UserCrud extends Controller
{
     

    // show users list
    public function index(){
        
        $userModel = new UsersModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('pages/admin/dashboard', $data);
    }
    // show users list (Dummy)
    public function profile(){
        
        $userModel = new UsersModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('pages/user/profile', $data);
    }
    // add user form
    public function create(){
        return view('add_user');
    }
 
    // insert data
    public function store() {
        $userModel = new UsersModel();
        $data = [
            'product_name' => $this->request->getVar('product_name'),
            'product_price'  => $this->request->getVar('product_price'),
        ];
        $userModel->insert($data);
        return redirect()->to(base_url('users-list'));

    }
    // show single user
    public function singleUser($id = null){
        $userModel = new UsersModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('edit_user', $data);
    }
    // update user data
    public function update(){
        $userModel = new UsersModel();
        $id = $this->request->getVar('id');
        $data = [
            'product_name' => $this->request->getVar('product_name'),
            'product_price'  => $this->request->getVar('product_price'),
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('users-list'));

    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UsersModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return redirect()->to(base_url('users-list'));

    }    
}