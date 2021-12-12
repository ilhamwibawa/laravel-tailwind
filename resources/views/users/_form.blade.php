@csrf
<x-forms.file label="Avatar" :collection="@$user" mediaType="avatar" />
<x-forms.input type="text" name="name" id="name" label="Full Name" required="true" value="{{@$user->name}}" />
<x-forms.input type="email" name="email" id="email" label="E-Mail Address" required="true" value="{{@$user->email}}" disabled="{{@$user ? true : false}}" />
<x-forms.input type="password" name="password" id="password" label="Password" required="true" disabled="{{@$user ? true : false}}" />
<x-forms.input type="password" name="password_confirmation" id="password_confirmation" label="Password Confirmation" required="required" disabled="{{@$user ? true : false}}" />
<x-forms.select name="roles" :options="$roles" label="Roles" />
