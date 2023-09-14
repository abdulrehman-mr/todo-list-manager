/*
* Author: Abdul Rehman
* License : LL Lvato License
*/

// AJAX requests using JavaScript

// Function to add a subtask input field
function addSubtaskInput() {
    var subtaskInput = '<div class="col-12 col-md-4 subinputinit"><input type="text" class="form-control subtask my-1" placeholder="Enter a subtask"></div>';
    $('#subtaskInput').before(subtaskInput);
}

// Function to add a task to the todo list
function addTask(event) {
    event.preventDefault();
    var task = $('#taskInput').val().trim();
    var subtasks = [];
    $('.subtask').each(function () {
        var subtask = $(this).val().trim();
        if (subtask !== '') {
            subtasks.push(subtask);
        }
    });
    if (task !== '') {
        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {
                action: 'add',
                task: task,
                subtasks: subtasks
            },
            success: function (response) {
                loadTasks()
                $('#taskInput').val('');
                $('.subinputinit').remove();
                $('.subtask').val('');
            },
            error: function () {
                alert('Error adding task.');
            }
        });
    }
}
// Function to remove a task or subtask from the todo list
function removeTask(itype, itask, isubtask) {

    var type = null ;
    if(itype == "subtask" && isubtask != ""){
        var type = "subtask";
    }
    if (itype == "task" && isubtask == ""){
        var type = "task";
    }
    if(type != null){
        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {
                action: 'remove',
                type: type,
                taskIndex: itask,
                subtaskIndex: isubtask
            },
            success: function (response) {
                if (itype != null) {
                    // Update the logic here based on your needs for removing the task or subtask
                    loadTasks()
                }
            },
            error: function () {
                alert('Error removing task.');
            }
        });
    }
}




// Function to load tasks from the server
function loadTasks() {
    $.ajax({
        url: 'index.php',
        type: 'POST',
        data: {
            action: 'get'
        },
        success: function (response) {
            var tasks = JSON.parse(response);
            $('#itemList').empty();
            var i_task=0;

            $.each(tasks, function (index, task) {
                
                var taskHtml = `<li class="itask" onclick="removeTask('task','`+i_task+`','')">` + task.task + `</li>`;
                if (task.subtasks.length > 0) {
                    var ii_task=0;
                    taskHtml += '<ul>';
                    $.each(task.subtasks, function (i, subtask) {
                        taskHtml += `<li class="isubstask" onclick="removeTask('subtask','`+i_task+`','`+ ii_task +`')">` + subtask + `</li>`;
                        ++ii_task;
                    });
                    taskHtml += '</ul>';
                }
                
                $('#itemList').append(taskHtml);
                ++i_task;
                
            });
            // Attach event listener to remove tasks
            $('#itemList li').click(removeTask);
        },
        error: function () {
            alert('Error loading tasks.');
        }
    });
}

$(document).ready(function () {
    // Load tasks when the page is ready
    loadTasks();

    // Rest of the code...

    // Add subtask button click event
    $('#addSubtaskBtn').click(function () {
        addSubtaskInput();
    });

    // Form submit event
    $('#addForm').submit(function (event) {
        addTask(event);
    });
});