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
            <?php if (Yii::$app->session->hasFlash('message')): ?>
                <div class="alert alert-success">
                    <?php echo Yii::$app->session->getFlash('message'); ?>
                </div>
            <?php endif; ?>
            <div class="jumbotron">
                <h1>Digizijn Opdracht</h1>

                <p><a class="btn btn-lg btn-success" href="https://www.digizijn.nl/ons-werk">View Our Service </a></p>
                <h3> Need Help !!</h3><br/>
                <span><?= Html::a('Apply for our service Now !!', ['/site/create'], ['class' => 'btn btn-primary']) ?> </span>
            </div>
            <div class="row">

            </div>
            <div class="body-content">

                <div class="row">

                    <table class="table table-hover">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">ID</th>
                                <th scope="col">Service name</th>
                                <th scope="col">problem Description</th>
                                <th scope="col">Client name </th>
                                <th scope="col">Client number </th>
                                <th scope="col">Client Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($posts) > 0): ?>
                                <?php foreach ($posts as $posts) : ?>
                                    <tr class="table-success">
                                        <th scope="row"><?php echo $posts->id ?></th>
                                        <td><?php echo $posts->service_name ?></td>
                                        <td><?php echo $posts->problem_Description ?></td>
                                        <td><?php echo $posts->client_name ?></td>
                                        <td><?php echo $posts->client_number ?></td>
                                        <td>
                                            <span> <?= Html::a('View', ['view', 'id' => $posts->id], ['class' => 'btn btn-primary']) ?></span>
                                            <span> <?= Html::a('Update', ['update', 'id' => $posts->id], ['class' => 'btn btn-success']) ?></span>
                                            <span> <?= Html::a('Delete', ['delete', 'id' => $posts->id], ['class' => 'btn btn-danger']) ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td> No results found </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table> 
                    <br>
                    <div class="col-lg-offset-1" style="color:#999;text-align: center">
                        <div class="lead">
                             Please Read this : This sentence you going to see in (Dutch) is translated Manuelly from English  : .
                            <br><br>
                            <?= Yii::t('app', 'Welcome to My Demo Website ,Enjoy your time .') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>