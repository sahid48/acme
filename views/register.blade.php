@extends('base')

@section('browsertitle')Acme: Register @stop

@section('content')

    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <h1>Register</h1>

        @include('errormessage')

        <hr>

        <form action="register" method="post" id="registerform" name="registerform" class="form-horizontal">

          <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}">

          <div class="form-group">
            <label for="first_name" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="first_name" value=""
               class="form-control required" id="first_name" placeholder="First Name">
            </div>
          </div>

          <div class="form-group">
            <label for="last_name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="last_name" value=""
              class="form-control required" id="last_name" placeholder="Last Name">
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" value=""
               class="form-control required email" id="email" placeholder="user@example.com">
            </div>
          </div>

          <div class="form-group">
            <label for="verify_email" class="col-sm-2 control-label">Verify Email</label>
            <div class="col-sm-10">
              <input type="email" name="verify_email" value=""
               class="form-control" id="verify_email" placeholder="user@example.com">
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" value="" class="form-control required" id="password" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <label for="verify_password" class="col-sm-2 control-label">Verify Password</label>
            <div class="col-sm-10">
              <input type="password" name="verify_password" value="" class="form-control" id="verify_password" placeholder="Verify Password">
            </div>
          </div>

          <hr>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" name="button">Register</button>
            </div>
          </div>


        </form>
      </div>
      <div class="col-md-2">

      </div>
    </div>

    @stop

    @section('bottomjs')

    <script>
      /*
          use java script
          put this code to form tag  <form name="registerform" class="form-horizontal" onsubmit="return validate()">
          //alert("Hello");
          function validate()
          {
            if (document.registerform.first_name.value == "") {
              alert("You must enter a First Name");
              //return false;
              break false;
            }
            return true;
          }
          */
      $(document).ready(function() {
        //console.log("Hello");     //checking jquery is working or not
        //registerform is a id in form tag
        $("#registerform").validate({
          //debug: false,
          //errorClass: "authError",
          //errorElement: "span",

          rules: {
            first_name: {
              //accept: "[a-zA-Z]+"
              minlength: 2,
              lettersonly: true
            },
            verify_email: {
              required: true,
              email: true,
              equalTo: "#email"
            },
            password: {
              //accept: "[a-zA-Z]+"
              minlength: 4
            },
            verify_password: {
              required: true,
              equalTo: "#password"
            }
          },
          //this below statement removes error class from input
          //also unhighlight
          highlight: function(element, errorClass) {
            //console.log($(element));
          //$(element).removeClass(errorClass);
          //console.log($(element));
      }

        });
      });

      $.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      }, "Letters only please");

    </script>

    @stop
