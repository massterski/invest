<?php

namespace frontend\controllers;

use common\models\Purchase;

/**
 * PurchaseController implements the CRUD actions for News model.
 */
class PurchaseController extends BaseController
{
    public $layout = '@app/views/layouts/home';

    /**
     * Lists all Purchase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $purchase = Purchase::find()->orderBy(['id'=> SORT_DESC])->where(['status' => Purchase::STATUS_PUBLISHED])->all();

        return $this->render('index', [
            'purchase' => $purchase,
        ]);
    }

}
