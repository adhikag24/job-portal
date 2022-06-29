<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Job Portal</title>

    <!-- Font Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <!-- Latest compiled and minified CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Main css -->
</head>

<body>

    <div id="login">
        <h3 class="text-center text-white pt-5">Register Form</h3>
        <div class="container">

            <div id="login-row" class="row justify-content-center align-items-center">

                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <?php echo form_open_multipart('auth/register_process');?>
                            <h3 class="text-center text-info">Register</h3>
                            <?= $this->session->flashdata('message'); ?>

                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Name:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password1" id="password1" class="form-control">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Repeat Password:</label><br>
                                <input type="password" name="password2" id="password2" class="form-control">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="role" class="text-info">Register As:</label><br>
                                <select class="custom-select" name="role" id="role">
                                    <option value="" selected>Select Role</option>
                                    <option value="user">User</option>
                                    <option value="company">Company</option>
                                </select>
                                <?= form_error('role', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group" id="formForCV">
                                <!-- <label for="role" class="text-info">Register As:</label><br>
                                <select class="custom-select" name="role" id="role">
                                    <option value="user" selected>User</option>
                                    <option value="company">Company</option>
                                </select> -->
                            </div>
                            <div class="form-group" id="formForPP">
                                <!-- <label for="role" class="text-info">Register As:</label><br>
                                <select class="custom-select" name="role" id="role">
                                    <option value="user" selected>User</option>
                                    <option value="company">Company</option>
                                </select> -->
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="<?= base_url() ?>auth/login" class="text-info">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<script>
    $('#role').on('change', function() {

        $('#formForCV').empty();
        $('#formForPP').empty();
        if (this.value == 'user') {
            $('#formForCV').html(` <label for="role" class="text-info">CV (Required):</label><br>
  <input type="file" name="fileCV" class="form-control">
        `);
        }
            $('#formForPP').html(` <label for="role" class="text-info">Profile Picture:</label><br>
        <input type="file" name="fileProfileImage" class="form-control">
        `); 
        
        
    });
</script>