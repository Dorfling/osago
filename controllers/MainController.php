<?php

namespace app\controllers;

use app\models\CalcForm;
use yii\web\Controller;


class MainController extends Controller
{

    /**
     * Главная страница
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Калькулятор ОСАГО
     *
     * @return string
     */
    public function actionCalculator()
    {
        $model = new CalcForm();
        return $this->render('calculator', compact('model'));
    }

    /**
     * Документы о страховании
     *
     * @return string
     */
    public function actionDocuments()
    {
        return $this->render('documents');
    }

}