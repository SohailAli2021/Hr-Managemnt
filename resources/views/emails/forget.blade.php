@component('mail::message')
Hello {{$user->name}},
<p>We understand what happens.</p>

@component('mail::button',['url'=> url('reset/'.$user->remember_token)])
Reset your password
@endcomponent

Thanks,<br>
{{config('app.name')}}
@endcomponent