@extends('layouts.login')

@section('content')
<form class="form-inline" action="{{url('/FollowList')}}" method="POST">

@foreach($list as $list)
<p>投稿内容:{{$list->post}}</p>
@endforeach
@endsection
