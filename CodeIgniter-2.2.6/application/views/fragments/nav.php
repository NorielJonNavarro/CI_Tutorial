<nav class="navbar navbar-dark bg-dark justify-content-end">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="#" data-toggle="modal" data-target="#exampleModal">Register</a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Register</a>
        </li> -->
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>users/register">
          <div class="modal-body">
            
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input id="first-name" class="form-control" type="text" name="firstName" placeholder="First Name" required>
            </div>

            <div class="form-group">
                <label for="middle-name">Middle Name</label>
                <input id="middle-name" class="form-control" type="text" name="middleName" placeholder="Middle Name">
            </div>
            
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input id="last-name" class="form-control" type="text" name="lastName" placeholder="Last Name" required>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail Address</label>
                <input id="email" class="form-control" type="email" placeholder="E-mail Address" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" placeholder="Password" name="password" required>
            </div>

            <div class="form-group">
                <label for="verify-password">Verify Password</label>
                <input id="verify-password" class="form-control" type="password" placeholder="Verify Password" name="verifyPassword" required>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
      </form>
    </div>
  </div>
</div>

