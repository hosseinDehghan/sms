<?php

namespace Hosein\Sms\Controllers;


use Hosein\Sms\Sms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class SmsController extends Controller
{
    public function index(){
        $data["listSms"]=Sms::all();
        return view("SmsView::sms",$data);
    }
    public function create(Request $request){
        $validator=Validator::make($request->all(),[
            "name"=>'required|max:100',
            "family"=>'required|max:100',
            "tell"=>'required'
        ]);
        if($validator->fails()){
            return redirect("sms")
                ->withErrors($validator,"sms")
                ->withInput();
        }
        $sms=new Sms();
        $sms->name=$request->all()["name"];
        $sms->family=$request->all()["family"];
        $sms->tell=$request->all()["tell"];
        $sms->save();
        return redirect("sms")->with("message","با موفقیت ثبت شد");

    }
    public function update(Request $request,$id){
        $sms=Sms::where("id",$id)->first();
        $sms->name=$request->all()["name"];
        $sms->family=$request->all()["family"];
        $sms->tell=$request->all()["tell"];
        $sms->save();
        return redirect("sms")->with("message","با موفقیت ویرایش شد");
    }
    public function edit($id){
        $sms=Sms::where("id",$id)->first();
        return redirect("sms")->with("sms",$sms);
    }
    public function delete($id){
        $sms=Sms::where("id",$id)->first();
        $sms->delete();
        return redirect("sms")->with("message","حذف شد");
    }
    public function send(Request $request){
        $validator=Validator::make($request->all(),[
            "message"=>'required|max:1000',
            "tell"=>'required'
        ]);
        if($validator->fails()){
            return redirect("sms")
                ->withErrors($validator,"sms")
                ->withInput();
        }
        return redirect("sms")->with("message",
            Smsirlaravel::send($request->all()['messageSend'],$request->all()["tell"])["Message"]);
    }
}
