<?php namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {
    public function login() { return view('auth/login'); }
    public function register() { return view('auth/register'); }

    public function storeRegister() {
        $userModel = new UserModel();
        $data = [
            'name'     => $this->request->getVar('name'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        $userModel->save($data);
        return redirect()->to('/')->with('msg', 'Registration Successful!');
    }

    public function loginAuth() {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            if(password_verify($password, $data['password'])){
                $ses_data = ['id'=>$data['id'], 'name'=>$data['name'], 'email'=>$data['email'], 'isLoggedIn'=>TRUE];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }
        }
        return redirect()->back()->with('err', 'Invalid Email or Password');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}