<?php
/**
 * This <angket.000.app> project created by :
 * Name         : syafiq
 * Date / Time  : 06 May 2017, 3:52 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

if (!isset($categories))
{
    $categories = [];
}

if (!isset($favourables))
{
    $favourables = [];
}

if (!isset($question))
{
    $question = null;
}


?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tambah Inventory</title>
    <meta name="a temlplate" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('/apple-touch-icon.png') ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/normalize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/main.min.css') ?>">

    <link href="<?php echo base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bower_components/bootstrap3_player/css/bootstrap3_player.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/inventory/edit/counselor-edit-inventory.min.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('/assets/js/html5shiv.min.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/respond.min.js') ?>"></script>
    <![endif]-->
    <script src="<?php echo base_url('/assets/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php echo base_url($profile['avatar']) ?>" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $profile['name'] ?>
                    </div>
                    <div class="profile-usertitle-job">
                        KONSELOR
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <a id="logout" type="button" class="btn btn-danger btn-sm" href="<?php echo site_url('auth/do_logout') ?>">Logout</a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('dashboard/jump?tab=dashboard') ?>">
                                <i class="glyphicon glyphicon-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('profile/jump?tab=profile') ?>">
                                <i class="glyphicon glyphicon-user"></i>
                                Profil
                            </a>
                        </li>
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('profile/jump?tab=profile%2Fedit') ?>">
                                <i class="glyphicon glyphicon-user"></i>
                                Rubah Profil
                            </a>
                        </li>
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('inventory/jump?tab=inventory') ?>">
                                <i class="glyphicon glyphicon-list"></i>
                                Lihat Inventory
                            </a>
                        </li>
                        <li class="active">
                            <a class="_nav-a-link" href="<?php echo site_url('inventory/jump?tab=inventory%2Fadd') ?>" target="_blank">
                                <i class="glyphicon glyphicon-list"></i>
                                Tambah
                                <i>Item</i>
                            </a>
                        </li>
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('student/jump?tab=student') ?>">
                                <i class="glyphicon glyphicon-flag"></i>
                                Aktivasi Siswa
                            </a>
                        </li>
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('student/jump?tab=student%2Freport') ?>">
                                <i class="glyphicon glyphicon-flag"></i>
                                Lihat Nilai Siswa
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <form id="add" action="<?php echo site_url('inventory/do_edit') ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Pernyataan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control option-text-disable" id="question" placeholder="Pernyataan" name="question" value="<?php echo $question['question'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <select id="category" name="category" class="form-control">
                                    <?php
                                    foreach ($categories as $category)
                                    {
                                        $category['description'] = ucfirst($category['description']);
                                        $selected                = $category['id'] === $question['category'] ? 'selected' : '';
                                        echo "<option value=\"{$category['id']}\" {$selected}>{$category['description']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="favour" class="col-sm-2 control-label">Favourable</label>
                            <div class="col-sm-10">
                                <select id="favour" name="favour" class="form-control">
                                    <?php
                                    foreach ($favourables as $favourable)
                                    {
                                        $favourable['description'] = ucfirst($favourable['description']);
                                        $selected                  = $favourable['id'] === $question['favour'] ? 'selected' : '';
                                        echo "<option value=\"{$favourable['id']}\" {$selected}>{$favourable['description']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="active" class="col-sm-2 control-label">Aktif</label>
                            <div class="col-sm-10">
                                <?php
                                echo "<select id=\"active\" name=\"active\" class=\"form-control\">";
                                foreach ([['id' => 1, 'description' => 'Aktif'], ['id' => 0, 'description' => 'Tidak Aktif']] as $active)
                                {
                                    $selected = $active['id'] === (int)$question['is_active'] ? 'selected' : '';
                                    echo "<option value=\"{$active['id']}\" {$selected}>{$active['description']}</option>";
                                }
                                echo '</select>';
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $question['id'] ?>">
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div class="navbar-header">
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <div class="_cs-audio">
                        <audio preload id="music" controls="controls">Browser anda tidak support untuk memutar Musik</audio>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Daftar Musik
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ol id="plList">
                                <li data-audio="<?php echo base_url('/assets/audio/mp3/music1.mp3') ?>">Musik 1</li>
                                <li data-audio="<?php echo base_url('/assets/audio/mp3/music2.mp3') ?>">Musik 2</li>
                                <li data-audio="<?php echo base_url('/assets/audio/mp3/music3.mp3') ?>">Musik 3</li>
                            </ol>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</div>

<script src="<?php echo base_url('/assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('/assets/bower_components/jquery/dist/jquery.min.js') ?>"><\/script>')</script>
<script src="<?php echo base_url('/assets/js/plugins.min.js') ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/tether/dist/js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/jquery-serialize-object/dist/jquery.serialize-object.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/bootstrap3_player/js/bootstrap3_player.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/inventory/edit/counselor-edit-inventory.min.js') ?>"></script>
</body>
</html>
