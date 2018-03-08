<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Chat;
use App\User;

class ChatBoxController extends Controller
{
    public function index() {
      $dummy = Chat::select('user_id')->distinct()->get();
      $data['chat_users'] = array();
      foreach ($dummy as $dumm) {
          $temp = User::find($dumm->user_id);
          array_push($data['chat_users'], $temp);
      }

      if (isset($_GET['user'])) {
          $data['sender'] = $_GET['user'];
          $chats = Chat::select('partner_id')
                       ->where('user_id', $data['sender'])
                       ->distinct()
                       ->get();
          $data['receivers'] = array();
          foreach ($chats as $chat) {
            array_push($data['receivers'], User::find($chat->partner_id));
          }
      }
    	return view('admin.chatbox.index', $data);
    }

    public function find() {
        $sender = $_GET['sender'];
        $receiver = $_GET['receiver'];
        $data['sender'] = User::find($sender);
        $data['receiver'] = User::find($receiver);
        $data['chats'] = Chat::where('user_id', $sender)
                            ->orWhere('partner_id', $receiver)
                            ->orWhere('partner_id', $sender)
                            ->orWhere('user_id', $receiver)
                            ->get();
        
        return view('admin.chatbox.find', $data);
    }
}
