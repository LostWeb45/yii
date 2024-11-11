<?php

namespace app\controllers;

use app\models\FilmsSearch;
use app\models\SessionSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Films;
use app\models\Genre;
use app\models\Role;
use app\models\Session;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
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
    public function actionIndex()
    {

        // $films = Films::find()->limit(20)->all();
        // $genre = Genre::find()->limit(20)->all();

        // $genre = Films::find()->join('INNER JOIN', 'films', 'films.id_genre = genre.id')->all();
        // return $this->render(
        //     'index',
        //     [
        //         'films' => $genre,


        //         'role_name' => !Yii::$app->user->isGuest ?
        //             Role::findOne(['id' => Yii::$app->user->identity->id_role]) : null,
        //     ]
        // );
        $genre = Films::find()
            ->joinWith('genre')
            ->select(['films.*', 'genre.name as genre_name'])
            ->asArray()
            ->all();

        return $this->render(
            'index',
            [
                'films' => $genre,

                'role_name' => !Yii::$app->user->isGuest ?
                    Role::findOne(['id' => Yii::$app->user->identity->id_role]) : null,
            ]
        );
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
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
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionAfisha()
    {
        $genre = Session::find()
            // ->joinWith('genre')
            // ->select(['films.*', 'genre.name as genre_name'])
            // ->asArray()
            ->all();
        $searchModel = new SessionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('afisha', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'films' => $genre,

            'role_name' => !Yii::$app->user->isGuest ?
                Role::findOne(['id' => Yii::$app->user->identity->id_role]) : null,

        ]);
    }
}
