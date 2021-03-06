<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['timeout' => 4000]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            [
                'label' => 'Status',
                'attribute' => 'status',
                'filter' => User::STATUS_LABELS,
                'value' => function ($model) {
                    return User::STATUS_LABELS[$model->status];
                }
            ],
            [
                'label' => 'Created',
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:d-m-Y H:i'],
            ],
            [
                'label' => 'Updated',
                'attribute' => 'updated_at',
                'format' => ['datetime', 'php:d-m-Y H:i'],
            ],
            //'created_at:datetime',
            //'updated_at:datetime',
            //'verification_token',
            //'access_token',
            'avatar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
