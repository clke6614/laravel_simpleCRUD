<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; //Model會自動對應到Database資料表

class TodoController extends Controller
{
   public function index(){
   	$todos = Todo::all();
    //dd($todos);
   	return view('todo/index',[
   		'todos' => $todos
   	]);
   }
   public function insert(Request $request){
   	//$todo = new Todo();
   	//$todo->title = $request->title;
   	//$todo->save();

   	$todo = Todo::create([
   		'title' => $request->title,
   	]);
   	return redirect('todo');
   }
    public function insertone(Request $request, $todo){
      return view('todo/insertone',[
         'todo' => $todo
      ]);
    }
   public function destroy(Request $request, Todo $todo){
      //dd($todo); Todo $todo 抓取資料表中$todo這筆的資料
   	$todo->delete();  //extends model他寫好的中的方法
   	return redirect('todo'); //導回首頁
   }
   public function update(Request $request,$id){
      //dd($id); id為url後所代的值
      $data = $request->all(); //和HTML請求(request)的資料
      //$name = $request->input('name'); //請求單筆名子為name的資料
      Todo::find($id)->update($data);
      return redirect('todo'); //導回首頁
   }
}
