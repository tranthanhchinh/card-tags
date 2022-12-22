<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    //
    public function index(Request $request){
        $memberID = $request->session()->get('u_id');
        $cardDetail = Card::where('members_id', $memberID )->first();
        return view('frontend/home', ['cardDetail'=>$cardDetail]);
    }
    public function register(Request $request){
        if($request->session()->get('username')){
            return redirect()->route('index');
        }
          return view('frontend/register');
    }
    public function postRegister(Request $request){
       $request->validate([
            'name' => 'required',
            'username' => 'required|min:5|max:50|unique:members,username',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $member = new Member();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->username = $request->username;
        $member->password = md5($request->password);
        if($member->save()){

            $card = new Card();
            $card->members_id = $member->id;
            $card->name = $request->card_name;
            $card->phone = $request->card_phone;
            $card->email = $request->card_email;
            $card->address = $request->address;
            $card->company = $request->company;
            $card->position = $request->position;
            $card->facebook = $request->facebook;
            $card->instagram = $request->instagram;
            $card->twitter = $request->twitter;
            $card->youtube = $request->youtube;
            $card->slug = Str::uuid();
            $card->theme = $request->theme_id;
            $fileName = time().'_'.$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('uploads'), $fileName);
            $card->avatar = $fileName;
            if($card->save()){
                $request->session()->put('username', $request->username);
                $request->session()->put('u_id', $member->id);
                return redirect()->route('index');
            }
        }


    }
    public function login(Request $request){
        if($request->session()->get('username')){
            return redirect()->route('index');
        }
        return view('frontend/login');
    }
    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $checkUsername = Member::where('username', $request->username)->count();
        if($checkUsername){
             $getMembers = Member::where('username', $request->username)->where('password', md5($request->password))->first();
             if($getMembers){
                 $request->session()->put('username', $getMembers->username);
                 $request->session()->put('u_id', $getMembers->id);
                 return redirect()->route('index');
             }else{
                 $request->session()->put('error', 'Username or password is incorrect');
                 return redirect()->route('login');
             }
        }else{
            $request->session()->put('error', 'Username or password is incorrect');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function account(Request $request){
          $memberID = $request->session()->get('u_id');
          $memberDetail = Member::where('id', $memberID )->first();
         return view('frontend/account',['memberDetail'=>$memberDetail]);
    }
    public function postAccount(Request $request){
        $memberID = $request->session()->get('u_id');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $data = [
             'name'=>$request->name,
             'email'=>$request->email,
        ];
        if($request->password){
            $data['password'] = $request->password;
        }
        $update = Member::where("id", $memberID)->update($data);
        if($update){
            return redirect()->route('account')->with('message','Update Successfully');
        }else{
            return redirect()->route('account')->with('error','Update Error');
        }
    }
}
