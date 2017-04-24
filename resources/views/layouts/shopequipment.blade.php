<form class="form-horizontal" role="form" method="POST" action="/equipment/shop" @submit.prevent="addtocart($event)" id="shopequipment{{$equipment->id}}">
    {{ csrf_field() }}



    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">名字</label>

        <div class="col-md-6">
            <input readonly="" id="name" type="text" class="form-control" name="name" value="{{ $equipment->name }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
        <label for="quantity" class="col-md-4 control-label">存量</label>

        <div class="col-md-6">
            <textarea name="quantity" readonly="" id="quantity" class="form-control" cols="30" rows="10" >{{$equipment->quantity}}</textarea>

            @if ($errors->has('quantity'))
                <span class="help-block">
                    <strong>{{ $errors->first('quantity') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        <label for="price" class="col-md-4 control-label">价格</label>

        <div class="col-md-6">
            <textarea name="price" readonly="" id="price" class="form-control" cols="30" rows="10" >{{$equipment->price}}</textarea>

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('bquantity') ? ' has-error' : '' }}">
        <label for="bquantity" class="col-md-4 control-label">购买量</label>

        <div class="col-md-6">
            <input id="bquantity" type="text" class="form-control" name="bquantity" value="{{ $equipment->bquantity }}" required autofocus>

            @if ($errors->has('bquantity'))
                <span class="help-block">
                    <strong>{{ $errors->first('bquantity') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                加入购物车
            </button>
        </div>
    </div>
    
</form>

