@extends('layouts.app')

@section('content')
<ul class="nav nav-pills">
  <li role="presentation" ><a href="/home">票务销售区</a></li>
  <li role="presentation"><a href="/equipment">装备销售区</a></li>
  <li role="presentation" ><a href="/stuff">食物销售区</a></li>
  <li role="presentation" class="active"><a href="/cart">购物车区</a></li>
  <li role="presentation" ><a href="/customer">顾客消费记录</a></li>
  <li role="presentation" data-target="#add_service" data-toggle="modal"><a href="#">添加票务</a></li>
  <li role="presentation" data-target="#add_stuff" data-toggle="modal"><a href="#">添加食物</a></li>
  <li role="presentation" data-target="#add_equipment" data-toggle="modal"><a href="#">添加装备</a></li>

</ul>


<form action="/search" method="post">
  {{csrf_field()}}
  <div class="input-group">
    <input type="search" class="form-control" name="search">
    <span class="input-group-btn"><button class="btn btn-primary">搜索客户</button></span>
  </div>
  
</form>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>顾客姓名</th>
      <th>商品名称</th>
      <th>商品数量</th>
    </tr>
  </thead>
  <tbody>
  @foreach($customers as $customer)
    <tr>
      <th>{{$customer->username}}</th>
      <th>{{$customer->name}}</th>
      <th>{{$customer->quantity}}</th>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection