@foreach ($todos as $todo)
    <p>
    	{{ $todo->id.".".$todo->title }}
   	    <form action="todo/{{ $todo->id }}" method="post">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<input type="submit" value="Delete">
		</form>	
		<a href="insertone/{{ $todo->id }}">Updata</a>
	</p>
@endforeach

<form action="/laravel/todo" method="post">
	{{ csrf_field() }}
	<input type="text" placeholder="輸入文字" name="title">
	<input type="submit">
</form>	