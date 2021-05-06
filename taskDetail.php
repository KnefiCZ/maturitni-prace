<?php include_once "header.php";?>
<?php
  $idTask = filter_input(INPUT_GET, 'id_task'); // z URL načtené ID
  $task = TaskModel::getTask($idTask);
?>
<h1>Popis úkolu: <?= $task->title; ?></h1>
    <p>ID úkolu: <?= $task->id_task ?> </p>
    <p>Popisek úkolu: <?= $task->description; ?></p>
    <p>Úkol zadán v: <?= $task->datetime_from; ?></p>
    <p>Úkol vypracovat do: <?= $task->datetime_to; ?></p>
    <p>Název a ID tasklistu: <?= $task->title; ?>, <?= $task->id_tasklist; ?></p>
      <!-- Only admin & realizator -->
      <?php // tato tabulka se zobrazí jen ADMINOVY! 
        $roleName = UserModel::getRole();
        if(in_array($roleName, ['admin', 'implementer'])) { ?> 
      <a class="btn btn-primary" href="taskEdit.php?id_task=<?= $idTask ?>">Úprava úkolu</a>
      <a class="btn btn-primary" href="taskDelete.php?id_task=<?= $idTask ?>">Smazání úkolu</a>
      <?php } ?>
      <hr>
<h2>Komentáře:</h2>
  <?php 

    $content = filter_input(INPUT_POST, 'content');
    $submit = filter_input(INPUT_POST, 'submit');

    $message = "napište komentář...";
    if(isset($submit)) {
        $message = "Odesíláte komentář...";
        $result = TaskModel::addComment($content, $idTask, $_SESSION['id_user']);
        if($result) {
            $message .= "Komentář byl úspěšně přídán...";       
        }
        else {
            $message .= "Nebylo možné přidat komentář!!";
        }
    }
  ?>
    <?= $message; ?>
    <form action="taskDetail.php?id_task=<?= $idTask ?>" method="post">
      <textarea name="content" id="content" cols="30" rows="2" placeholder="Napiště komentář..."> </textarea> <br> 
      <input type="submit" name="submit" id="submit"> 
    </form>
    <hr>
    
    <?php 
    $comments = TaskModel::getComments($idTask);
    //var_dump($comments);
    ?>
    
    <table class="table">
    <tr>
            <td><b> Jméno a příjmení </b></td>
            <td><b> Komentář </b></td>
            <td><b> Přidán v: </b></td>
          </tr>
      <tbody>
        <?php
          foreach ($comments as $comment) {
          ?>
          <tr>
            <td> <?= $comment->firstname . " " . $comment->lastname; ?> </td>
            <td> <?= $comment->content; ?> </td>
            <td> <?= $comment->created_at; ?> </td>
          </tr>
        <?php
          } 
        ?>
      </tbody>
    </table>
<?php require_once "footer.php";?>
