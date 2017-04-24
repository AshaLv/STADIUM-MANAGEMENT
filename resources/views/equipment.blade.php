@extends('layouts.app')

@section('content')
<ul class="nav nav-pills">
  <li role="presentation" ><a href="/home">票务销售区</a></li>
  <li role="presentation" class="active"><a href="/equipment">装备销售区</a></li>
  <li role="presentation" ><a href="/stuff">食物销售区</a></li>
  <li role="presentation" ><a href="/cart">购物车区</a></li>
  <li role="presentation" ><a href="/customer">顾客消费记录</a></li>
  <li role="presentation" data-target="#add_equipment" data-toggle="modal"><a href="#">添加票务</a></li>
  <li role="presentation" data-target="#add_stuff" data-toggle="modal"><a href="#">添加食物</a></li>
  <li role="presentation" data-target="#add_equipment" data-toggle="modal"><a href="#">添加装备</a></li>

</ul>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>装备区</th>
      <th>价格</th>
      <th>数量</th>
      <th>删除</th>
      <th>修改</th>
      <th>购物</th>
    </tr>
  </thead>
  <tbody>
  @foreach($equipments as $equipment)
    <tr>
      <td data-target="#{{$equipment->id}}" data-toggle="modal" style="cursor: pointer;">{{$equipment->name}}</td>
      <div class="modal fade" id="{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <td>{{$equipment->price}}￥</td>
      <td>{{$equipment->quantity}}</td>
      <td>
      <form action="/equipment/delete" method="post">
      {{csrf_field()}}
      <input type="text" name="id" style="display: none" value="{{$equipment->id}}">
      <button class="btn btn-primary" type="submit">删除</button>
      </form>
      </td>
       <td>
       <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#update{{$equipment->id}}">编辑</button>
             <div class="modal fade" id="update{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="position: absolute;width: 600px">
              <div class="modal-body" >
                    @include('layouts.update_equipment')
              </div>
            </div>
          </div>
        </div>
      </td>
      <td>
       <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#shop{{$equipment->id}}">购物</button>
             <div class="modal fade" id="shop{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="position: absolute;width: 600px">
              <div class="modal-body" >
                    @include('layouts.shopequipment')
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>

    
  @endforeach
  </tbody>
</table>

{{$equipments->links()}}

@endsection
