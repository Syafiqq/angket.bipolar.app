<?php
/**
 * This <angket.000.app> project created by :
 * Name         : syafiq
 * Date / Time  : 06 May 2017, 12:26 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

setlocale(LC_TIME, 'id_ID');

if (!isset($students))
{
    $students = [];
}

if (!isset($reports))
{
    $reports = [];
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Daftar Siswa</title>
    <meta name="a temlplate" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('/apple-touch-icon.png') ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/normalize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/main.min.css') ?>">

    <link href="<?php echo base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bower_components/datatables-autofill-bootstrap/css/autoFill.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bower_components/bootstrap3_player/css/bootstrap3_player.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/student/report/counselor-report-student.min.css') ?>" rel="stylesheet">

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
                        <li>
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
                        <li class="active">
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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="table-responsive">
                                <table id="report_tb" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 40px">No</th>
                                        <th style="width: 150px">NISN</th>
                                        <th>Nama</th>
                                        <th style="width: 100px">Kelas</th>
                                        <th style="width: 100px">Sekolah</th>
                                        <th style="width: 100px">Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($students as $student)
                                    {
                                        ++$no;
                                        $student['grade'] = $student['grade'] === null ? '-' : $student['grade'];
                                        $student['school'] = $student['school'] === null ? '-' : $student['school'];
                                        $url = site_url('student/detail');

                                        echo '<tr>';
                                        echo "<td>{$no}</td>";
                                        echo "<td>{$student['credential']}</td>";
                                        echo "<td>{$student['name']}</td>";
                                        echo "<td>{$student['grade']}</td>";
                                        echo "<td>{$student['school']}</td>";
                                        echo "<form id=\"login\" action=\"{$url}\" method=\"get\">";
                                        echo "<td><input type='hidden' name='student' class='hidden' value='{$student['id']}'><button type=\"submit\" class=\"btn btn-default\">Detail</button></td>";
                                        echo '</form>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/datatables.net-autofill/js/dataTables.autoFill.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/datatables-autofill-bootstrap/js/autoFill.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/datatables.net-buttons/js/dataTables.buttons.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/bower_components/bootstrap3_player/js/bootstrap3_player.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/student/report/counselor-report-student.min.js') ?>"></script>
</body>
</html>

