<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Job </h1>
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
                            <h5 class="m-0 text-dark">Add Job
                            </h5>
                            <?= $this->session->userdata('message'); ?>
                        </div>
                        <div class="card-body">
                        <?= form_open_multipart(base_url('admin/insertjob')) ?>
                                <div class="form-group">
                                    <label >Title</label>
                                    <input type="text" class="form-control" id="title"
                                     name="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label >Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label >Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact"
                                        placeholder="Enter contact">
                                </div>
                                <div class="form-group">
                                    <label >Salary</label>
                                    <input type="text" class="form-control" id="salary" name="salary"
                                        placeholder="Enter salary, or type '-'">
                                </div>
                               
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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