<div class="container mt-5">
  <h3 class="mb-3">Application List</h3>
  <div class="card">
    <div class="card-body">
      <table id="table_id" class="display">
        <thead>
          <tr>
            <th>Job Name</th>
            <th>Employer</th>
            <th>Salary</th>
            <th>Applied At</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $i) : ?>
            <tr>
              <td><?= $i['job_detail']['title'] ?></td>
              <td><?= $i['employer']['name'] ?></td>
              <td>Rp.<?= number_format($i['job_detail']['salary']) ?></td>
              <td><?= $i['job_detail']['created_at'] ?></td>
              <?php if ($i['status'] == 'Did not Pass!') : ?>
                <td><span class="badge badge-danger"><?= $i['status'] ?></span></td>
              <?php elseif ($i['status'] == 'Offering') : ?>
                <td><span class="badge badge-success"><?= $i['status'] ?></span></td>
              <?php else : ?>
                <td><span class="badge badge-primary"><?= $i['status'] ?></span></td>
              <?php endif; ?>
              <!-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></button></td> -->
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#table_id').DataTable();
  });
</script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bid History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your Recent Bid
        <ul class="list-group">
          <?php foreach ($data[0]['history'] as $i) : ?>
            <li class="list-group-item"><?= number_format($i['amount']) ?> - <?= $i['created_at'] ?> </li>

          <?php endforeach; ?>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>