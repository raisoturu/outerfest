<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - OUTERFEST(an Interfest 2.0)</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animations.css">
    <link rel="stylesheet" type="text/css" href="https://schematics.its.ac.id/css/materialform.css">
    <style>
        .form {
            position: relative;
            z-index: 99;
        }

        #register .form {
            width: 80%;
        }



        #nav-tab a {
            display: flex;
            height: 50px;
            align-items: center;
            justify-content: center;
            flex: 1 1 auto;
            color: #777;
            text-decoration: none;
            font: 100% SFProBold;
            font-size: 1.5rem;
        }

        #nav-tab .active {
            border-bottom: 3px solid #a73e5c;
            color: #fff;
        }

        .nav-tabs {
            width: 60%;
            border: 0;
        }

        html,
        body {
            height: 100%;
        }

        .dashboard-container {
            min-height: 100%;
            position: relative;
            padding-bottom: 0 !important;
        }



        @media only screen and (min-width: 992px) {
            #sponsor {
                margin-left: -32px;
            }

            #dashboard nav {
                width: 20%;
            }

            #dashboard .dashboard-container {
                width: 80%;
                float: right;
                padding: 32px;
            }
        }

        .event {
            padding: 0 !important;
        }

        .title {
            color: black !important;
        }

        .subtitle {
            font-family: SFProRegular;
            font-size: .7em;
        }

        #header {
            height: unset;
            background: white;
            padding: 0;
        }

        .nama {
            font-size: 1.1rem;
        }

        ul.info {
            list-style-type: none;
            padding-left: 16px;
        }

        p {
            color: black !important;
        }

        .bukalapak {
            color: black !important;
            padding-left: 0.5rem !important;
            display: inline-block !important;
        }

        .bukalapak img {
            height: 3rem;
            margin-left: 6px;
        }

        .npclogo {
            display: inline-block;
        }

        .center {
            text-align: center;
        }

        .card {
            padding: 1em;
            flex-direction: row;
            justify-content: space-between;
            margin: 0;
        }

        .card>h4 {
            margin: 0;
        }
    </style>
</head>

<body id="dashboard">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-nav-primary dashboard-nav">
        <div class="mesh"></div>
        <!-- <a class="navbar-brand" href="#">
            <img src="../../../assets/img/outerfest_logo_sml.png" alt="logo">
        </a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="scroll nav-link" href="<?= base_url() ?>homeadmin/dashboard">DASHBOARD</a>
                </li>
                <li class="nav-item">
                    <a class="scroll nav-link" href="<?= base_url() ?>homeadmin/peserta">PESERTA</a>
                </li>
                <li class="nav-item">
                    <a class="scroll nav-link" href="<?= base_url() ?>homeadmin/transaksi">TRANSAKSI</a>
                </li>
                <li class="nav-item">
                    <a class="scroll nav-link" href="#">PENGUMUMAN</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        AKUN
                    </a>
                    <div class="dropdown-menu dashboard-dropdown" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Ganti Password</a>
                        <a class="dropdown-item" href="#logout">Logout</a>
                    </div>
                </li>
                <li class="nav-item ">

                </li>
            </ul>
        </div>
    </nav>
    <!-- end head -->
    <!-- start body -->

    <div class="dashboard-container">
        <div style="min-height: 100%;padding-bottom: 5rem;">
            <div class="alert alert-secondary">
                Selamat datang, <b>Anvaqta Tangguh Wisesa</b> !
            </div>
            <div class="container">
                <div class="mt-4">
                    <div class="row">
                        <div class="col">
                            <h3 class="title">Pengumuman</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <a><button class="btn btn-success mr-2" href="<?= base_url() ?>homeadmin/addpengumuman">Pengumuman Baru</button></a>
                    <input type="text" class="form-control" placeholder="Find an announcement" aria-label="Find ur girlfriends" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
                <table class="table table-hover table-responsive-sm mt-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Perubahan Timeline NPC Junior dan Senior</td>
                            <td>Terdapat perubahan timeline untuk penyisihan NPC, untuk lebih jelasnya silahkan download dan baca ulang rulebook NPC.</td>
                            <td>19 Juli 2018</td>
                            <td>Anvaqta</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">Detail</button>
                                    <button type="button" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Perubahan Timeline NPC Junior dan Senior</td>
                            <td>Terdapat perubahan timeline untuk penyisihan NPC, untuk lebih jelasnya silahkan download dan baca ulang rulebook NPC.</td>
                            <td>19 Juli 2018</td>
                            <td>Anvaqta</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">Detail</button>
                                    <button type="button" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Perubahan Timeline NPC Junior dan Senior</td>
                            <td>Terdapat perubahan timeline untuk penyisihan NPC, untuk lebih jelasnya silahkan download dan baca ulang rulebook NPC.</td>
                            <td>19 Juli 2018</td>
                            <td>Anvaqta</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">Detail</button>
                                    <button type="button" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Perubahan Timeline NPC Junior dan Senior</td>
                            <td>Terdapat perubahan timeline untuk penyisihan NPC, untuk lebih jelasnya silahkan download dan baca ulang rulebook NPC.</td>
                            <td>19 Juli 2018</td>
                            <td>Anvaqta</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">Detail</button>
                                    <button type="button" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pagination pagination-sm">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                            1
                            <span class="sr-only">(current)</span>
                        </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end main -->
    <!-- start footer -->

    <!-- end footer -->
    <!-- SCRIPT HERE -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.zoom.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/css3-animate-it.js"></script>

</body>

</html>