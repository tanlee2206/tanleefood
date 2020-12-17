<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="asset/customer/css/style_login.css">
	<title>
		Tanlee food
	</title>
</head>

<body>
	<div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
                <form  action="{{route('register')}}" method="post">
                    @csrf
				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" name="login_name" placeholder="tên đăng nhập">
						</div>
						<div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input type="email"  name="email" placeholder="Email">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" " name="password" placeholder="mật khẩu">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name="re_password" placeholder="nhập lại mật khẩu">
						</div>
						<button type="submit">
							Đăng ký
						</button>
						<p>
							<span>
								bạn đã có tài khoản?
							</span>
							<b onclick="toggle()" class="pointer">
								đăng nhập ở đây
							</b>
						</p>
					</div>
				</div>
				<div class="form-wrapper">
					<div class="social-list align-items-center sign-up">
						<a href="{{route('login.google')}}" class="align-items-center facebook-bg">
							<i class='bx bxl-facebook'></i>
						</a>
						<a href="{{route('login.google')}}" class="align-items-center google-bg">
							<i class='bx bxl-google'></i>
						</a>
						<a href="{{route('login.google')}}" class="align-items-center twitter-bg">
							<i class='bx bxl-twitter'></i>
						</a>
						<a href="{{route('login.google')}}" class="align-items-center insta-bg">
							<i class='bx bxl-instagram-alt'></i>
						</a>
					</div>
                </div>
                </form>
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
                <form  action="{{route('login')}}" method="post">
                    @csrf
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" name="email" placeholder="email">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" name="password" placeholder="mật khẩu">
						</div>
						<button type="submit">
							Đăng nhập
						</button>
						<p>
							<b>
								quên mật khẩu
							</b>
						</p>
						<p>
							<span>
								chưa có tài khoản?
							</span>
							<b onclick="toggle()" class="pointer">
								đăng ký ở đây
							</b>
						</p>
					</div>
				</div>
				<div class="form-wrapper">
					<div class="social-list align-items-center sign-in">
						<a href="{{route('login.google')}}" class="align-items-center facebook-bg">
							<i class='bx bxl-facebook'></i>
						</a>
						<a href="{{route('login.google')}}" class="align-items-center google-bg">
							<i class='bx bxl-google'></i>
						</a>
						<a href="{{route('login.google')}}" class="align-items-center twitter-bg">
							<i class='bx bxl-twitter'></i>
						</a>
						<a href="{{route('login.google')}}" class="align-items-center insta-bg">
							<i class='bx bxl-instagram-alt'></i>
						</a>
					</div>
                </div>
                </form>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						TanLee Food
					</h2>
					<p>
                        Chào mừng bạn trở lại hãy đăng nhập để thực hiện nhiều chức năng khác của website và nhận nhiều ưu đãi khác
					</p>
				</div>
				<div class="img sign-in">
					<img src="asset/customer/images/undraw_different_love_a3rg.svg" alt="welcome">
                </div>
              
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
					<img src="asset/customer/images/undraw_creative_team_r90h.svg" alt="welcome">
                </div>
               
				<div class="text sign-up">
					<h2>
						Tanlee Food
					</h2>
					<p>
                        Hãy tạo một tài khoản để có thể đăng nhập vào website
                        cùng nhau khám phá những món ăn ngon.
					</p>
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>

	<script src="asset/admin/js/login.js"></script>
</body>

</html>