<?php

use yii\widgets\ActiveForm;

$this->title = 'Add New Record';
$this->params['breadcrumbs'][] = ['label' => 'Add Person'];
?>
<div class="site-add col-sm-6 no-padding">
<?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Jane" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Doe" required>
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input class="form-control" type="text" name="dob" id="dob" placeholder="mm/dd/yy" required>
    </div>
    <div class="form-group">
        <label for="zip">Zip Code:</label>
        <input class="form-control" type="text" name="zip" id="zip" placeholder="12345" maxlength="5" required>
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