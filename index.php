<?php
session_start();
include "Todo.php";

$todo = new Todo();

# Crear una tarea
# Listar las tareas
# Eliminar las tareas
# editar las tareas


?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>

                            <form method="POST" action="proccess.php" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="text" id="form1" name="task" class="form-control" placeholder="Enter a task here" />
                                        <input type="hidden" id="taskid" name="id" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Todo item</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($todo->list() as $key => $task) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td>
                                                <span onclick="setTask(<?= $key ?>, '<?= $task['task'] ?>')" style="color:blue;cursor:pointer;"> <?= $task['task'] ?></span>
                                            </td>
                                            <td><?= $task['status'] == 0 ? "En progreso" : "Completada" ?></td>
                                            <td>
                                                <a href="delete.php?id=<?= $key ?>" class="btn btn-danger">Delete</a>
                                                <a href="status.php?id=<?= $key ?>" class="btn btn-success ms-1"><?= $task['status'] == 0 ? "Finalizar" : "Desmarcar" ?></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function setTask(key, task) {
            document.getElementById("form1").value = task;
            document.getElementById("taskid").value = key;
        }
    </script>
</body>


</html>