<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\doll\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '渠道';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
//            'true_name',
//            'auth_key',
//            'password_hash',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'sex',
            // 'birthday',
            // 'country_id',
            // 'province_id',
            // 'city_id',
            // 'avatar',
            // 'about',
            // 'email:email',
             'identity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
