<!DOCTYPE html>
<html>
<head>
    <title>Link Shortner</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        html, body {
            background: #ececec;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
        }

        h1 {
            display: flex; 
            margin: 0 auto; 
            align-content: center;
            justify-content: center;
            margin-bottom: 50px;
            margin-top: 50px;
            font-weight: 400;
        }

        .inputGroup {
            display: flex;
            flex-direction: row;
            margin: 0 auto;
            align-content: center;
            justify-content: center;
            width: 80vw;
            margin-bottom: 50px;
        }

        input {
            height: 50px;
            width: 70%;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            display: flex; 
            align-content: center;
            justify-content: center;
            background: white;
            border: none;
            font-size: 16px;
            padding-left: 2%;
        }

            input:focus{
                outline: none;
            }

        .btn-submit {
            height: 52px;
            width: 200px;
            border: none;
            background: #2ecc71;
            color: white;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            display: flex; 
            align-content: center;
            justify-content: center;
            font-size: 16px;
        }   
        
        .cardBody{
            background: white; 
            width: fit-content;
            display: flex; 
            flex-direction: column;
            margin: 0 auto; 
            align-content: center;
            justify-content: center;
            border-radius: 20px;
            padding: 20px;
        }

        .linkTable {
            padding-top: 10px;
            padding-bottom: 10px;
            margin: 0 auto; 
            align-content: center;
            justify-content: center;
        }

        .succes{
            width: 95%;
            background: #2ecc71;
            color: white;
            display: flex;
            margin: 0 auto; 
            align-content: center;
            justify-content: center;
            border-radius: 15px;
        }

        th, td {
            padding: 5px 20px 5px 20px;
        }

        th {
            font-weight: 700;
            text-transform: uppercase;
        }

        i{
            color: #db0a5b;
        }

        @media screen and (max-width: 1000px)
        {
            .inputGroup {
            flex-direction: column;
            width: 95vw;
            margin-bottom: 50px;
        } 

        input, .btn-submit {
            flex-direction: column;
            border-radius: 20px;
            margin: 0 auto; 
            align-content: center;
            justify-content: center;
        }

        .btn-submit {
            margin-top: 20px;
            text-align: center;
        }

        th {
            display: none;
        }

        td {
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            text-align: center;
        }

        tr{
            display: table;
            margin: 0 auto;
            margin-bottom: 40px;
        }

        }

    </style>
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

