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
<div class="table-responsive">
  <form>
  <input type="text" name="g_name" value="{{$g_name}}"   placeholder="请输入商品名称">
  <input type="submit" value="搜索">
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>商品</th>
        <th>分类</th>
        <th>品牌</th>
        <th>管理员</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="{{url('goods')}}"></a></td>
        <td><a href="{{url('cate')}}"></a></td>
        <td><a href="{{url('brand')}}"></a></td>
        <td><a href="{{url('user')}}"></a></td>
      </tr>
    </tbody>
  </table>
</div>
</center>
</body>
</html>
