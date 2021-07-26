<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>{{$front_config['title']}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
	<header aling='center'>
        <div class="justify-content-center">					
			<h1 class="logo image">
				<a href="/"  role="bookmark" data-content-field="site-title">
					<span class="placed-logo-image">
                        <img src="{{asset('public/midia/image/final-01.png')}}" width="430px" height="135" />
                    </span>
				</a>
			</h1>
			<p class="site-tagline" data-content-field="site-tagline">
                {{$front_config['subtitle']}}
            </p>
			<div id="navBlock" role="navigation">
                <div id="injectHead"></div>
                    <div id="injectHead">
                        <p aling="center">
                            @yield('content_header1')
                        </p>
                        <p>
                            @yield('content_header2')
                        </p>
                        <p>
                            @yield('content_header3')
                        </p>
                    </div>       
                    <nav class="navbar navbar-light bg-light justify-content-center " style="background-color: #fffff, background-text: #000000">
                        <ul class="nav justify-content-center">
                            @foreach($front_menu as $menuslug=>$menutitle)
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{$menuslug}}" >{{$menutitle}}</a>
                            </li>
                            @endforeach
                        </tr>  
                    </nav>
				</div>
            </div>
        </div>
    </header>
</body>
</html>