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
    //funkcija za prijavu korisnika
    public function login() {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    //funkcija za registraciju korisnika
    public function registration() {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    //provjera je li korisnik unjeo prave kredencijale pri prijavi
    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('projects')->withSuccess('Uspješno ste se prijavili u sustav!');
        }
  
        return redirect("login")->withSuccess('Unijeli ste krive kredencijale.');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    //privjera je li korisnik unjeo e-mail koji se ne koristi te je li zaporka dovoljna jaka
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
            return redirect()->intended('projects')->withSuccess('Uspješno ste se registrirali u sustav!');
        }
         
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    //preusmjeravanje korisnika na rutu projects
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
    //kreiranje korisnika (ime, e-mail i hashirana zaporka)
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
    //odjava korisnika i preusmjeravanje na login rutu
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}
