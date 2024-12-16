<?php

namespace App\Http\Controllers\Dashboard\appointments;
use Twilio\Rest\Client;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){

        $appointments = Appointment::where('type','unconfirmed')->get();
        return view('Dashboard.appointments.index',compact('appointments'));
    }

    public function index2(){

        $appointments = Appointment::where('type','Confirmed')->get();
        return view('Dashboard.appointments.index2',compact('appointments'));
    }

    public function approval(Request $request,$id){
        $appointment = Appointment::findorFail($id);
        $appointment->update([
            'type'=>'Confirmed',
            'appointment'=>$request->appointment
        ]);
        // dd(env('TWILIO_SID'), env('TWILIO_TOKEN'), env('TWILIO_FROM'));

        // Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name,$appointment->appointment));
        $receiverNumber = $appointment->phone;
        $message = "Dear Patient" . " " . $appointment->name . " " . "Your Appointmetn has been boked" . $appointment->appointment;
        $account_sid = env('TWILIO_SID');
        $auth_token = env('TWILIO_TOKEN');
        $twilio_number = env('TWILIO_FROM');
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($receiverNumber,[
            'from' => $twilio_number,
            'body' => $message
        ]);
        session()->flash('add');
        return back();
    }
    public function destroy($id)
    {
        Appointment::destroy($id);
        session()->flash('delete');
        return back();
    }

}
