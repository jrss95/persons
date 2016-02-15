<?php
/* @var $this yii\web\View */
$a = ucwords($person->firstname);
$b = ucwords($person->lastname);
$this->title = "$a $b's information";
$this->params['breadcrumbs'][] = ['label' => "$a $b"];
?>
<div class="site-person">
    <div class="form-group">
        <label for="">First Name:</label>
        <?= ucwords($person->firstname) ?>
    </div>
    <div class="form-group">
        <label for="">Last Name:</label>
        <?= ucwords($person->lastname) ?>
    </div>
    <div class="form-group">
        <label for="">Date of Birth:</label>
        <?= date('M j, Y', strtotime($person->dob)) ?>
    </div>
    <div class="form-group">
        <label for="">Zip Code:</label>
        <?= $person->zip ?>
    </div>
    <div class="form-group">
        <a href="/persons/web/update/<?= $person->id ?>">Update</a> | <a href="/persons/web/delete/<?= $person->id ?>">Delete</a>
    </div>
</div>
