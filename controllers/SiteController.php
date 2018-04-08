<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout','language'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
//                    'language' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {

        $posts = Posts::find()->all();
        return $this->render('index', ['posts' => $posts]);
    }

    public function actionCreate() {

        $post = new Posts();
        $Data = Yii::$app->request->post();
        if ($post->load($Data)) {
            if ($post->save()) {
                Yii::$app->session->setFlash('message', 'Your Post is published successfully');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('message', 'Sorry something going not good please check your information !!');
            }
        }
        return $this->render('create', ['post' => $post]);
    }

    public function actionView($id) {
        $post = Posts::findOne($id);
        return $this->render('view', ['post' => $post]);
    }

    public function actionUpdate($id) {
        $post = Posts::findOne($id);
        if ($post->load(Yii::$app->request->post()) && $post->save()) {
            Yii::$app->session->setFlash('message', 'Your Post is successfully updated');
            return $this->redirect(['index', 'id' => $post->id]);
        } else {
            return $this->render('update', ['post' => $post]);
        }
    }

    public function actionDelete($id) {
        $post = Posts::findOne($id)->delete();
        if($post){
            Yii::$app->session->setFlash('message', 'Your Post is deleted successfully ');
        return $this->redirect(['index',]);
        }
    }
    
    
 public function actionLanguage(){
     
        if(isset($_POST['lang'])){
            
            Yii::$app->language = $_POST['lang'];
            $cookie = new yii\web\Cookie([
                'name'=>'lang',
                'value'=>$_POST['lang']
            ]);
            
            Yii::$app->response()->cookies()->add($cookie);
        }
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

}
