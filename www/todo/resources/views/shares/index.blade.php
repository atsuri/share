<!doctype html>
<html lang="ja">
  <head>
    <title>SHARE APPLICATION</title>
    <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- jQuery、Popper、Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   
  </head>
  <body>
    <div class="container" style="margin-top:50px;">
      <h1>Let's share what you like!</h1>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action='{{ url('/shares')}}' method="post">
        {{csrf_field()}}
        <div>
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="title" style="max-width:1300px;">
            <input type="text" name="link" class="form-control" placeholder="url" style="max-width:1300px;">
            <input type="text" name="comment" class="form-control" placeholder="comment" style="max-width:1300px;">
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
      <h1 class="mt-5">Share List</h1>
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <table class="table table-striped mt-2">
        <tbody>
          @foreach ($shares as $share)
          <tr>
            <td>
              <a href="/shares/{{$share->id}}">{{$share->title}}</a>
            </td>
          <tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>
