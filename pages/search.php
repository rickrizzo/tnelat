<!DOCTYPE html>
<html>
  <head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/page_resources.php"; ?>
  </head>

  <body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/nav.php"; ?>
    <section class="pagewidth login">
      <h2>User Search</h2>

      <?php
        $users = (new GetNextUsers(10))->execute();
        foreach ($users as $user) {
          profile_bar($user, '/tnelat/pages/profile.php?UID=' . $user['UID']);
        }
      ?>  
    </section>
  </body>
</html>
