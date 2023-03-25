<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Invitation </title>
</head>

<body>
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-md-4 offset-4 p-4 border border-3 border-dark rounded">

                <h3 class="text-info">Hello!</h3>
                <p class="text-muted">Let join the site it is too beneficial for You and me. </p>
                <p class="text-muted">Regards:: {{ auth()->user()->name }}</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Soccer World!</a>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
