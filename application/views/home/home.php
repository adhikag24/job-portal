<div class="container">
    <div class="container-fluid justify-content-center">
        <div class="row mt-5" id="productCardSection">
            <?php foreach ($data as $job) : ?>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body pt-0 px-0">
                            <div class="mt-3 text-center"><?= $job['title'] ?></div>

                            <div class="d-flex flex-row justify-content-between mb-0 mt-3 px-3"> <span class="text-muted mt-1">Employer:</span>
                                <h6><?= $job['employer']['name'] ?></h6>
                            </div>
                            <hr class="mt-2 mx-3">
                            <div class="d-flex flex-row justify-content-between px-3 pb-2">
                                <div class="d-flex flex-column">
                                    <p><?= $job['description'] ?></p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between px-3 pb-2">
                                <div class="d-flex flex-column"><span class="text-muted">Salary:</span></div>
                                <div class="d-flex flex-column">
                                    <h6><strong>Rp.<?= $job['salary'] ?></strong></h6>
                                </div>
                            </div>
                          
                            <?php if($job['is_applied']): ?>
                            <div class="mx-3 mt-3 mb-2"><a href="<?= base_url() ?>job/apply_job/<?=$job['id']?>" type="button" class="btn btn-danger btn-block disabled"><small>
                                        Applied
                                    </small></a></div>
                            <?php else: ?>
                                <div class="mx-3 mt-3 mb-2"><a href="<?= base_url() ?>job/apply_job/<?=$job['id']?>" type="button" class="btn btn-danger btn-block"><small>
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
</div>