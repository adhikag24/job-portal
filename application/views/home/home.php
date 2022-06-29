<div class="container mt-5 mb-3">
    <div class="row">
        <?php foreach ($data as $i) : ?>
            <div class="col-md-4">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0"><?= $i['employer']['name'] ?></h6>
                            </div>
                        </div>
                        <!-- <div class="badge"> <span>Design</span> </div> -->
                    </div>
                    <div class="mt-5">
                        <h3 class="heading"><?= $i['title'] ?></h3>
                        <div class="mt-3">
                            <!-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                            <div class="description">
                                <?= $i['description'] ?>
                            </div>
                            <div class="my-3"> <span class="text1"> <?= $i['applicant'] ?> Applied</span> </div>

                            <?php if ($i['is_applied']) : ?>
                                <div class="mx-3 mt-3 mb-2"><a href="<?= base_url() ?>job/apply_job/<?= $i['id'] ?>" type="button" class="btn btn-danger btn-block disabled"><small>
                                            Applied
                                        </small></a></div>
                            <?php else : ?>
                                <div class="mx-3 mt-3 mb-2"><a href="<?= base_url() ?>job/apply_job/<?= $i['id'] ?>" type="button" class="btn btn-success btn-block"><small>
                                            Apply
                                        </small></a></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    body {
        background-color: #eee
    }

    .card {
        border-radius: 10px
    }

    .c-details span {
        font-weight: 300;
        font-size: 13px
    }

    .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }

    .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fed85d;
        justify-content: center;
        align-items: center
    }

    .progress {
        height: 10px;
        border-radius: 10px
    }

    .progress div {
        background-color: red
    }

    .text1 {
        font-size: 14px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }
</style>