<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";

    $app = new Silex\Application();

    $app->get("/", function()
    {
        return
        "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Job Board</title>
        </head>
        <body>
            <div class='container'>
                <h1>Job Board</h1>
                <p>Complete all fields in the form below to list an opening on the Job Board</p>
                <form action='/openings'>
                    <div class='form-group'>
                        <label for='title'>Title:</label>
                        <input id='title' name='title' class='form-control' type='text'>
                    </div>
                    <div class='form-group'>
                        <label for='description'>Brief Description:</label>
                        <input id='description' name='description' class='form-control' type='text'>
                    </div>
                    <div class='form-group'>
                    <em>Contact Information:</em><br>
                        <label>Phone:</label>
                        <input id='phone' name='phone' class='form-control' type='text'>
                        <label>Email:</label>
                        <input id='email' name='email' class='form-control' type='text'>
                    </div>
                    <button type='submit' class='btn-success'>Post</button>
                </form>
            </div>
        </body>
        </html>
        ";
    });

    $app->get("/openings", function()
    {

    });

    return $app;
 ?>
