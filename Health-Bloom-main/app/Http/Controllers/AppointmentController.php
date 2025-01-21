<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Specialist;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function appointment(Request $request)
    {
        Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email',
            'date'=>'required',
            'phone'=>'required',
            'specialist'=>'required',
        ],[
            'name.required'=>"This field is required",
            'email.required'=>"This field is required",
            'email.email'=>"This field should be in Email form",
            'date.required'=>"This field is required",
            'phone.required'=>"This field is required",
            'specialist.required'=>"This field is required",
        ])->validate();
        $data = new Appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->specialist_id = $request->specialist;
        $data->status = 'In Progress';
        if(Auth::id())
        {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment request has been sent seccessfully. We will contact you soon');
    }

    public function myappointment()
    {
        if(Auth::user()->usertype==0)
        {
            $userid = Auth::user()->id;
            $appoints = Appointment::where('user_id', $userid)->get();
            $specialists = Specialist::all();
            return view('user.my_appointment', compact('appoints', 'specialists'));
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        if(Auth::user()->usertype==0)
        {
            $data = Appointment::find($id);
            $data->delete();
            return redirect()->back();}
        else 
        {
            return redirect()->back();
        }
    }

    public function showappointment()
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::all();
            return view('admin.showappointment', compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function approved($id)
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::find($id);
            $data->status = 'Approved';
            $data->save();

            $s = Specialist::find($data->specialist_id);
            $a = $s->name;

            $basic  = new \Vonage\Client\Credentials\Basic("0acc6616", "ZQepwAxHZ0OcURKo");
            $client = new \Vonage\Client($basic);

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($data->phone, 'Health Bloom', 'Your appointment with $a is APPROVED!')
            );

            $message = $response->current();
            
            return redirect()->back();
        }
        else 
        {
            return redirect()->back();
        }
        
    }

    public function canceled($id)
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::find($id);
            $data->status = 'Canceled';
            $data->save();
            $s = Specialist::find($data->specialist_id);
            $a = $s->name;
            $basic  = new \Vonage\Client\Credentials\Basic("0acc6616", "ZQepwAxHZ0OcURKo");
            $client = new \Vonage\Client($basic);

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($data->phone, 'Health Bloom', "Your appointment with $a is CANCELED!")
            );

            $message = $response->current();
            
            return redirect()->back();   
        }
        else 
        {
            return redirect()->back();
        }
        
    }

    public function emailview($id)
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::find($id);
            return view('admin.email_view', compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function sendemail(Request $request, $id)
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::find($id);
            $details = [
                'greeting' => $request->greeting,
                'message' => $request->message,
                'actiontext' => $request->actiontext,
                'actionurl' => $request->actionurl,
                'endpart' => $request->endpart,
            ];
            Notification::send($data, new SendEmailNotification($details));
            return redirect('/showappointment');
        }
        else
        {
            return redirect()->back();
        }
        
    }
}
