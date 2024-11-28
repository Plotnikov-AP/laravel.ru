<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CommentLike;

class CommentLikeController extends Controller
{
    public static function get_comment_like($id_comment, $str) {
        switch ($str) {
            case 'yes':
                return CommentLike::where('id_comment', '=', $id_comment)
                ->where('yes', '=', 1)
                ->count();
                break;
            case 'no':
                return CommentLike::where('id_comment', '=', $id_comment)
                ->where('no', '=', 1)
                ->count();
                break;
            default: throw new Exception('В функцию get_comment_like поданы некорректные входные данные');

        }
    }

    public static function api_get_comment_like_count_yes_no($id_comment) {
        $yes=self::get_comment_like($id_comment, 'yes');
        $no=self::get_comment_like($id_comment, 'no');
        return [$yes, $no];
    }

    public function comments_like(Request $request) {
        // print_r($request->post());
        //валидация полученных данных
        $validated = $request->validate([
            'data.id_chat' => 'required|numeric',
            'data.id_comment' => 'required|numeric',
            'data.id_user'=> 'required|numeric',
            'data.yes' => 'required|boolean',
            'data.no' => 'required|boolean'
        ]);
        // print_r($validated);
        $id=DB::table('comment_likes')
        ->select('id')
        ->where('id_chat', '=', $validated['data']['id_chat'])
        ->where('id_comment', '=', $validated['data']['id_comment'])
        ->where('id_user', '=', $validated['data']['id_user'])
        ->first()->id?? 0;
        if (!$id) {
            $id=CommentLike::all()->count();
            $id++;
        }
        $result=DB::table('comment_likes')
        ->upsert(
            [
                ['id'=> $id, 'id_chat' => $validated['data']['id_chat'], 'id_comment' => $validated['data']['id_comment'], 'id_user' => $validated['data']['id_user'], 'yes' => $validated['data']['yes'], 'no' => $validated['data']['no']]
            ],
            ['id'],
            ['yes', 'no']
        );
    }
}
