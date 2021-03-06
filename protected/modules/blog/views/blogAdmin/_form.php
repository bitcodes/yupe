<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'                     => 'blog-form',
    'enableAjaxValidation'   => false,
    'enableClientValidation' => true,
    'type'                   => 'vertical',
    'htmlOptions'            => array('class' => 'well'),
    'inlineErrors'           => true,
));

Yii::app()->clientScript->registerScript('fieldset', "
    $('document').ready(function () {
        $('.popover-help').popover({ trigger : 'hover', delay : 500 });
    });
");
?>
    <div class="alert alert-info">
        <?php echo Yii::t('blog', 'Поля, отмеченные'); ?>
        <span class="required">*</span>
        <?php echo Yii::t('blog', 'обязательны.'); ?>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <div class="wide row-fluid control-group <?php echo ($model->hasErrors('type') || $model->hasErrors('status')) ? 'error' : ''; ?>">
        <div class="span3">
            <?php echo $form->dropDownListRow($model, 'type', $model->getTypeList(), array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('type'), 'data-content' => $model->getAttributeDescription('type'))); ?>
        </div>
        <div class="span4">
            <?php echo $form->dropDownListRow($model, 'status', $model->getStatusList(), array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('status'), 'data-content' => $model->getAttributeDescription('status'))); ?>
        </div>
    </div>

    <div class="row-fluid control-group <?php echo $model->hasErrors('name') ? 'error' : ''; ?>">
        <?php echo $form->textFieldRow($model, 'name', array(
            'class'               => 'popover-help span7',
            'maxlength'           => 300,
            'size'                => 60,
            'data-original-title' => $model->getAttributeLabel('name'),
            'data-content'        => $model->getAttributeDescription('name'),
        )); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('slug') ? 'error' : ''; ?>">
            <?php echo $form->textFieldRow($model, 'slug', array('class' => 'popover-help span7', 'maxlength' => 150, 'size' => 60, 'data-original-title' => $model->getAttributeLabel('slug'), 'data-content' => $model->getAttributeDescription('slug'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('icon') ? 'error' : ''; ?>">
            <?php echo $form->textFieldRow($model, 'icon', array('class' => 'popover-help span7', 'maxlength' => 300, 'size' => 60, 'data-original-title' => $model->getAttributeLabel('icon'), 'data-content' => $model->getAttributeDescription('icon'))); ?>
    </div>
    <div class="row-fluid control-group <?php echo $model->hasErrors('description') ? 'error' : ''; ?>">
        <div class="popover-help" data-original-title='<?php echo $model->getAttributeLabel('description'); ?>' data-content='<?php echo $model->getAttributeDescription('description'); ?>'>
            <?php echo $form->labelEx($model, 'description'); ?>
            <?php $this->widget($this->module->editor, array(
                'model'       => $model,
                'attribute'   => 'description',
                'options'     => $this->module->editorOptions,
            )); ?>
        </div>
    </div>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type'       => 'primary',
        'label'      => $model->isNewRecord ? Yii::t('blog', 'Добавить блог и продолжить') : Yii::t('blog', 'Сохранить блог и продолжить'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'  => 'submit',
        'htmlOptions' => array('name' => 'submit-type', 'value' => 'index'),
        'label'       => $model->isNewRecord ? Yii::t('blog', 'Добавить блог и закрыть') : Yii::t('blog', 'Сохранить блог и закрыть'),
    )); ?>

<?php $this->endWidget(); ?>