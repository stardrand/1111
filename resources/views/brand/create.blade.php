<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="{{url('/brand/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌名称：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="" name="bname" placeholder="请输入品牌名称">
            <b style="color: red">{{$errors->first('bname')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌网址：</label>
        <div class="col-sm-3">
            <input type="type" class="form-control" id="" name="burl" placeholder="请输入品牌网址">
            <b style="color: red">{{$errors->first('burl')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">品牌logo：</label>
        <div class="col-sm-3">
            <input type="file" name="bimg">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
</body>
</html>
