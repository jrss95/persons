<?php
/* @var $this yii\web\View */
$this->title = 'Persons';
?>
<div class="site-index">

    <?php if (count($persons) > 0): ?>
        <form id="sort-form">
            <div class="row search-bar">
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by name" name="q" value="<?= $q ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-2 fix">
                    <a href="/persons/web/create">Add new record</a>
                </div>
            </div>
            <input id="sort" type="hidden" name="sort" value="<?= $sort ?>">
            <input id="order" type="hidden" name="order" value="<?= $order ?>">
        </form>

        <div class="bold row header">
            <div class="col-sm-2">
                First Name
                <?php
                if ($sort == 'firstname') {
                    if ($order == 'DESC') {
                        ?><button class="btn btn-link btn-sort active" data-sort="firstname" data-order="asc"><i class="fa fa-sort"></i></button><?php
                    } else {
                        ?><button class="btn btn-link btn-sort active" data-sort="firstname" data-order="desc"><i class="fa fa-sort"></i></button><?php
                        }
                    } else {
                        ?><button class="btn btn-link btn-sort" data-sort="firstname" data-order="desc"><i class="fa fa-sort"></i></button><?php
                    }
                    ?>
            </div>
            <div class="col-sm-2">
                Last Name
                <?php
                if ($sort == 'lastname') {
                    if ($order == 'DESC') {
                        ?><button class="btn btn-link btn-sort active" data-sort="lastname" data-order="asc"><i class="fa fa-sort"></i></button><?php
                    } else {
                        ?><button class="btn btn-link btn-sort active" data-sort="lastname" data-order="desc"><i class="fa fa-sort"></i></button><?php
                        }
                    } else {
                        ?><button class="btn btn-link btn-sort" data-sort="lastname" data-order="desc"><i class="fa fa-sort"></i></button><?php
                    }
                    ?>
            </div>
            <div class="col-sm-2">
                Date of Birth
                <?php
                if ($sort == 'dob') {
                    if ($order == 'DESC') {
                        ?><button class="btn btn-link btn-sort active" data-sort="dob" data-order="asc"><i class="fa fa-sort"></i></button><?php
                    } else {
                        ?><button class="btn btn-link btn-sort active" data-sort="dob" data-order="desc"><i class="fa fa-sort"></i></button><?php
                        }
                    } else {
                        ?><button class="btn btn-link btn-sort" data-sort="dob" data-order="desc"><i class="fa fa-sort"></i></button><?php
                    }
                    ?>
            </div>
            <div class="col-sm-2">
                Zip Code
                <?php
                if ($sort == 'zip') {
                    if ($order == 'DESC') {
                        ?><button class="btn btn-link btn-sort active" data-sort="zip" data-order="asc"><i class="fa fa-sort"></i></button><?php
                    } else {
                        ?><button class="btn btn-link btn-sort active" data-sort="zip" data-order="desc"><i class="fa fa-sort"></i></button><?php
                        }
                    } else {
                        ?><button class="btn btn-link btn-sort" data-sort="zip" data-order="desc"><i class="fa fa-sort"></i></button><?php
                    }
                    ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <?php foreach ($persons as $person): ?>
            <div class="row">
                <div class="col-sm-2"><?= ucwords($person->firstname) ?></div>
                <div class="col-sm-2"><?= ucwords($person->lastname) ?></div>
                <div class="col-sm-2"><?= date('M j, Y', strtotime($person->dob)); ?></div>
                <div class="col-sm-2"><?= $person->zip; ?></div>
                <div class="col-sm-4">
                    <a href="/persons/web/person/<?= $person->id ?>">Details</a> | <a href="/persons/web/update/<?= $person->id ?>">Update</a> | <a href="/persons/web/delete/<?= $person->id ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        No records found. <a href="/persons/web/create">Add new record</a>.
    <?php endif; ?>
</div>

<script type="text/javascript">

window.onload = function() {
    $(".btn-sort").click(function() {
        var a = $(this).attr('data-sort');
        var b = $(this).attr('data-order');
        
        $("#sort").val(a);
        $("#order").val(b);
        
        $("#sort-form").get(0).submit();
    });
};

</script>