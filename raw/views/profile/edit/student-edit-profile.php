<?php
/**
 * This <angket.000.app> project created by :
 * Name         : syafiq
 * Date / Time  : 03 May 2017, 7:05 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

setlocale(LC_TIME, 'id_ID');

if (!isset($profile))
{
    $profile = [];
}

$profile['school']     = $profile['school'] === null ? '' : $profile['school'];
$profile['grade']      = $profile['grade'] === null ? '' : $profile['grade'];
$profile['gender']     = $profile['gender'] === 'male' ? 'Laki Laki' : 'Perempuan';
$profile['address']    = $profile['address'] === null ? '' : $profile['address'];
$profile['birthplace'] = $profile['birthplace'] === null ? '' : $profile['birthplace'];
$profile['datebirth']  = $profile['datebirth'] === null ? null : $profile['datebirth'];
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit Profil</title>
    <meta name="a temlplate" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('/apple-touch-icon.png') ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/normalize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/main.min.css') ?>">

    <link href="<?php echo base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bower_components/bootstrap3_player/css/bootstrap3_player.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/profile/edit/student-edit-profile.min.css') ?>" rel="stylesheet">

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
                        SISWA
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
                        <li class="active">
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
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('inventory/jump?tab=inventory%2Ftest') ?>" target="_blank">
                                <i class="glyphicon glyphicon-list"></i>
                                Pengerjaan
                            </a>
                        </li>
                        <li>
                            <a class="_nav-a-link" href="<?php echo site_url('inventory/jump?tab=inventory%2Fresult') ?>" target="_blank">
                                <i class="glyphicon glyphicon-list"></i>
                                Hasil
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
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                            <div class="col-sm-10">
                                <img src="<?php echo base_url("{$profile['avatar']}") ?>" alt="<?php echo base_url("{$profile['avatar']}") ?>" class="img-thumbnail" id="avatar" height="256" width="256">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input id="imageupload" type="file" name="image" data-url="<?php echo site_url('profile/do_edit_avatar') ?>" class="btn col-sm-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?php echo "{$profile['name']}" ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">NISN</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?php echo "{$profile['credential']}" ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?php echo "{$profile['gender']}" ?></p>
                            </div>
                        </div>
                    </form>

                    <form id="edit" action="<?php echo site_url('profile/do_edit_additional') ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="school" class="col-sm-2 control-label">Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="school" placeholder="Sekolah" name="school" value="<?php echo "{$profile['school']}" ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="grade" class="col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-10">
                                <select id="grade" name="grade" class="form-control">
                                    <option value="10" <?php echo $profile['grade'] === 10 ? 'selected' : '' ?>>X</option>
                                    <option value="11" <?php echo $profile['grade'] === 11 ? 'selected' : '' ?>>XI</option>
                                    <option value="12" <?php echo $profile['grade'] === 12 ? 'selected' : '' ?>>XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" placeholder="Alamat" name="address" value="<?php echo "{$profile['address']}" ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthplace" class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="birthplace" placeholder="Tempat Lahir" name="birthplace" value="<?php echo "{$profile['birthplace']}" ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datebirth" class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="datebirth" name="datebirth" placeholder="Tanggal Lahir" value="<?php echo "{$profile['datebirth']}" ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
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
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/jquery-ui/ui/widget.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/jquery-iframe-transport/index.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/jquery.fileupload/index.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/tether/dist/js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/moment/min/moment.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/jquery-serialize-object/dist/jquery.serialize-object.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/bootstrap3_player/js/bootstrap3_player.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/profile/edit/student-edit-profile.min.js') ?>"></script>
</body>
</html>
