<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    //===================================================
    public function sent_message(Request $request)
    {
        $messagesave    = new Message;
        $sender_id      = Auth::user()->id;
        $receiver_id    = $request->receiver_id;
        $message        = $request->message;
        $messagesubject = $request->subject;
        $messagefile    = $request->file('file');
        $filename       = time() . '.' . $messagefile->getClientOriginalExtension();
        $request->file('file')->move('assets/messages', $filename);

        $messagesave->sender_id          = $sender_id;
        $messagesave->receiver_id        = $receiver_id;
        $messagesave->message            = $message;
        $messagesave->message_subject    = $messagesubject;
        $messagesave->upload_file        = $filename;
        $messagesave->delete_at_sender   = 0;
        $messagesave->delete_at_receiver = 0;
        $messagesave->read_message       = 0;
        $messagesave->message_sent_time  = Carbon::now();
        $messagesave->starred_message    = 0;
        $messagesave->save();
        if ($messagesave) {
            $messagestatus = "Message Sent Successfully to " . $request->receiver;
        } else {
            $messagestatus = "Message Failed";
        }
        return redirect('/messages')->with(['messagestatus' => $messagestatus]);
    }


    //===================================================
    public function read_message($id)
    {
        $read = Message::where('id', $id)->first();
        $read->read_message = 1;
        $read->update();
        if ($read) {
            $messagestatus = "Message Sent Successfully to ";
        } else {
            $messagestatus = "Message Failed";
        }
        return redirect('/messages')->with(['messagestatus' => $messagestatus]);
    }


    //===================================================
    public function unread_message($id)
    {
        $read = Message::where('id', $id)->first();
        $read->read_message = 0;
        $read->update();
        if ($read) {
            $messagestatus = "Message Sent Successfully to ";
        } else {
            $messagestatus = "Message Failed";
        }
        return redirect('/messages')->with(['messagestatus' => $messagestatus]);
    }


    //===================================================
    public function star_message($id)
    {
        $read = Message::where('id', $id)->first();
        $read->starred_message = 1;
        $read->update();
        if ($read) {
            $messagestatus = "Message Sent Successfully to ";
        } else {
            $messagestatus = "Message Failed";
        }
        return redirect('/messages')->with(['messagestatus' => $messagestatus]);
    }


    //===================================================
    public function unstar_message($id)
    {
        $read = Message::where('id', $id)->first();
        $read->starred_message = 0;
        $read->update();
        if ($read) {
            $messagestatus = "Message Sent Successfully to ";
        } else {
            $messagestatus = "Message Failed";
        }
        return redirect('/messages')->with(['messagestatus' => $messagestatus]);
    }


    //===================================================
    public function delete_at_sender($id)
    {
        $read = Message::where('id', $id)->first();
        $read->delete_at_sender = 1;
        $read->update();
        if ($read) {
            $messagestatus = "Message Deleted Successfully";
        } else {
            $messagestatus = "Message Failed";
        }
        return redirect('/messages')->with(['messagestatus' => $messagestatus]);
    }


    //===================================================
    public function delete_at_rec($id)
    {
        $read = Message::where('id', $id)->first();
        $read->delete_at_receiver = 1;
        $read->update();
        if ($read) {
            $messagestatus = "Message Deleted Successfully";
        } else {
            $messagestatus = "Message Failed";
        }
        return redirect('/messages')->with(['messagestatus' => $messagestatus]);
    }
}
