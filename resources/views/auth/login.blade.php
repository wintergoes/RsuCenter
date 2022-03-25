<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Rsu管理后台登录</title>
</head>

<body class="bg-login">

<script>
function login(){
    if($('#username').val() === ""){
        alert("请输入用户名！");
        $('#username').focus();
        return;
    }
    
    if($('#password').val() === ""){
        alert("请输入密码！");
        $('#password').focus();
        return;
    }    
    
    $("#loginform").submit();
}

function KeyDown()
{
  if (event.keyCode === 13)
  {
    login();
  }
}
</script>





<form class="form-horizontal" id="loginform" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							RSU管理后台
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">管理登录</h3>
										</p>
									</div>
									<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
										<hr/>
									</div>
                <div class="tip" style="color: red;">
                    @include('common.errors')   
                </div>                                                                    
									<div class="form-body">
										<form class="row g-3">
											<div class="col-12 mb-4">
												<label for="inputEmailAddress" class="form-label">用户名</label>
                                                                                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" onkeydown="KeyDown()" required autofocus placeholder="请输入用户名">
											</div>
											<div class="col-12 mb-4">
												<label for="inputChoosePassword" class="form-label">密码</label>
												<div class="input-group" id="show_hide_password">
                                                                                                    <input id="password" type="password" class="form-control border-end-0" name="password" required onkeydown="KeyDown()" placeholder="请输入密码">
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" onclick="login();" tabindex="3"><i class="bx bxs-lock-open"></i>登录</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>


</form>









    
    
    
<div class="login">
    <div class="box png">
        <div class="logo png"></div>

        <div class="input">
            <div class="log">
                <div class="name">
                    <label>用户名</label>
                    <input id="username" type="username" class="text" name="username" value="{{ old('username') }}" onkeydown="KeyDown()" required autofocus>

                </div>
                <div class="pwd">
                    <label>密　码</label>
                    
                    <input id="password" type="password" class="text" name="password" required onkeydown="KeyDown()">

                    
                    <input type="button" class="submit" onclick="login();" tabindex="3" value="登录">
                    <div class="check"></div>
                </div>
                <div class="tip" style="color: red;">
                    @include('common.errors')   
                </div>
            </div>
        </div>
	</div>
    <div class="footer"></div>
</div>

	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>