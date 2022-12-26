<div class="col-md-8 offset-2">
  @csrf
  <form action="{{ route('CreateP') }}" method="post">
<form action="/upload" method="post" enctype="multipart/form-data">
    <label for="image">Select an image:</label><br>
    <input type="file" id="image" name="image"><br>
    <label for="text">Enter some text:</label><br>
    <input type="text" id="text" name="description"><br><br>
    <button type="submit" value="Submit"></button>
    <input type="hidden" value="{{ Session::token() }}" name="_token">
  </form> 
</form>
  @foreach ($posts as $post)
      
  @endforeach