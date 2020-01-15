<!DOCTYPE html>
<html>
<head>
    <title>Link Shortner</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" 
          integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('css/linkshortner.css')?>" type="text/css"> 
</head>
<body>
   
<div class="container">
    <h1>URL Shortner</h1>
   
    <div class="card">
      <div class="cardHeader">
        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
            @csrf
            <div class="inputGroup">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn-submit" type="submit">Generate</button>
              </div>
            </div>
        </form>
      </div>
      <div class="cardBody">
          <div class="succes">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            </div>
   
            <table class="linkTable">
                <div class="linkTitle">
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                    </tr>
                </div>
                <tbody>
                    @foreach($shortLinks as $row)
                        <tr id="linkblock">
                            <td>{{ $row->id }}</td>
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                            <td>{{ $row->link }}</td>
                            <td><a href ="/delete/{{ $row->id }}"><i class="fas fa-trash"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
</body>
</html>

