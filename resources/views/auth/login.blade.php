<html>
<head>
    <title>Login</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="login">
<div class="w3-display-container" style="width: 100%;height: 100%">
    <div class="w3-display-topright">
        <a href="{{route('register')}}"
           class="w3-button w3-yellow w3-hover-orange w3-round w3-margin mh-decoration w3-opacity w3-hover-opacity-off">register</a>
    </div>
    <div class="w3-display-middle w3-quarter">
        <form class="w3-container mh-opacity w3-light-gray w3-padding-large w3-round-medium mh-hover-opacity-off mh-transition w3-animate-zoom"
              method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <label for="email" class="{{ $errors->has('email')? 'w3-text-red': '' }}">Email</label>
            <input id="email" name="email" class="w3-input " placeholder="Email" required autofocus>
            <label for="password" class="{{$errors->has('password')? 'w3-text-red':''}}">Password</label>

            <input id="password" name="password" class="w3-input " placeholder="password" required>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            <div class="w3-center">
                <div class="w3-bar">
                    <button type="submit" class="w3-green w3-btn w3-margin w3-show-block" style="width: 90px;">login
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
