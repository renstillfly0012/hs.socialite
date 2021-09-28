@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="/users/{{$user->id}}/update" method="post">
    @method('PUT')
    @csrf
    <label for="name">Name: </label><br>
    <input type="text" id="name" name="name" value="{{$user->name}}"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="txtEmail" name="email" value="{{$user->email}}">
    <input type="hidden" id="provider_id" name="provider_id" value="{{$user->provider_id}}">
    <input type="submit" value="Update">
</form>
