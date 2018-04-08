<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Oday Rafeh opdracht';
?>

<div class="site-index">
    <h1> What service you Need ?</h1>
    <h4> please fill in the form below </h4>
    <br/>
    <div class="body-content">
        <?php
        $form = ActiveForm::begin()
        ?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($post, 'service_name');?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($post, 'problem_Description')->textarea(['rows' => '5']) ;?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($post, 'client_name'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($post, 'client_number');?>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="col-lg-3">
                        <?= Html::submitButton('Submit',['class' =>'btn btn-primary', 'name' => 'submit-button']);?>
                    </div>
                    <div class="col-lg-2">
                        <a href=<?php echo yii::$app->homeUrl; ?> class="btn btn-success">Go Back</a>
                    </div>
                </div>  
            </div>
        </div>  
        <?php ActiveForm::end()?>
    </div>
</div>