<?php

namespace app\controllers;

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
        return $this->render('calculator');
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