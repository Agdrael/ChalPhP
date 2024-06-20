<!DOCTYPE html>
<html lang="en" <head>
<meta charset="utf-8" />
<title>Chaleco</title>

<head>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ================== BEGIN core-css ================== -->
	<link href="../assets/css/vendor.min.css" rel="stylesheet" />
	<link href="../assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->

</head>

<body>
	<!-- BEGIN #app -->
	<div id="app" class="app">
		<!-- BEGIN login -->
		<div class="login login-with-news-feed">
			<!-- BEGIN news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url(../assets/img/login-bg/Chaleco-bg-1.jpeg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>Chaleco</b></h4>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, modi ducimus labore voluptatem accusamus
					</p>
				</div>
			</div>
			<!-- END news-feed -->

			<!-- BEGIN login-container -->
			<div class="login-container">
				<!-- BEGIN login-header -->
				<div class="login-header mb-30px">
					<div class="brand">
						<div>
							<b>Chaleco</b> Admin
						</div>
						<small>Rigoberto estuvo aqui</small>
					</div>
					<div class="icon">
						<i class="fa fa-sign-in-alt"></i>
					</div>
				</div>
				<!-- END login-header -->

				<!-- BEGIN login-content -->
				<div class="login-content">
					<form action="../M/inicioSesion.php" method="POST" class="fs-13px">
						<div class="form-floating mb-15px">
							<input type="text" class="form-control h-45px fs-13px" placeholder="Usuario" id="Usuario" name="user" />
							<label for="emailAddress" class="d-flex align-items-center fs-13px @@if(context.theme != 'transparent'){text-gray-600}@@if(context.theme == 'transparent'){text-gray-300}">Email Address</label>
						</div>
						<div class="form-floating mb-15px">
							<input type="password" class="form-control h-45px fs-13px" placeholder="Password" id="password" name="password" />
							<label for="password" class="d-flex align-items-center fs-13px @@if(context.theme != 'transparent'){text-gray-600}@@if(context.theme == 'transparent'){text-gray-300}">Password</label>
						</div>
						<div class="form-check mb-30px">
							<input class="form-check-input" type="checkbox" value="1" id="rememberMe" />
							<label class="form-check-label" for="rememberMe">
								Remember Me
							</label>
						</div>
						<div class="mb-15px">
							<button type="submit" onclick="Iniciar_Sesion()" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px">Sign me in</button>
						</div>
						<div class="mb-40px pb-40px @@if(context.theme != 'transparent'){text-dark}@@if(context.theme == 'transparent'){text-white}">
							Not a member yet? Click <a href="register_v3.html" class="text-primary">here</a> to register.
						</div>
						<hr class="bg-gray-600 opacity-2" />
						<div class="@@if(context.theme != 'transparent'){text-gray-600}@@if(context.theme == 'transparent'){text-gray-300} text-center @@if(context.theme == 'transparent'){text-white bg-opacity-50} mb-0">
							&copy; Color Admin All Right Reserved 2024
						</div>
					</form>
				</div>
				<!-- END login-content -->
			</div>
			<!-- END login-container -->
		</div>
		<!-- END login -->

		<!-- BEGIN theme-panel -->
		<div class="theme-panel">
			<a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
			<div class="theme-panel-content" data-scrollbar="true" data-height="100%">
				<h5>App Settings</h5>

				<!-- BEGIN theme-list -->
				<div class="theme-list">
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange" data-theme-class="theme-orange" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
					<div class="theme-list-item@@if(context.theme =='default'){ active}"><a href="javascript:;" class="theme-list-link bg-teal" data-theme-class="@@if(context.theme != 'default'){theme-teal}" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="@@if(context.theme =='default'){Default}@@if(context.theme != 'default'){Teal}">&nbsp;</a>
					</div>
					<div class="theme-list-item@@if(context.theme =='material'){ active}"><a href="javascript:;" class="theme-list-link bg-cyan" data-theme-class="@@if(context.theme != 'material'){theme-cyan}" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="@@if(context.theme =='material'){Default}@@if(context.theme != 'material'){Cyan}">&nbsp;</a>
					</div>
					<div class="theme-list-item@@if(context.theme =='apple' || context.theme =='transparent' || context.theme =='google' || context.theme =='facebook'){ active}">
						<a href="javascript:;" class="theme-list-link bg-blue" data-theme-class="@@if(context.theme != 'apple' && context.theme !='transparent' && context.theme !='google' && context.theme !='google'){theme-blue}" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="@@if(context.theme =='apple' || context.theme =='transparent' || context.theme =='google' || context.theme =='facebook'){Default}@@if(context.theme != 'apple' && context.theme !='transparent' && context.theme !='google' && context.theme !='facebook'){Blue}">&nbsp;</a>
					</div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black" data-theme-class="theme-gray-600" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
				</div>
				<!-- END theme-list -->

				<div class="theme-panel-divider"></div>

				<div class="row mt-10px">
					<div class="col-8 control-label @@if(context.theme != 'transparent') {text-body}@@if(context.theme != 'google'){ fw-bold}">
						<div>Dark Mode <span class="badge bg-primary ms-1 py-2px position-relative" style="top: -1px;">NEW</span></div>
						<div class="lh-14">
							<small class="@@if(context.theme != 'transparent'){text-body}@@if(context.theme == 'transparent'){text-white} opacity-50">
								Adjust the appearance to reduce glare and give your eyes a break.
							</small>
						</div>
					</div>
					<div class="col-4 d-flex">
						<div class="form-check form-switch ms-auto mb-0">
							<input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode" value="1" />
							<label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="theme-panel-divider"></div>
			</div>
		</div>
		<!-- END theme-panel -->
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->

	<!-- ================== BEGIN core-js ================== -->
	<script src="../assets/js/vendor.min.js"></script>
	<script src="../assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	
</body>




