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

<form action="">
    <input type="text" name="bname" placeholder="请输入关键字">
    <input type="submit" value="搜索">
</form>

<table class="table table-striped">
    <thead>
    <tr>
        <th>序号</th>
        <th>品牌名称</th>
        <th>品牌网址</th>
        <th>品牌logo</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $v)
        <tr>
            <td>{{$v->bid}}</td>
            <td>{{$v->bname}}</td>
            <td>{{$v->burl}}</td>
            <td>@if($v->bimg)<img src="{{env('UPLOAD_URL')}}{{$v->bimg}}" height="50" width="50">@endif</td>
            <td>
               <a href="javascript:;" onclick="del({{$v->bid}})" class="btn btn-danger">删除</a>
               <a href="{{url('/brand/edit/'.$v->bid)}}" class="btn btn-default">修改</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<tr><td>{{$data->links()}}</td></tr>
</body>
<script src="/static/js/jquery.min.js"></script>

<script>
    function del(bid){
        if(!bid){
            return;
        }
        if(confirm('是否删除')){
            $.get("/brand/destroy/"+bid,function(res){
                if(res.code="00000"){
                    location.reload();
                }
            },'json')
        }
    }
</script>
</html>
