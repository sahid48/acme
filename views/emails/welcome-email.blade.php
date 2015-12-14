@extends('emails.base-email')

@section('body')
<P>
  Welcome To Acme!
</p>

<p>
  Please <a href="{!! getenv('HOST') !!}/verify-account?token={!! $token !!}">click here to activate</a> your account.
@stop
