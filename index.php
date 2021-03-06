
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href=" ./style/style1.css">
    <link rel="icon" href=" ./style/logo.png" type="image/png">
    <title> Introduction </title>
</head>

<body>
    <div class="main-site bg">
        <div class="navigation">
            <nav class="main-nav sticky-top">
                <a href="#">
                    <img src="./style/logo.png" width="30" height="30" class="d-inline-block align-top logo" alt="" />
                    <p id="title1">Library-Management</p>
                </a>
            </nav>
        </div>
        <div class="card text-center main-card m-0">
            <h1 class="display-1"><b>Welcome to the project!</b></h1>
            <h2><u>CDT-AV: Crack Detection Technology for Automated Vehicles</u></h2>
            <br>
            <h3>The project aims at creating a better speed variation for automated vehicles by predicting the amount of cracks on the road. Once the crack percentage on the roads exceeds certain limit, it warns vehicles to decrease its speed.</h3>
            <br>
            <div class="card-body">
                <h4 class="text-left" style="font-weight:700"><u><b>Brief Overview:</b></u> </h4>
                <ul class="text-left">
                    <li>The webapp is created using django python framework. The pages are designed using HTML5, CSS and Bootstrap.</li>
                    <li>The Machine Learning Model to Predict the percentage of cracks on road is created using different libraries of python including tensorflow, keras, opencv</li>
                    <li>There are 5 pages in the webapp including the following pages: <ul>
                            <li><b>Introductory Page:</b> Current Page which describes the project</li>
                            <li><b>Login:</b> for logging into the webapp</li>
                            <li><b>Register:</b> for registering into the site</li>
                            <li><b>Index:</b> this is the main page where we take image input of road ahead</li>
                            <li><b>Output:</b> after entering the imgae on indexx page, the output that is how much percentage of road is covered with cracks is shown here</li>

                        </ul>
                    </li>
                    <li>IDEs used for coding: Visual Studio Code, Spyder</li>
                    <li>The the database management system used here is postgresql to provide database for login and registration credentials</li>

                </ul>
                <button type="button" class="btn btn-info"><a href="login.php">continue as student -></a></button> <button type="button" class="btn btn-info"><a href="index">Continue as  admin -></a></button>




            </div>

        </div>

    </div>

    <script src="./script.js" type="text/javascript"></script>

</body>

</html>