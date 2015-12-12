@extends('base')

@section('browsertitle')Acme: Login @stop

@section('content')

    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <h1>Login</h1>

        <hr>

        <form id="registerform" name="registerform" class="form-horizontal">

          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="username" value="" class="form-control required email" id="email" placeholder="user@example.com">
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" value="" class="form-control required" id="password" placeholder="Password">
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" name="button">Sign In</button>
            </div>
          </div>
        </form>

        <div class="col-sm-offset-2">
          <button class="btn btn-primary" onclick="location.href='/register';">Register Your Self</button>
        </div>

      </div>

      <div class="col-md-2">
        <div class="col-sm-offset-2">
          <button class="btn btn-primary" onclick="location.href='/register';">Register Your Self</button>
        </div>
      </div>
    </div>
    <br><br>
  @stop

  @section('bottomjs')

  <script>

    $(document).ready(function() {

      $("#registerform").validate({

        rules: {

          email: {
            required: true,
            email: true
          },
          password: {
            //accept: "[a-zA-Z]+"
            minlength: 4
          }
        },

        highlight: function(element, errorClass) {

    }

      });
    });

  </script>

  @stop
