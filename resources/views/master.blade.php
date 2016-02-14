<html>
<head>
<title>Library</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<style type="text/css">
body{
	background: url("{{asset('images/library.jpg')}}") no-repeat center center fixed;
	background-size: 100% auto;
	}
	header{opactity:0.7;}
	footer{background-color:#fff;opacity:0.9;text-align:center;}
</style>
</head>
<body>
<header class="jumbotron">
<div class="container">
	<div class="col-md-10">
		<h1>The Bookstore!</h1>
	    <p>Reading a good bookis like taking a journey.</p>
		<div class="col-md-2">
			Date : {{$date}} <br>Time : {{$time}}   <!--   <?php # echo htmlentities($date); ?>   -->
		</div>
	</div>
	
</div>
</header>


@yield('content')

<footer class="container">
	&copy; All Right Reserved for Ahmed Anter - 2016
</footer>
</body>
</html>