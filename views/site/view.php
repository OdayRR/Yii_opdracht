<?php

use yii\helpers\Html;

$this->title = 'Oday Rafeh opdracht';
?>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> 
    </head>
    <body>
        <div class="site-index">
            <h2> Post informations </h2>
            <br/>
            <div class="body-content">
                <div class="jumbotron">
                    <h1 class="display-3"><?php echo $post->service_name ?></h1>
                    <p class="lead"><?php echo $post->problem_Description ?></p>
                    <hr class="my-4">
                    <p> Name of the Client : <?php echo $post->client_name ?></p>
                    <p> Client Number : <?php echo $post->client_number ?></p>
                    <p class="lead">
                        <a href=<?php echo yii::$app->homeUrl; ?> class="btn btn-info">Go Back</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>