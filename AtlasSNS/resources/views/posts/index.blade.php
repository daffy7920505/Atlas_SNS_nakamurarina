@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
<div>
  <form action="/post" method="post"><!--actionのURLをweb.phpに行く-->
    {{csrf_field()}}
    <textarea name="text" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="投稿">
  </form>
</div>
@foreach($list as $list)
<tr>
  <td>{{ $list->id }}</td>
  <td>{{ $list->post }}</td>
  <td>{{ $list->created_at }}</td>
  <td><a class="btn btn-primary" href="/post/{{$list->id}}/update">更新</a></td>
  <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除を削除します。よろしいでしょうか？')">削除</a></td>
</tr>
@endforeach

@endsection
