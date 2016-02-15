<?php
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$a = ucwords($person->firstname);
$b = ucwords($person->lastname);
$this->title = "Update $a $b's information";
$this->params['breadcrumbs'][] = ['label' => "$a $b", 'url' => '/persons/web?r=site/person&id=' . $person->id];
$this->params['breadcrumbs'][] = ['label' => 'Update'];
?>
<div class="site-update col-sm-6 no-padding">
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Jane" required value="<?= ucwords($person->firstname) ?>">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Doe" required value="<?= ucwords($person->lastname) ?>">
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input class="form-control" type="text" name="dob" id="dob" placeholder="mm/dd/yy" required value="<?= date('m\/d\/Y', strtotime($person->dob)) ?>">
    </div>
    <div class="form-group">
        <label for="zip">Zip Code:</label>
        <input class="form-control" type="text" name="zip" id="zip" placeholder="12345" maxlength="5" required value="<?= $person->zip ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="pull-right" href="/persons/web">Cancel</a>
    </div>
    <?php $form::end(); ?>
</div>

<script type="text/javascript">
    window.onload = function () {
        $("#dob").datepicker({changeYear: true, yearRange: "1900:2016"});
    };
</script>