<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<title></title>
<link rel="stylesheet" href="asset/customer/css/bootstrap.min.css">
<link rel="stylesheet" href="asset/customer/css/style_login.css">

</head>
<body style="background-image: url('asset/customer/images/bg-02.jpg');background-repeat:no-repeat;background-size:cover; ">
<div class="signup-form" >
    <form  action="{{route('login')}}" method="post">
        @csrf
        <h2>login</h2>
        <!-- <p class="hint-text">Create your account. It's free and only takes a minute.</p> -->
       
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="login name hoặc email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>       
        <div class="form-group">
            <button type="submit" class="btn btn-outline-warning btn-lg btn-block">Đăng nhập</button>
        </div>
         <div class="form-group" ><a style="text-decoration: none;" class="btn btn-primary btn-lg btn-block"  href="">login with Facebook</a> </div>
          <div class="form-group" ><a style="text-decoration: none;" class="btn btn-danger btn-lg btn-block"  href="">login with Google</a> </div>
     
        

    </form>
    <div class="text-center"><a href="">đăng ký</a></div>
</div>
</body>
</html>     