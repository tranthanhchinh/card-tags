<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use JeroenDesloovere\VCard\VCard;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    //
    public function index(Request $request){
        $memberID = $request->session()->get('u_id');
        $cardDetail = Card::where('members_id',$memberID )->first();
        return view('frontend/card', ['cardDetail'=>$cardDetail]);

    }
    public function update(Request $request){
        $request->validate([
            'card_name' => 'required',
            'card_email' => 'required|email',
            'card_phone' => 'required|min:10',
        ]);
        $memberID = $request->session()->get('u_id');
        $data =  [
            "name" => $request->card_name,
            'phone' =>$request->card_phone,
            'email'=>$request->card_email,
            'address'=>$request->address,
            'company'=>$request->company,
            'position'=>$request->position,
            'facebook'=>$request->facebook,
            'instagram'=>$request->instagram,
            'twitter'=>$request->twitter,
            'youtube'=>$request->youtube,
            'address'=>$request->address,

        ];
        if($request->file('avatar')){
            $fileName = time().'_'.$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('uploads'), $fileName);
            $data['avatar'] = $fileName;
        }
        Card::where("members_id", $memberID)->update($data);
        return redirect()->route('card')->with('message','Update Successfully');;
    }
    public function tagsMember(Request $request){
          $memberID = $request->session()->get('u_id');
          $themes = Card::select('theme')->where('members_id',$memberID )->first();
          return view('frontend/card-theme', ['theme'=>$themes->theme]);
    }
    public function updateTagsMember(Request $request){
        $memberID = $request->session()->get('u_id');
        $update = Card::where("members_id", $memberID)->update(['theme'=>$request->theme_id]);
        if($update){
            return redirect()->route('tags')->with('message','Update Successfully');
        }else{
            return redirect()->route('tags')->with('error','Update Error');
        }
    }

    public function viewCard($slug){
        $cardDetail= Card::where('slug',$slug )->first();
        if($cardDetail){
            return view('frontend/card-viewer', ['cardDetail'=>$cardDetail]);
        }else{
            return redirect()->route('index');
        }
    }
    public function vcardfile($slug){
        $cardDetail= Card::where('slug',$slug )->first();
        if($cardDetail){
          $vcard = new VCard();
          $vcard->addName($cardDetail->name);
          $vcard->addCompany($cardDetail->company);
          $vcard->addJobtitle($cardDetail->position);
          $vcard->addEmail($cardDetail->email);
          $vcard->addPhoneNumber($cardDetail->phone, 'WORK');
          $vcard->addAddress($cardDetail->address);
          $vcard->addURL($cardDetail->facebook, 'TYPE=Facebook');
          $vcard->addURL($cardDetail->instagram, 'TYPE=Instagram');
          $vcard->addURL($cardDetail->twitter, 'TYPE=Twitter');
          $vcard->addURL($cardDetail->youtube, 'Youtube');
          return $vcard->download();
        }
    }
    public function qrcode(Request $request){
        $memberID = $request->session()->get('u_id');
        $cardDetail = Card::select('slug')->where('members_id',$memberID )->first();
        $link = URL::to('/viewer').'/'.$cardDetail->slug;
        return view('frontend/qrcode', ['link'=>$link]);
    }
}
