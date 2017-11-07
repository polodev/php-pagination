<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>pagination</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"/>
</head>
<body class="bg-primary">
  <div class="container bg-light p-5 mt-5">
    <h2 class="text-center mb-4">
      <a href="/" class="text-danger">People Data</a>
    </h2>
    <form method="get">
      <div class="row">
        <div class="col-md-4 ml-auto">
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="search" id="search" placeholder="Serach By person name ..." class="form-control">
              <div class="input-group-addon">
                <button type="submit" class="btn btn-info">
                  Search
                </button>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </form>
    <table class="table table-bordered">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
      </tr>
      <?php foreach ($people as $person) : ?>
        <tr>
          <td><?= $person->id; ?></td>
          <td><?= $person->name; ?></td>
          <td><?= $person->email; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <nav>
      <ul class="pagination">
        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
          <a href="/?page=<?= $page - 1 ; ?>" class="page-link">Previous</a>
        </li>
        <?php for($i = 1; $i <= $total_page; $i++) : ?>
          <li class="page-item <?= $page == $i ? 'active' : '' ?>">
            <a href="/?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
          </li>
        <?php endfor; ?>
        <li class="page-item <?= $page >= $total_page ? 'disabled' : '' ?>">
          <a href="/?page=<?= $page + 1 ; ?>" class="page-link">Next</a>
        </li>
      </ul>
  </nav>

    
  </div>
</body>
</html>