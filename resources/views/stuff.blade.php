@extends('layouts.app')

@section('content')
<ul class="nav nav-pills">
  <li role="presentation" ><a href="/home">票务销售区</a></li>
  <li role="presentation" ><a href="/equipment">装备销售区</a></li>
  <li role="presentation" class="active"><a href="/stuff">食物销售区</a></li>
  <li role="presentation" ><a href="/cart">购物车区</a></li>
  <li role="presentation" ><a href="/customer">顾客消费记录</a></li>
  <li role="presentation" data-target="#add_service" data-toggle="modal"><a href="#">添加票务</a></li>
  <li role="presentation" data-target="#add_stuff" data-toggle="modal"><a href="#">添加食物</a></li>
  <li role="presentation" data-target="#add_equipment" data-toggle="modal"><a href="#">添加装备</a></li>

</ul>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>食物区</th>
      <th>价格</th>
      <th>数量</th>
      <th>删除</th>
      <th>修改</th>
      <th>购物</th>
    </tr>
  </thead>
  <tbody>
  @foreach($stuffs as $stuff)
    <tr>
      <td data-target="#{{$stuff->id}}" data-toggle="modal" style="cursor: pointer;">{{$stuff->name}}</td>
      <div class="modal fade" id="{{$stuff->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <td>{{$stuff->price}}￥</td>
      <td>{{$stuff->quantity}}</td>
      <td>
      <form action="/stuff/delete" method="post">
      {{csrf_field()}}
      <input type="text" name="id" style="display: none" value="{{$stuff->id}}">
      <button class="btn btn-primary" type="submit">删除</button>
      </form>
      </td>
       <td>
       <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#update{{$stuff->id}}">编辑</button>
             <div class="modal fade" id="update{{$stuff->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="position: absolute;width: 600px">
              <div class="modal-body" >
                    @include('layouts.update_stuff')
              </div>
            </div>
          </div>
        </div>
      </td>

      <td>
       <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#shop{{$stuff->id}}">购物</button>
             <div class="modal fade" id="shop{{$stuff->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="position: absolute;width: 600px">
              <div class="modal-body" >
                    @include('layouts.shopstuff')
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{$stuffs->links()}}

@endsection
