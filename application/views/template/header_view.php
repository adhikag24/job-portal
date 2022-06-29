<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.steps.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>


    <!-- Date Range Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Jquery Validate -->

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.steps.js"></script>

    <title>Final Project</title>

    <div id="nav">
        <nav class="container navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">      <img src="<?= base_url() ?>assets/image/other/logo_application.png  " width="25%" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto">
                    <!-- <router-link to="/" class="nav-item nav-link">Home</router-link> -->
                    <!-- <router-link to="my-bid" class="nav-item nav-link">My Bid</router-link> -->
                </div>
                <?php if (empty($section)):  
                    
                    $section = "";?>
                   
                <?php endif;?>
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link <?= $section == "home" ? 'active' : ''; ?>" href="<?= base_url() ?>" width="150px">Ongoing Bid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $section == "upcomingBid" ? 'active' : ''; ?>" href="<?= base_url() ?>home/upcomingbid">Upcoming Bid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $section == "finishedBid" ? 'active' : ''; ?>" href="<?= base_url() ?>home/finishedbid">Finished Bid</a>
                    </li> -->
                    
                </ul>
                <div class="container">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <!-- <div class="col-md-8">
                            <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="Looking For Some Product?"> <button class="btn btn-default"><span class="text-white">Search</span></button> </div>
                        </div> -->
                    </div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <form class="d-flex">
                            <?php if ($this->session->userdata('is_login')) : ?>
                                <div class="dropdown mr-3">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $this->session->userdata('name') ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php  if($this->session->userdata('role') != 'user'):?>
                                        <a class="dropdown-item" href="<?= base_url() ?>admin">Admin Page</a>
                                        <?php else: ?>
                                        <a class="dropdown-item" href="<?= base_url() ?>job/my_application">Application List</a>
                                        <!-- <a class="dropdown-item" href="<?= base_url() ?>product/myproduct">My Product</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>bid/mybid">My Bids</a> -->
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-warning shadow" href="<?= base_url() ?>auth/logout">Logout</a>
                                </div>
                            <?php else : ?>
                                <div>
                                    <a class="btn btn-success shadow" href="<?= base_url() ?>auth/login">Login</a>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</head>

<body>