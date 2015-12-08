<section class="pagewidth login">
  <h2>User Search</h2>
  <?php
    //Display Reviews
    $users = (new GetNextUsers(10))->execute();
    foreach ($users as $user) {
      profile_bar($user, '/tnelat?src=profile&UID=' . $user['UID']);
    }
  ?>  
</section>