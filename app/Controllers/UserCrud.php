<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
class UserCrud extends Controller
{
    // show users list
    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('user_view', $data);
    }
    // add user form
    public function create(){
        return view('add_user');
    }
 
    // insert data
    public function store() {
        $userModel = new UserModel();
        $data = [
            'product_name' => $this->request->getVar('product_name'),
            'product_price'  => $this->request->getVar('product_price'),
        ];
        $userModel->insert($data);
        return redirect()->to(base_url('users-list'));

    }
    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('edit_user', $data);
    }
    // update user data
    public function update(){
        $userModel = new UserModel();
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
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return redirect()->to(base_url('users-list'));

    }    
}