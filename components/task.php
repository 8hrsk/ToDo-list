<div class="task">
    <div class="taskMain">
        <div class="taskHead"><b><?=$taskId?>. <?=$taskTitle?></b></div>
        <div class="taskContent"><?=$taskContent?></div>
    </div>
    <div class="taskNav">
        <button class="btn btn-primary" id="editTask<?=$taskId?>">Edit</button>
        <button class="btn btn-primary" id="deleteTask<?=$taskId?>">Delete</button>
        <button class="btn btn-primary" id="completeTask<?=$taskId?>"><?=$taskState?></button>
    </div>
</div>