<?php
    namespace backend\controllers;

    use backend\models\UploadCover;
    use common\models\NewsModel;
    use common\models\search\NewsSearch;
    use Yii;
    use yii\alexposseda\fileManager\actions\RemoveAction;
    use yii\alexposseda\fileManager\actions\UploadAction;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use common\models\LoginForm;
    use yii\web\NotFoundHttpException;

    /**
     * Site controller
     */
    class SiteController extends Controller{
        /**
         * @inheritdoc
         */
        public function behaviors(){
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => [
                                'login',
                                'error'
                            ],
                            'allow'   => true,
                        ],
                        [
                            'actions' => [

                            ],
                            'allow'   => true,
                            'roles'   => ['@'],
                        ],
                    ],
                ],
                'verbs'  => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'logout'      => ['post'],
                        'delete'      => ['POST'],
                        'upload-logo' => ['POST'],
                        'remove-logo' => ['POST'],
                    ],
                ],
            ];
        }

        /**
         * @inheritdoc
         */
        public function actions(){
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],

                'upload-logo' => [
                    'class'         => UploadAction::className(),
                    'uploadPath'    => 'photo',
                    'sessionEnable' => true,
                    'uploadModel'   => new UploadCover([
                                                           'validationRules' => [
                                                               'extensions' => 'jpg, png',
                                                               'maxSize'    => 1024 * 500
                                                           ]
                                                       ])
                ],
                'remove-logo' => [
                    'class' => RemoveAction::className()
                ]
            ];
        }

        /**
         * Lists all NewsModel models.
         * @return mixed
         */
        public function actionIndex(){
            $searchModel = new NewsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        /**
         * Displays a single NewsModel model.
         *
         * @param integer $id
         *
         * @return mixed
         */
        public function actionView($id){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        /**
         * Creates a new NewsModel model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate(){
            $model = new NewsModel();

            if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect([
                                           'view',
                                           'id' => $model->id
                                       ]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        /**
         * Updates an existing NewsModel model.
         * If update is successful, the browser will be redirected to the 'view' page.
         *
         * @param integer $id
         *
         * @return mixed
         */
        public function actionUpdate($id){

            $model = $this->findModel($id);

            if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect([
                                           'view',
                                           'id' => $model->id
                                       ]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        /**
         * Deletes an existing NewsModel model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         *
         * @param integer $id
         *
         * @return mixed
         */
        public function actionDelete($id){
            $this->findModel($id)
                 ->delete();

            return $this->redirect(['index']);
        }

        /**
         * Finds the NewsModel model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         *
         * @param integer $id
         *
         * @return NewsModel the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id){
            if(($model = NewsModel::findOne($id)) !== null){
                return $model;
            }else{
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

        /**
         * Login action.
         *
         * @return string
         */
        public function actionLogin(){
            if(!Yii::$app->user->isGuest){
                return $this->goHome();
            }

            $model = new LoginForm();
            if($model->load(Yii::$app->request->post()) && $model->login()){
                return $this->goBack();
            }else{
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }

        /**
         * Logout action.
         *
         * @return string
         */
        public function actionLogout(){
            Yii::$app->user->logout();

            return $this->goHome();
        }
    }
