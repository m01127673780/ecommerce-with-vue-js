@component('mail::message')
# Introduction
Welcome {{$data['data']->name}} (: 
The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click Here To Reset Your Password
@endcomponent
<img src="http://kolaclan.com/Business/images/commerce.png">
Thanks,<br>
{{ config('app.name') }}
@endcomponent
