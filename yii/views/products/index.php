<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
    <p>
        <?= Html::a('Crear producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">Lista de productos</div>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'Id',
                'Code_Product',
                'Name',
                'Price',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
