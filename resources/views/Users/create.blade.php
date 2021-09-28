@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="/users/store" method="post">
    @csrf
<label for="name">Name:</label><br>
<input type="text" id="name" name="name"><br>
<label for="email">Email:</label><br>
<input type="text" id="txtEmail" name="email">
    <input type="hidden" id="provider_id" name="provider_id" value="1">
    <input type="submit" value="Store">
</form>

