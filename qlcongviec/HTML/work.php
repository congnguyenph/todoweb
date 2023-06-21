<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WorkFLow</title>
  <script src="https://kit.fontawesome.com/6087c56806.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS/work.css" />
  <link rel="stylesheet" href="../CSS/TaskBoardCSS/main.css" />
  <link rel="stylesheet" href="../CSS/TodoListCSS/todo.css" />
</head>

<body>
  <nav class="navbar">
    <ul class="navbar-nav">
      <li class="logo">
        <a href="./index.php" class="nav-link">
          <img src="../images/logo.png" alt="" />
        </a>
      </li>

      <li class="nav-item">
        <div class="nav-link tablink active-link" onclick="openSection(event,'todolist-section')">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path class="fa-primary" fill="#0088a9" d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
          </svg>

          <span class="link-text">To-Do List</span>
        </div>
      </li>

      <li class="nav-item">
        <div class="nav-link tablink" onclick="openSection(event,'task-board')">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path class="fa-primary" fill="#0088a9" d="M512 160c0 35.3-28.7 64-64 64H280v64h46.1c21.4 0 32.1 25.9 17 41L273 399c-9.4 9.4-24.6 9.4-33.9 0L169 329c-15.1-15.1-4.4-41 17-41H232V224H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64v64zM448 416V352H365.3l.4-.4c18.4-18.4 20.4-43.7 11-63.6l71.3 0c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64V352c0-35.3 28.7-64 64-64l71.3 0c-9.4 19.9-7.4 45.2 11 63.6l.4 .4H64v64H210.7l5.7 5.7c21.9 21.9 57.3 21.9 79.2 0l5.7-5.7H448z" />
          </svg>
          <span class="link-text">Task Board</span>
        </div>
      </li>

      <?php
      if (isset($_SESSION["userid"])) {
      ?>
        <li class="nav-item">
          <div class="nav-user">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
              <path fill="#0088a9" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
            </svg>
            <span class="link-text"><?php echo $_SESSION["username"]; ?></span>
          </div>
        </li>

        <li class="nav-item logout">
          <a href="../PHP/includes/logout.inc.php">
            <div class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path fill="#0088a9" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
              </svg>
              <span class="link-text">Log out</span>
            </div>
          </a>
        </li>
      <?php
      }
      ?>

    </ul>
  </nav>

  <main>
    <!--To-Do List Section-->
    <section id="todolist-section" class="showsection">
      <div class="todogrid">
        <div class="all-tasks">
          <form action="" data-new-list-form>
            <input type="text" class="new list" data-new-list-input placeholder="New list name" aria-label="new list name" />
            <button class="btn create" aria-label="create new list">+</button>
          </form>
        </div>

        <div id="todo-list-display-container" data-lists></div>
      </div>
    </section>

    <!--Task Board Section-->
    <section id="task-board" class="showsection" style="display: none">
      <div class="kanban"></div>
    </section>
  </main>

  <!-- Template -->
  <template id="task-template">
    <div class="task">
      <input type="checkbox" />
      <label>
        <span class="custom-checkbox"></span>
      </label>
    </div>
  </template>

  <template id="todo-list-template">
    <div class="todo-list" data-list-display-container>
      <div class="todo-header">
        <h2 class="list-title" data-list-title></h2>
        <div class="delete-stuff">
          <button class="btn delete" data-delete-list-button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
              <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
              <path fill="#0088a9" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
          </button>
          <button class="btn delete" data-clear-complete-task-button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
              <path fill="#0088a9" d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6v29.1L364.3 320h29.1c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
            </svg>
          </button>
        </div>
      </div>

      <div class="todo-body">
        <div class="tasks" data-tasks></div>

        <div class="new-task-creator">
          <form action="" data-new-task-form>
            <input type="text" class="new task" data-new-task-input placeholder="New task name" aria-label="new task name" />
            <button class="btn create" aria-label="create new task">+</button>
          </form>
        </div>
      </div>
    </div>
  </template>

  <script src="../JS/work.js"></script>
  <script src="../JS/TaskBoardJS/js/main.js" type="module"></script>
  <script src="../JS/TodoListJS/todo.js"></script>
</body>

</html>