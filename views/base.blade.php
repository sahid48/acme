<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('browsertitle')Acme</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/style.css">

  @yield('css')

</head>

<body>

  @include('topnav')

  @yield('outsidecontainer')

  <div class="container">

    <div class="row">
      <br><br><br>
    </div>


  @yield('content')



  </div>

  <div class="row footer-background">

    <div class="col-md-3">
        <div class="padding-left-8px pull-right">
          <h4>Contact Us </h4>
          Fuglevej 100 st th <br>
          2400 Copenhagen Nv <br>
          Denmark <br>
          +45(1234) 1234-5678
        </div>
    </div>
    <div class="col-md-6">

    </div>
    <div class="col-md-3">

    </div>

  </div>




  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  @yield('bottomjs')


</body>

</html>
