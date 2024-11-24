<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TestWork;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Chat;
use App\Models\Comment;
use Illuminate\Support\Facades\Config;

class MainController extends Controller
{
    public function main() {
        CounterController::setAllCount();
        $sliders = Slider::orderBy('id')->get();
        return view('author', ['sliders'=>$sliders]);
    }

    public function pyatnashki() {
        return view('pyatnashki');
    }

    public function chats() {
        if (Auth::user()->email==Config::get('myconfig.admin_mail')) {
            $chats=Chat::all();
        } else {
            $chats=DB::table('chats')
            ->where('access', '=', '1')
            ->orwhere('author', '=', Auth::user()->name)
            ->get();
        }
        return view('chats', ['chats'=>$chats]);
    }

    public function chat($id) {

        $chat=Chat::find($id);
        $comments=DB::table('comments')
        ->where('id_chat', '=', $id)
        ->get();
        return view('chat', ['chat'=>$chat, 'comments'=>$comments]);
    }

    public function add_chat(Request $request) {
        // print_r($_POST);
        //валидация полученных данных
        $validated = $request->validate([
            'content_chat' => ['required'],
            'author'=> ['required'],
            'access' => ['required']
        ]);
        //валидация пройдена, записываем в БД
    
        // Запись блога корректна ...
        // print_r($validated);
        $chat=new Chat();
        $chat->author=htmlspecialchars($validated['author']);
        $chat->content_chat=htmlspecialchars($validated['content_chat']);
        $chat->access=$validated['access'];
        $chat->save();
        //вернемся на страницу с чатами
        return redirect()->route('chats');
    }

    public function add_comment(Request $request) {
        // print_r($_POST);
        //валидация полученных данных
        $validated = $request->validate([
            'id_chat' => ['required'],
            'author'=> ['required'],
            'content_comment' => ['required']
        ]);
        //валидация пройдена, записываем в БД
    
        // Запись комментария корректна ...
        // print_r($validated);
        $comment=new Comment();
        $comment->id_chat=$validated['id_chat'];
        $comment->author=htmlspecialchars($validated['author']);
        $comment->content_comment=htmlspecialchars($validated['content_comment']);
        $comment->save();
        // //вернемся на страницу с комментариями
        return redirect()->route('chat', ['id'=>$comment->id_chat]);
    }
    
    public function del_comment($id) {
        print_r($_POST);
        $id_chat=$_POST['id_chat'];
        $comment=DB::table('comments')
        ->where('id', '=', $id)
        ->delete();
        return redirect()->route('chat', ['id'=>$id_chat]);
    }
    
    public function testWorks() {
        $testworks=TestWork::all();
        return view('testworks', ['testworks'=>$testworks]);
    }

    public function shop() {
        $products=Product::where('price', '>', 1)
        ->paginate(env('USER_COUNT_ON_PAGE'));
        return view('shop', ['products'=>$products]);
    }

    public function productId($id) {
        $product=Product::find($id);
        return view('productid', ['product'=>$product]);
    }
}
