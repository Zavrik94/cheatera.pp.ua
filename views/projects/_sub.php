<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\ProjectsFilterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var string $pageName */
/* @var string $case */
/* @var string $subPage */

    $tmp = Yii::$app->session->get('username') ?>
    <div class="projects-all-search">

        <?php $form = ActiveForm::begin([
            'action' => [$action],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>

        <?php echo $form->field($searchModel, 'pool_month')->label(Yii::t('app', 'Pool Month')) ?>
        <?php echo $form->field($searchModel, 'pool_year')->label(Yii::t('app', 'Pool Year')) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'label' => '',
            'format' => 'raw',
            'attribute' => '',
            'value'  => function ($data) use ($subPage) {
                return Html::a(Html::img(yii\helpers\Url::to('/web/img/profile.jpg'), ['width' => '20px']),'/'. Yii::$app->language . "$subPage/" . $data['slug'], ['data-pjax' => '0']);
            },
        ],
        'final_mark',
        'validated',
        'finished',
        'failed',
        'wfc',
        'inprogress',
        'sag',
        'cg',
    ],
]); ?>