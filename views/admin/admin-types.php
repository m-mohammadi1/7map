<?php 
if (isset($_POST['edit_type']))
{
    if (edit_type($_POST['id'], $_POST['title']))
    {
        header("Location: ?action=types");
    }
}

if (isset($_POST['add_type']))
{
    if (add_type($_POST['title']))
    {
        header("Location: ?action=types");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بخش مدیریت</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">

    <link rel="stylesheet" href="assets/css/styles.css<?="?v=" . rand(99, 9999999)?>" />

    <link rel="stylesheet" href="assets/css/views-style.css<?="?v=" . rand(99, 9999999)?>" />

    
</head>
<body> 
    <div class="main-panel">
        <h1> مدیریت دسته بندی های <span style="color:#007bec"><?= SITE_NAME; ?></span></h1>
        <div class="box">
            <a class="statusToggle" href="<?=SITE_URL . 'adm.php'?>" target="_blank">🏠</a>
            <a class="statusToggle active" href="?action=types&do=add">افزودن</a>
        </div>
        
        <div class="box">
        <table class="tabe-locations">
            <thead>
                <tr>
                    <th style="width:40%">آیدی</th>
                    <th style="width:40%">عنوان دسته بندی</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($types as $type): ?>
            <tr>
                <td><?= $type->id; ?></td>
                <td><?= $type->title; ?></td>
                <td><a style="margin: 4px;" href="?action=types&do=edit&id=<?= $type->id ?>" class="statusToggle">ویرایش</a></td>
            </tr>
            <?php endforeach; ?>        
            </tbody>
        </table>
        </div>

    </div>


    <?php if (isset($_GET['do']) && $_GET['do'] == 'edit'): ?>
    <div class="modal-overlay" id="editType">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">ویرایش دسته بندی</h3>
            <div class="modal-content">
                <?php $type = get_type($_GET['id']); ?>
                <form id='addLocationForm' action="" method="post">
                    <div class="field-row" >
                            <div class="field-title" >نام</div>
                            <div class="field-content" style="margin-bottom: 20px;" value="<?= $type->id; ?>">
                                <input type="hidden" name="id" value="<?= $type->id; ?>">
                                <input style="text-align: right;" type="text" name="title" value="<?= $type->title; ?>">
                            </div>
                    </div>
          
                    <div class="field-row">
                        <div class="field-title">ذخیره</div>
                        <div class="field-content">
                            <input style="text-align: center;" type="submit" name="edit_type" value=" ثبت ">
                        </div>
                    </div>
   
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (isset($_GET['do']) && $_GET['do'] == 'add'): ?>
    <div class="modal-overlay" id="editType">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">افزودن دسته بندی</h3>
            <div class="modal-content">
                <form id='addLocationForm' action="" method="post">
                    <div class="field-row" >
                            <div class="field-title" >نام</div>
                            <div class="field-content" style="margin-bottom: 20px;">
                                <input style="text-align: right;" type="text" name="title" >
                            </div>
                    </div>
          
                    <div class="field-row">
                        <div class="field-title">ذخیره</div>
                        <div class="field-content">
                            <input style="text-align: center;" type="submit" name="add_type" value=" ثبت ">
                        </div>
                    </div>
   
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>




    <script src="assets/js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

        $("#editType .close").click(function () {
            location.replace("?action=types");
        })

        // console.log('saaaaaa');
        // $('.modal-overlay .close').click(function() {
        //     $('.modal-overlay').fadeOut();
        // });
    });
    </script>
</body>
</html>
