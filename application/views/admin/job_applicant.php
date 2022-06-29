<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Job Applicant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Job Applicant</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Job</label>
                <select class="form-control" id="selectJob">
                    <?php foreach ($data as $i) : ?>
                        <option>Select Job Posts</option>
                        <?php if ($selectedJob == $i['id']) : ?>
                            <option value=<?= $i['id'] ?> selected><?= $i['title'] ?></option>
                        <?php else : ?>
                            <option value=<?= $i['id'] ?>><?= $i['title'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h5 class="m-0 text-dark">Job Applicant List

                            </h5>
                            <?= $this->session->userdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>CV</th>
                                        <th>Status</th>
                                        <th>Update Status</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($applicants as $i) : ?>
                                        <tr>
                                            <td id="userId" style="display:none;"><?= $i['user_detail']['id'] ?></td>
                                            <td id="jobId" style="display:none;"><?= $i['job_id'] ?></td>
                                            <td><?= $i['user_detail']['name'] ?></td>
                                            <td><?= $i['user_detail']['email'] ?></td>
                                            <td><?= $i['user_detail']['name'] ?></td>
                                            <td><?= $i['status'] ?></td>
                                            <td> <select id="updateStatus" class="custom-select">
                                                    <?php foreach ($action_list as $j) : ?>
                                                        <?php if ($i['status'] == $j['description']) : ?>
                                                            <option value=<?= $j['id'] ?> selected><?= $j['description'] ?></option>
                                                        <?php else : ?>
                                                            <option value=<?= $j['id'] ?>><?= $j['description'] ?></option>
                                                        <?php endif; ?>

                                                    <?php endforeach; ?>
                                                </select></td>
                                            <!-- <td><a href="<?= base_url() ?>bid/syncbidwinner" onclick="return confirm('This Button will run function to validate all bid winner and send the notification. Are you sure?');" class="btn btn-sm btn-warning">Put Status to Interesting</a></td> -->
                                            <td>
                                                <div id="removeBtn" class="btn btn-sm btn-danger">Remove Applicant</div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                </tbody>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    function myFunction() {
        confirm("Press a button!");
    }

    $('#selectJob').on('change', function() {
        // alert("<?= base_url() ?>"+this.value)
        window.location.replace("<?= base_url() ?>admin/job_applicant?job_id=" + this.value);
    });

    $('#updateStatus').on('change', function() {
        var progressId = this.value;
        var userId = $('#userId').html();
        $.post("<?=base_url()?>jobcompany/update_job_status", {
            userId: userId,
            progressId: progressId
        }, function(response) {
            // console.log(response)
            location.reload();
        });
        // window.location.replace("<?= base_url() ?>admin/job_applicant?job_id=" + this.value);
    });

    $("#removeBtn").click(function() {
        confirm("Are you sure to remove this applicant? applicant data will forever lost!");
        var userId = $('#userId').html();
        var jobId = $('#jobId').html();

        $.post("<?=base_url()?>jobcompany/delete_applicant", {
            userId: userId,
            jobId: jobId
        }, function(response) {
            // console.log(response)
            location.reload();
        });

    });
</script>