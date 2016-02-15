<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Person;

class SiteController extends Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex() {
        $sort = isset($_GET['sort']) ? \Yii::$app->request->get('sort') : 'firstname';
        $order = isset($_GET['order']) ? strtoupper(\Yii::$app->request->get('order')) : 'ASC';
        $q = isset($_GET['q']) ? \Yii::$app->request->get('q') : '';
        
        if($q != '') {
            $persons = Person::find()->where("firstname LIKE '%$q%' OR lastname LIKE '%$q%'")->orderBy("$sort $order")->all();
        } else {
            $persons = Person::find()->orderBy("$sort $order")->all();
        }
        return $this->render('index', ['persons' => $persons, 'sort'=>$sort, 'order'=>$order, 'q'=>$q]);
    }

    public function actionPerson($id) {
        $person = Person::findOne($id);
        if ($person == null) {
            throw new \yii\web\NotFoundHttpException('This record does not exists.');
        }
        return $this->render('person', ['person' => $person]);
    }

    public function actionCreate() {
        if (count($_POST) > 0) {
            $personInfo = [
                'firstname' => strtolower(\Yii::$app->request->post('firstname')),
                'lastname' => strtolower(\Yii::$app->request->post('lastname')),
                'dob' => date('Y-m-d', strtotime(\Yii::$app->request->post('dob'))),
                'zip' => \Yii::$app->request->post('zip')
            ];
            $person = new Person($personInfo);
            $saved = $person->save();
            if (!$saved) {
                $errors = $person->getErrors();
                foreach ($errors as $messages) {
                    foreach ($messages as $message) {
                        \Yii::$app->session->addFlash('danger', $message);
                    }
                }
                header("Location: /persons/web/add");
                exit();
            }

            \Yii::$app->session->addFlash('success', 'Record added successfully.');
            header("Location: /persons/web/person/$person->id");
            exit();
        }
        return $this->render('create');
    }

    public function actionUpdate($id) {
        $person = Person::findOne($id);
        if ($person == null) {
            throw new \yii\web\NotFoundHttpException('This record does not exists.');
        }
        if (count($_POST) > 0) {
            $personInfo = [
                'firstname' => strtolower(\Yii::$app->request->post('firstname')),
                'lastname' => strtolower(\Yii::$app->request->post('lastname')),
                'dob' => date('Y-m-d', strtotime(\Yii::$app->request->post('dob'))),
                'zip' => \Yii::$app->request->post('zip')
            ];
            $person->setAttributes($personInfo, false);
            $saved = $person->save();
            if (!$saved) {
                $errors = $person->getErrors();
                foreach ($errors as $messages) {
                    foreach ($messages as $message) {
                        \Yii::$app->session->addFlash('danger', $message);
                    }
                }
                header("Location: /persons/web/update/$id");
                exit();
            }

            \Yii::$app->session->addFlash('success', 'Record updated successfully.');
            header("Location: /persons/web/person/$person->id");
            exit();
        }
        return $this->render('update', ['person' => $person]);
    }

    public function actionDelete($id) {
        $person = Person::findOne($id);
        if ($person == null) {
            throw new \yii\web\NotFoundHttpException('This record does not exists.');
        }
        $person->delete();
        \Yii::$app->session->addFlash('success', 'Record deleted successfully.');
        header("Location: /persons/web");
        exit();
    }

}
