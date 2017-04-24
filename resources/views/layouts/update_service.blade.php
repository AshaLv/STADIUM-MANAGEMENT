<form class="form-horizontal" role="form" method="POST" action="/service/update">
    {{ csrf_field() }}
 <input type="text" name="id" style="display: none" value="{{$service->id}}">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">名字</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ $service->name }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
        <label for="quantity" class="col-md-4 control-label">数量</label>

        <div class="col-md-6">
            <textarea name="quantity" id="quantity" class="form-control" cols="30" rows="10" >{{$service->quantity}}</textarea>

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
            <textarea name="price" id="price" class="form-control" cols="30" rows="10" >{{$service->price}}</textarea>

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                发布
            </button>
        </div>
    </div>
    
</form>

