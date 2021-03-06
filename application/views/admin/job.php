<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Job Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Job Management</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <!-- /.card-header -->

                        <div class="card-header">
                            <h5 class="m-0 text-dark">Job List
                            <div class="float-right">
                                    <a href="<?=base_url()?>admin/add_job" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Job</a>
                                </div>
                            </h5>
                            <?= $this->session->userdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Contact</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data as $i) : ?>
                                        <tr>
                                            <td><?= $i['title'] ?></td>
                                            <td><?= $i['description'] ?></td>
                                            <td><?= $i['contact'] ?></td>
                                            <td><?= $i['salary'] ?></td>
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
</script>