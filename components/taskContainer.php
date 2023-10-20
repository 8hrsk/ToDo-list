<?php
    //create an array of tasks

    $tasks = [
    //     [
    //         'id' => '1',
    //         'title' => 'Task 1',
    //         'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    //         'state' => 'Complete'
    //     ],
    //     [
    //         'id' => '2',
    //         'title' => 'Task 2',
    //         'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    //         'state' => 'Complete'
    //     ]
    ];

?>

<main class="taskContainer">
    <?php
    foreach ($tasks as $task) {
        $taskId = $task['id'];
        $taskTitle = $task['title'];
        $taskContent = $task['content'];
        $taskState = $task['state'];

        require './components/task.php';
    }
    ?>
</main>