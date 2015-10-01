<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";
    require_once __DIR__."/../src/Contact.php";

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
        $contact_info = new Contact($_GET['phone'], $_GET['email']);
        $contact = $contact_info->showInfo();
        $my_job = new JobOpening ($_GET['title'], $_GET['description'], $contact);

        $job_listings = array($my_job);

        foreach ($job_listings as $opening)
        $output="";
        {
            $output = $output .
            "
            <!DOCTYPE html>
            <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                <title>Job Board</title>
            </head>
            <body>
                <div class='container'>
            <li><h3>$opening->title</h3></li>
            <ul>
            <li>$opening->description </li>
            <li> $opening->contact </li>
            </ul>
            </li>
            </div>
        </body>
        </html>
        ";
        }
        return $output;
        //why was echo being used in the example, when displaying the information for the posted job? i changed it, to use bootstrap, and the way i did it included taking away echo. it works, but i'm still not sure why i was using echo (other than the example in the lesson showing us to) in the first place.
        //was "storing the Contact object inside the JobOpening" mean that i should used a $_GET function in the JobOpening object? ahh idk hope it don't come back as something missing i should've learned..
    });

    return $app;
 ?>
