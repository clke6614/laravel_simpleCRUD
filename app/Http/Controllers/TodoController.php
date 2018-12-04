<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

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
   public function destroy(Request $request, Todo $todo){
   	$todo->delete();
   	return redirect('todo');
   }
}
