<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AURHENTICATION REST API</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h3 class="text-center">
                Authentication rest API magento2.
            </h3>
            <form role="form" action="../Auth/Token.php" method="POST">
                <div class="form-group">
                    <label for="username">
                        User Name
                    </label>
                    <input class="form-control" id="username" name="username" type="name"  />
                </div>
                <div class="form-group">
                    <label for="userpassword">
                        Password
                    </label>
                    <input class="form-control" id="userpassword" name="userpassword" type="password" />
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="sel1">Choose API:</label>
                        <select class="form-control" id="requestapi" name="requestAPI">
                            <option value="allProduct">Fetch all Products</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Fetch Result >>
                </button>

            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 result_data">
        </div>
    </div>
</div>

</body>
</html>