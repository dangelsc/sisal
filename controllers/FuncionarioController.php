<?php

namespace app\controllers;

use Yii;
use app\models\TblFuncionario;
use app\models\FuncionarioSearch;
use app\models\TblPersona;
use app\models\TblUsuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\models\SignupForm;
use app\models\TblUnidades;
use app\models\User;
use mPDF;
use HojacartaM;

/**
 * FuncionarioController implements the CRUD actions for TblFuncionario model.
 */
class FuncionarioController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','create','update','Printmemorandum','admin','lista'],
                'rules' => [
                    [
                        //'actions' => ['index','create','update'],
                        'allow' => true,
                        'roles'=>['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    /**
    *
    *
    */
    public function actionPrintmemorandum($id){
        $mpdf=new HojacartaM("es","letter");
        $model=TblFuncionario::findOne($id);
        $mpdf->WriteHTML(
        //    echo 
             $this->renderPartial('printmemorandum',["model"=>$model])
        );
        $mpdf->Output('MyPDF.pdf', 'D');
        exit;
    }
    /**
     * Lists all TblFuncionario models.
     * @return mixed
     */
    public function actionAdmin() 
    {
        
        $searchModel = new FuncionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPartial('_admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all TblFuncionario models.
     * @return mixed
     */
    public function actionLista()
    {
        $searchModel = new FuncionarioSearch();
        if(isset(Yii::$app->request->queryParams["FuncionarioSearch"]["nombre"]) && Yii::$app->request->queryParams["FuncionarioSearch"]["nombre"]!="undefined")
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        else
            $dataProvider = $searchModel->search("");
        return $this->renderPartial('_lista', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all TblFuncionario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FuncionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblFuncionario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblFuncionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblFuncionario();
        $modelp = new TblPersona();
        $modelu = new SignupForm();

        if($model->load(Yii::$app->request->post())  && $modelp->load(Yii::$app->request->post()) 
            && $modelu->load(Yii::$app->request->post())) {
            $modelp->imageFile = UploadedFile::getInstance($modelp, 'imageFile');
            if($model->validate() && $modelp->validate())
            {
                $connection = \Yii::$app->db;
                $transaction = $connection->beginTransaction(); 
                
                try{
                    
                    $modelp->save();
                    $dir=md5($modelp->id) . '.png'  ;
                    $modelp->dir_foto=$dir;
                    $modelp->save();
                    $modelp->imageFile->saveAs("images/face/".$dir);

                    $model->id=$modelp->id;
                    $model->antiguedad=0;
                    $model->estado=1;
                    $model->item=TblUnidades::getItem($model->id_unidad)->item+1;
                    $model->save();
                    
                    //$mo = new SignupForm();
                    //password,username,email
                   
                   
                    $user = $modelu->signup();
                    $usuario=new TblUsuario();
                    $usuario->nom_usuario=$modelu->username;
                            //$usuario->estado=1;
                    $usuario->id=$model->id;
                    $usuario->iduser=$user->id;
                    //
                    $transaction->commit();  $usuario->save(); 
                    return $this->redirect(['view', 'id' => $modelp->id]);
                }catch(Exception $e){
                    $transaction->rollback();
                }
                
            }
            else{
                //print_r($model);
                //print_r($modelp);
               // print_r($modelu);
            }
        } 

        {
            return $this->render('create', [
                'model' => $model,
                'modelp' => $modelp,
                'modelu' => $modelu
            ]);
        }
    }

    /**
     * Updates an existing TblFuncionario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$model = new TblFuncionario();
        $modelp = TblPersona::findOne($model->id);
        $m=TblUsuario::findOne($model->id);
        $modelu=new SignupForm();
        $modelu->username=$m->nom_usuario;

        $use=User::findByUsername($m->nom_usuario);
        //$modelu->email=$use->email;
        $modelu->password="";
        $modelu->repeatpassword="";
        $modelu->isNewRecord=false;
        //$modelp = new TblPersona();
        //$modelu = new SignupForm();
        $unidad=$model->id_unidad;
        
        if($model->load(Yii::$app->request->post())  && $modelp->load(Yii::$app->request->post()) 
            ) {
                                               //"TblPersona[imageFile]"
            if(isset($_FILES["TblPersona"]["name"]["imageFile"]) && $_FILES["TblPersona"]["name"]["imageFile"]!=""){
                //echo "sube";
                $modelp->imageFile = UploadedFile::getInstance($modelp, 'imageFile');
            }
           

            if($model->validate() && $modelp->validate())
            {
                $connection = \Yii::$app->db;
                $transaction = $connection->beginTransaction(); 
                
                try{
                    
                    $modelp->save();
                    //print_r($_FILES["TblPersona"]["name"]["imageFile"]);
                    //echo Yii::$app->request->post()["TblPersona"]["imageFile"]."-----";
                    if(isset($_FILES["TblPersona"]["name"]["imageFile"]) && $_FILES["TblPersona"]["name"]["imageFile"]!=""){

                        $modelp->imageFile = UploadedFile::getInstance($modelp, 'imageFile');
                        $dir=md5($modelp->id) . '.png';
                        
                        unlink("images/face/".$dir);
                        
                        //          $modelp->imageFile->saveAs("images/face/".$dir);
                        $modelp->dir_foto=$dir;
                        
                        //echo "save=".
                        $modelp->imageFile->saveAs("images/face/".$dir);
                      //  echo "///////";
                    }
                    //print_r($modelp);
                    $modelp->imageFile=null;
                    $modelp->update();

                    

                    $model->id=$modelp->id;
                    $model->antiguedad=0;
                    $model->estado=1;
                    if($unidad!=$model->id_unidad)
                        $model->item=TblUnidades::getItem($model->id_unidad)->item+1;
                    
                    $model->update();
                    
                  
                    $transaction->commit(); 
                    // $usuario->save(); 
                    return $this->redirect(['view', 'id' => $modelp->id]);echo "111";
                }catch(Exception $e){
                    $transaction->rollback();
                }
                
            }
            else{
                print_r($model);
                print_r($modelp);
                print_r($modelu);
            }
        } 

        {
            return $this->render('create', [
                'model' => $model,
                'modelp' => $modelp,
                'modelu' => $modelu
            ]);
        }

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);

http://www.compucalitv.com/the-last-of-us-ps3-espanol-latino-region-eur/
http://fxg9uc.1fichier.com
http://h7r33i.1fichier.com
http://otswke.1fichier.com
http://yvbasi.1fichier.com
http://uorq84.1fichier.com

http://ysiawh.1fichier.com

http://k2frgp.1fichier.com

http://hsu45v.1fichier.com
http://vj0npz.1fichier.com
http://40vcjh.1fichier.com
http://2k4tla.1fichier.com
http://722p9i.1fichier.com
http://btxauh.1fichier.com
http://e5mp68.1fichier.com
http://a9k1e5.1fichier.com
http://a246z0.1fichier.com
http://4ktf52.1fichier.com
http://nb6czd.1fichier.com
http://z6wtok.1fichier.com
http://4afvec.1fichier.com
http://3ybsgg.1fichier.com
http://5f5rpo.1fichier.com
http://r8dpbc.1fichier.com
http://9jovwn.1fichier.com
http://arzuhg.1fichier.com
http://mzo1aj.1fichier.com
http://91bla5.1fichier.com
http://4g261d.1fichier.com
http://de1w0g.1fichier.com
http://wi7kv4.1fichier.com
http://p2jj86.1fichier.com
http://4cz42j.1fichier.com
http://n9vwkf.1fichier.com
http://daj7fa.1fichier.com
http://u2h73z.1fichier.com
http://gmd5uu.1fichier.com
http://hvdmyq.1fichier.com
http://cztmf3.1fichier.com
http://8uttua.1fichier.com
http://h6su78.1fichier.com
http://mox6j2.1fichier.com
http://6d8wrx.1fichier.com
http://34eueb.1fichier.com
http://mwo0xh.1fichier.com
http://lh01w2.1fichier.com
http://hjfq37.1fichier.com
http://ewa7i9.1fichier.com
http://15rfgg.1fichier.com
http://a0qq8w.1fichier.com
http://h81g0w.1fichier.com
http://97w4kv.1fichier.com
http://o76lp7.1fichier.com
http://5r5g0q.1fichier.com
http://2miaq3.1fichier.com
http://2egxsy.1fichier.com
http://wzscuv.1fichier.com
http://071rw0.1fichier.com
http://70hs34.1fichier.com
http://fbu3e2.1fichier.com
http://nddpky.1fichier.com
http://1g13l0.1fichier.com
http://i7qbow.1fichier.com
http://711dfj.1fichier.com
http://2fm6gu.1fichier.com
http://jhyxvq.1fichier.com
http://dab5p9.1fichier.com
http://cwatwd.1fichier.com
http://ed0exv.1fichier.com
http://iuwzpb.1fichier.com
http://lsvp2z.1fichier.com
http://p3flj6.1fichier.com
http://nat034.1fichier.com
http://c66lnt.1fichier.com
http://65yroj.1fichier.com
        }*/
    }

    /**
     * Deletes an existing TblFuncionario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $r=$this->findModel($id);///->delete();
        $r->estado=0;
        //echo $r->save();
        //print_r($r);

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblFuncionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblFuncionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblFuncionario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
