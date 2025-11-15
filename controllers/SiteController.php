<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Author;
use app\models\Book;
use app\models\AuthorHasBook;

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
        $books = Book::find()->all();

        return $this->render('index', [
            'books' => $books,
        ]);
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
     * Displays admin page.
     *
     * @return string
     */
    public function actionAdmin($id = null)
    {
        $request = \Yii::$app->request;
        if ($id) {
            $book = Book::findOne($id);
            $author = new Author;
            //var_dump($author); die;
        }
        else {
            $book = new Book;
            if (empty($request->post()['Author']) || !$author = Author::findOne(['fio' => $request->post()['Author']['fio']]))
                $author = new Author;
        }

        if ($request->isPost) {
            
            if ($author->load($request->post()) && $book->load($request->post())) {

                if (!empty($_FILES['Book'])) {
                    $book->file = file_get_contents($_FILES['Book']['tmp_name']['file']);
                }

                if ($book->save() && $author->save()) {
                    $has = new AuthorHasBook;
                    $has->author_id = $author->id;
                    $has->book_id = $book->id;
                    $has->save();

                    $this->redirect(['admin', 'id' => $book->id]);
                }
                
            }
            
            
        }
        

        return $this->render('admin', [
            'author' => $author,
            'book' => $book,
        ]);
    }

    public function actionView($id) {
        $book = Book::findOne($id);

        return Yii::$app->response->sendContentAsFile(
            $book->file, 
            $book->title, 
            ['inline' => true, 'mimeType' => 'application/pdf']
        );
    }

    public function actionDeleteAuthor($id) {
        $author = Author::findOne($id);
        $bookId = $author->authorHasBooks[0]->book->id;
        $author->delete();
        $this->redirect(['admin', 'id' => $bookId]);
    }
}
