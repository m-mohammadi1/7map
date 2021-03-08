<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME; ?></title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <link rel="stylesheet" href="assets/css/styles.css" />
    <style>
    .leaflet-tooltip-left:before {
    right: 0;
    margin-right: -12px;
    border-left-color: rgba(0, 0, 0, 0.4);
}
.leaflet-tooltip-right:before {
    left: 0;
    margin-left: -12px;
    border-right-color: rgba(0, 0, 0, 0.4);
    }
.leaflet-tooltip-own {
    position: absolute;
    padding: 4px;
    background-color: rgba(0, 0, 0, 0.4);
    border: 0px solid #000;
    color: #000;
    white-space: nowrap;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    pointer-events: none;
    box-shadow: 0 1px 3px rgba(0,0,0,0.4);
    word-break: break-all;
    
}
    </style>
</head>

<body>
    <div class="main">
        <div class="head">
            <div class="search-box">
                <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="off">
                <div class="clear"></div>
                <div class="search-results" style="display: none;">

                    <div class="result-item" data-lat='111' data-lng='222'>
                        <span class="loc-type">رستوران</span>
                        <span class="loc-title">رستوران و قوه خانه سنتی سون لرن</span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
    </div>
    <a href="<?= site_url('user.php'); ?>">
        <img title="بخش کاربری" src="assets/img/accunt.png" class="currentLoc">
    </a>

    <a href="<?= site_url('about.php'); ?>">
        <img title="درباره ما" src="images/about.png" class="currentLoc" style="right: 10px;background: none; width:26px;">
    </a>

    <a href="<?= site_url('adm.php'); ?>">
        <img title="بخش مدیریت" src="assets/img/manage.png" class="currentLoc" style="right: 60px;background: none;">
    </a>

    <div class="modal-overlay" id="addLocationModal" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">ثبت لوکیشن</h3>
            <div class="modal-content">
                <form id='addLocationForm' action="<?= site_url('process/addLocation.php') ?>" method="post">
                <div class="field-row">
                            <div class="field-title">مختصات</div>
                            <div class="field-content">
                                <input type="text" name='lat' id="lat-display" readonly style="width: 160px;text-align: center;">
                                <input type="text" name='lng' id="lng-display" readonly style="width: 160px;text-align: center;">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">نام مکان</div>
                            <div class="field-content">
                                <input type="hidden" name="user_id" id='user-id' value="<?= $_SESSION['loginUser']['id']; ?>">
                                <input type="text" name="title" id='l-title' placeholder="مثلا: دفتر مرکزی ایران خودرو">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">شماره تلفن</div>
                            <div class="field-content">
                                <input type="text" name="phone" id='phone' placeholder="مثلا: 09142356123">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">توضیحات</div>
                            <div class="field-content">
                                <textarea name="description" id="" cols="25" rows="5"></textarea>
                            </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">نوع</div>
                        <div class="field-content">
                            <select  name="type" id='l-type'>
                            <?php foreach(LocationTypes as $key=>$value): ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title">ذخیره نهایی</div>
                        <div class="field-content">
                            <input type="submit" value=" ثبت ">
                        </div>
                    </div>
                    <div class="ajax-result"></div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal-overlay" id="loginModal" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">فرم ورود کاربر</h3>
            <div class="modal-content">
                <form id='loginForm' action="" method="post">
                    <div class="field-row">
                            <div class="field-title">نام کاربری</div>
                            <div class="field-content">
                                <input type="text" name="username"  placeholder="نام کاربری خود را وارد کنید">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title"> رمز عبور</div>
                            <div class="field-content">
                                <input type="password" name="password" placeholder="پسورد">
                            </div>
                    </div>
                    <div class="field-row">
                        <div class="field-title"><a style="text-decoration: none;" href="<?= site_url('user.php?action=register'); ?>">ثبت نام کنید!</a></div>
                        <div class="field-content">
                            <input type="submit" name="login_user" value=" ورود ">
                        </div>
                    </div>
                    <div class="ajax-result-login"></div>
                </form>
            </div>
        </div>
    </div>

    <?php if (@$location): ?>
    <div class="modal-overlay" id="searchResultModal" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <h3 class="modal-title">اطلاعات لوکیشن</h3>
            <div class="modal-content">
                <div class="field-row">
                            <div class="field-title">مختصات</div>
                            <div class="field-content">
                                <input type="text" name='lat'  readonly style="width: 180px;text-align: center;" value="<?= @$location->lat; ?>">
                                <input type="text" name='lng'  readonly style="width: 180px;text-align: center;"  value="<?= @$location->lng; ?>">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">نام مکان</div>
                            <div class="field-content">
                                <input type="text" name="title" readonly value="<?= $location->title; ?>">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">شماره تلفن</div>
                            <div class="field-content">
                                <input type="text" name="phone"  readonly value="<?= $location->phone; ?>">
                            </div>
                    </div>
                    <div class="field-row">
                            <div class="field-title">توضیحات</div>
                            <div class="field-content">
                                <textarea name="description" cols="25" readonly rows="5"><?= $location->description; ?>"</textarea>
                            </div>
                    </div>
                    
                    <div class="field-row">
                            <div class="field-title">نوع</div>
                            <div class="field-content">
                                <input type="text" name="phone" readonly value="<?= LocationTypes[$location->type] ?>">
                            </div>
                    </div>
        
            </div>
        </div>
    </div>
    <?php endif; ?>


                                
    <?php $user_id = isset($_SESSION['loginUser']) ? $_SESSION['loginUser']['id'] : 0; ?>
    <script>
        var session =  <?php echo $user_id; ?>;
        var loc_str = '<?= $locations_str ?>';
        var locations = JSON.parse(loc_str);
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/scripts.js<?= "?i=" . rand(1,999); ?>"></script>
    <script>
        // ajax request to get locations
        $(document).ready(function () {

            $("#searchResultModal .close").click(function () {
                $('#searchResultModal').fadeOut(500);
            });
            

            $("#search").keyup(function () {
                const input = $(this);
                const searchResult = $(".search-results");
                searchResult.html("در حال جستجو");
                $.ajax({    
                    url: '<?= SITE_URL . 'process/search.php' ?>',
                    method: 'POST',
                    data: {keyword: input.val()},
                    success: function(response) {
                        searchResult.slideDown().html(response);
                    }
                });
            });

            
        });
        
        

        <?php if (@$location): ?>
            map.setView([<?= $location->lat; ?> , <?= $location->lng;?>], defaultZoom);
            // L.marker([<?= ''//$location->lat; ?> , <?= ''//$location->lng;?>]).addTo(map).;
            var searchMarker = L.marker([<?= $location->lat; ?> , <?= $location->lng;?>]).addTo(map)
            .bindPopup("<?= $location->title; ?>").openPopup();


            searchMarker.on('dblclick' ,function() {
                $("#searchResultModal").fadeIn(400);
            });
        <?php endif; ?>
    </script>
</body>
</html>


