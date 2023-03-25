<!doctype html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h2>Hello,</h2>
                    <h3>This is a email to notify the guardian that their child has been approved.</h3>
                </div>

                <div class="card-body">
                    <p>
                        @php
                            // dd($guardian);
                        @endphp
                        <b>Child Name:</b> {{ $guardian->player->name }}
                    </p>
                    <p>
                        <b>Child Email:</b> {{ $guardian->player->email }}
                    </p>
                    <p>
                        <b>Guardian Email:</b> {{ $guardian->gurdian_email }}
                    </p>

                    <p>
                        Please reply to this email to confirm your child's entry and approval.
                    </p>
                    <h5>Thanks</h5>

                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
