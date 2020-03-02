<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品表</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<center>
  <h1>首页</h1>
<div class="table-responsive">
  <table class="table">
    <tbody>
      <tr>
        <button type="button"><a href="{{url('goods')}}">商品</a></button>
        <button type="button"><a href="{{url('cate')}}">分类</a></button>
        <button type="button"><a href="{{url('brand')}}">品牌</a></button>
        <button type="button"><a href="{{url('user')}}">管理员</a></button>
      </tr>
    </tbody>
  </table>
</div>
</center>
</body>
</html>
