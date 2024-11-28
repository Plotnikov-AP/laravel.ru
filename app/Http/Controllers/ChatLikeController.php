<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatLike;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MainController;

class ChatLikeController extends Controller
{
    public function chats_like(Request $request) {
        print_r($request->post());
        //валидация полученных данных
        $validated = $request->validate([
            'data.id_chat' => 'required',
            'data.id_user'=> 'required',
            'data.yes' => 'required',
            'data.no' => 'required'
        ]);
        print_r($validated);
        $id=1000000*$validated['data']['id_chat'].$validated['data']['id_user'];
        $result=DB::table('chat_likes')
        ->upsert(
            [
                ['id' => $id, 'id_chat' => $validated['data']['id_chat'], 'id_user' => $validated['data']['id_user'], 'yes' => $validated['data']['yes'], 'no' => $validated['data']['no']]
            ],
            ['id'],
            ['yes', 'no']
        );
    }

    public function api_get_chats_like_count_yes_no($id_chat) {
        $yes=MainController::get_chat_like($id_chat, 'yes');
        $no=MainController::get_chat_like($id_chat, 'no');
        return [$yes, $no];
    }
}
