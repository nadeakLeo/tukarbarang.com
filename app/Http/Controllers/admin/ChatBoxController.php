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

    	return view('admin.chatbox.index', $data);
    }

    public function find() {
        $id = $_GET['id'];
        $data['chats'] = Chat::where('user_id', $id)->orWhere('partner_id', $id)
                                                    ->get();
        $data['sender'] = $id;
        return view('admin.chatbox.find', $data);
    }
}
