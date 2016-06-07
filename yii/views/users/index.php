<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Lista de usuarios</div>
        </div>
        <table class="table table-hover">
            <thead>
            <th>N° Registro</th>
            <th>Nombre</th>
            <th>Nombre de usuario</th>
            <th>Contraseña</th>
            <th>Opciones</th>
            </thead>
            <tbody>
            <tr>
                <?php
                if ($dataProvider->getCount() === 0) {
                    echo "
                    <td colspan='5'>No hay registros</td>";
                } else {
                    foreach ($dataProvider->getModels() as $record) {
                        echo "<td>$record->Id</td>
                <td>$record->Name</td>
                <td>$record->User_Name</td>
                <td>$record->Password</td>
                <td>
                <a href='/index.php?r=users%2Fview&id=$record->Id' title='View' class='btn btn-lg'><span class=\"glyphicon glyphicon-eye-open\"></span></a>
                <a href='/index.php?r=users%2Fdelete&id=$record->Id' data-method='post' data-pjax='0' aria-label='Delete' data-confirm='¿Está seguro de eliminar el usuario seleccionado?' title='Delete' class='btn btn-lg'><span class=\"glyphicon glyphicon-trash\"></span></a>
                <a href='/index.php?r=users%2Fupdate&id=$record->Id' title='Update' class='btn btn-lg'><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";
                    }
                }
                ?>
            </tr>
            </tbody>
            <?php
            ?>
        </table>
        <div class="panel-footer">

        </div>
    </div>


</div>
