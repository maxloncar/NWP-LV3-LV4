<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Session;
use Illuminate\support\Facades\Hash;
use App\Models\User;
  
class AuthController extends Controller {
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index() {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration() {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('projects')->withSuccess('Uspjesno ste se prijavili u sustav!');
        }
  
        return redirect("login")->withSuccess('Unijeli ste krive kredencijale.');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request) {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('projects')->withSuccess('Uspjesno ste se registrirali u sustav!');
        }
         
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function projects() {
        if(Auth::check()){
            return view('projects');
        }
  
        return redirect("login")->withSuccess('Nemate pristup sustavu!');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data) {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}
