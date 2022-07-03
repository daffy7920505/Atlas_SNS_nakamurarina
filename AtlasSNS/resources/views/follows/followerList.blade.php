@extends('layouts.login')

@section('content')
<form class="form-inline" action="{{url('/FollowerList')}}" method="POST">

@foreach($list as $list)
<p>投稿内容:{{$list1->post}}</p>
@endforeach
  @endsection
