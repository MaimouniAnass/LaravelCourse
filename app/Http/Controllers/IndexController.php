<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Etudiants;
use App\Mail\testmail;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{   
    // start API
    public function GetAPI(){
        $etudiants = DB::table('etudiants')->orderBy('name','ASC')->get();
        return $etudiants;
    }
    public function PostAPI(Request $request){
            $etudiants = Etudiants::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            if($etudiants) {
                return response()->json(['alert' => 'insertion avec succé'],200);
            }
            return response()->json(['alert' => "erreur d'insertion"],404);  
    }
    //   end API 
    public function index(){
        //$etudiants = DB::table('etudiants')->orderBy('name','ASC')->get();
        $etudiants = Etudiants::orderBy('name','ASC')->get();
        //$etudiants = Etudiants::orderBy('name','ASC')->get();
        # avec jointure 
        //$etudiants = Etudiants::orderBy('name','ASC')->with('notesEtudiants')->get();
        return view('welcome',compact('etudiants'));
     }
    public function store(PostRequest $request){
        if($request->validated()){
           //$etudiants = DB::table('etudiants')->insert([
            $etudiants = Etudiants::insert([
                'name' => $request->nameEt,
                'email' => $request->emailEt,
                'password' => $request->passwordEt,
            ]);
            return redirect()->back();
            /*return redirect()->back(); 
            Etudiants::create([
                'name' => $request->nameEt,
                'email' => $request->emailEt,
            ]);*/
        }else
            return "Error";
        
    }
    public function delete(Request $request,$id){
        //$etudiants = DB::table('etudiants')->where('id','=',$id)->delete();
        $etudiants = Etudiants::where('id','=',$id)->delete();
        return redirect()->back();
    }
    public function updateForm(Request $request,$id){
        //$etudiants = DB::table('etudiants')->where('id','=',$id)->first();
        $etudiants = Etudiants::where('id','=',$id)->first();
        return view('update',compact('etudiants'));
    }
    public function update(Request $request,$id){
        //$etudiants = DB::table('etudiants')->where('id','=',$id)->update([
        $etudiants = Etudiants::where('id','=',$id)->update([
            'name' => $request->nameEt,
            'email' => $request->emailEt
        ]);
        //return view('welcome');
        redirect()->intended('welcome');
        //return redirect()->back();
    }
    
    /* 
    public function index(){
        return view('welcome');
    }
    public function index(Request $request,$id){
        return "Hello Mon Id : ".$id;
    }
    */
    public function service(){
        return view('services');
    }
    public function indexPage(){
        return view('index');
    }
    public function display(Request $request,$id){
        return view('articles',compact('id'));
    }
    public function signUpForm(){
        return view('signup');
    }
    public function loginForm(Request $request){
        $loginControl = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if($loginControl){
            $info = $request->only('email','password');
            if(Auth::attempt($info)){
                return redirect()->to('/');
            }
            return redirect()->to('register');
        }
    }
    public function registerForm(Request $request){
        return view('register');
    }
    public function createloginForm(Request $request){
        $insert = Login::create([
            'name' => $request->nameEt,
            'email' => $request->emailEt,
            'password' => Hash::make($request->passwordEt),
        ]);
        if($insert){
            return redirect()->to('signup'); 
        }
        return redirect()->to('register');
    }
    public function sendMail()
    {
        Mail::to('maimouni_anass@hotmail.fr')->send(new testmail);
    }
}
