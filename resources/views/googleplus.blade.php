<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
    	<div class="container">
  		<h1>API Consumption Test by Acommerce</h1> <br>
    	<p>Nama: Yuko Pangestu</p>
        @if(!empty(Session::get('access_token')))
        <p>Silahkan pilih kota dibawah untuk dipost ke google Anda</p>
        <p style="color: red;font-weight: bold;">{{Session::get('sukses')}}</p>
        <form action="{{URL::to('post/google')}}" method="post">
            {{ csrf_field() }}
            <select name="kota" id="" class="btn btn-default dropdown-toggle">
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Bekasi">Bekasi</option>
            </select>
            <button type="submit" class="btn btn-primary">Post to google</button>
        </form> <br>
        <button class="btn btn-warning" onclick="window.location = 'auth/google/logout'">Logout google</button>
        @else
        <p>Silahkan klik link dibawah ini untuk login menggunakan google</p>
    	<a href="{{URL::to('auth/google')}}">Login with google</a>
        @endif
  	</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
