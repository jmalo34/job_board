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
        // $contact = $contact_info->showInfo();
        $my_job = new JobOpening ($_GET['title'], $_GET['description'], $contact_info);

        $job_listings = array($my_job);

        foreach ($job_listings as $opening)
        {
            echo "<li>";
            echo $opening->title;
            echo "<ul>";
            echo "<li> $opening->description </li>";
            echo "<li> $opening->contact </li>";
            echo "</ul>";
            echo "</li>";
        }
    });
//in browser, i keep seeing error message "Catchable fatal error: Object of class Contact could not be converted to string in /Users/MacMinii/Documents/epicodus/classwork/Object-Oriented_PHP/job_board/app/app.php on line 59"; so. from what i've gathered so far, this means i'm trying to print the object out as a string. Not sure if this is even what i'm supposed to be doing, thinking it is possible this lesson is "wrong" in saying "Hint: A Contact object would include properties like a name, email and phone number, and you would want to store it inside of the JobOpening object you are creating." Are they actually asking me to do a Contact as a child class? Although immediately prior to the hint, it states you should declare Contact as a separate class from JobOpening?
    return $app;
 ?>
