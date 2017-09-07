<?php

namespace app\controllers;

use app\models\CalcForm;
use app\models\Signup;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use app\models\Age;
use app\models\Open;
use app\models\Period;
use app\models\Power;
use app\models\Territory;


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

        // Расчет
        if ($model->load(\Yii::$app->request->post())) {
            $sum = $model->calculate();
        }

        // Формирование пунктов для выподающих списков
        $age = ArrayHelper::map(Age::find()->all(), 'id', 'name_age');
        $open = ArrayHelper::map(Open::find()->all(), 'id', 'open_name');
        $period = ArrayHelper::map(Period::find()->all(), 'id', 'period_name');
        $power = ArrayHelper::map(Power::find()->all(), 'id', 'power_name');
        $territory = ArrayHelper::map(Territory::find()->all(), 'id', 'territory_name');

        return $this->render('calculator', compact('model', 'age', 'open', 'period', 'power', 'territory', 'sum'));
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

    /**
     * Метод Регистрации.
     * Сохранение пользователя в БД
     * @return string|\yii\web\Response
     */
    public function actionSignup()
    {
        $model = new Signup();

        if (isset($_POST['Signup'])) {
            $model->attributes = \Yii::$app->request->post('Signup');

            if ($model->validate()) {
                $model->signup(); // Сохранение пользователя в БД
                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }

}