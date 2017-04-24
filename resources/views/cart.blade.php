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

<table class="table table-bordered">
  <thead>
    <tr>
      <th>商品名称</th>
      <th>商品数量</th>
      <th>商品价格</th>
      <th>删除</th>
    </tr>
  </thead>
  <tbody>
   
  </tbody>
  <tfoot>
    <tr>
      <td></td>
      <td>总价：</td>
      <td></td>
      <td></td>
    </tr>
  </tfoot>
</table>
<form action="/finishcart" method="post" class="form-horizontal" onsubmit='clearstorage(event)'>
{{csrf_field()}}
  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="col-md-4 control-label">购买者姓名</label>
  
    <div class="col-md-6">
    <input type="text" name="username" class="form-control">
  
    @if ($errors->has('username'))
        <span class="help-block">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
    @endif
    </div>
  </div>

  <input type="text" style="display: none" id="stuffs" name="stuffs">
  <div style="text-align: right;margin-right: 40px" ><input class="btn btn-primary" type="submit" value="确认购买" ></div>
</form>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script>


  var priceone=0;
  var stuffs ='';
  for (var i = sessionStorage.length - 1; i >= 0; i--) {
    var key=sessionStorage.key(i);
    var valueh = sessionStorage.getItem(key);
    var array = valueh.split(',');
    let price =Number(array[2])*Number(array[1]);
    $('tbody').append('<tr class='+i+'><td>'+array[0]+'</td><td>'+array[1]+'</td><td>'+price+'￥</td><td><button class="btn btn-primary" onclick="deletestuffincart('+key+')">删除</button></td></tr>');
    priceone += Number(array[2])*Number(array[1]);
    if(i>0){
      stuffs += valueh+';';
    }
    else{
      stuffs += valueh;
    }
  }
  $('tfoot tr td:nth-child(3)').text(priceone+'￥');

  $('#stuffs').val(stuffs);


  

function deletestuffincart(id){
    sessionStorage.removeItem(id);
    window.location.reload(true);
  }
function clearstorage(event){
    event.preventDefault();
    sessionStorage.clear();
    $('#stuffs').val(stuffs);
    event.target.submit();
  }
</script>
@endsection