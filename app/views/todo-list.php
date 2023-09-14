<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <section class="vhh-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-10">
                    <div class="card mask-custom">
                        <div class="card-body p-4 text-white">
                            <div class="text-center pt-3 pb-2">
                                <img src="assets/images/todo.webp" alt="Check" width="60">
                                <h2 class="my-4">Task List</h2>
                            </div>
                            <form id="addForm">
                                <div class="row">
                                    <div class="col-12 col-md-8 my-1">
                                        <input type="text" id="taskInput" class="form-control" placeholder="Enter a new task">
                                    </div>
                                    <div class="col-12 col-md-4 my-1">
                                        <div class="d-flex justify-content-around">
                                            <button type="button" id="addSubtaskBtn" class="btn btn-warning text-white wb-50">+ Child</button>
                                            <button type="submit" class="btn btn-warning text-white wb-50">Add Task</button>
                                        </div>
                                    </div>
                                    <div class="col-12 my-1">
                                        <div class="row">
                                            <div class="col-12" id="subtaskInput"><input type="text" class="form-control subtask my-1" placeholder="Enter a subtask"></div>
                                        </div>
                                    </div>

                                </div>

                            </form>
                            <ul id="itemList"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center text-white py-2">&copy; 2020-23 Abdul Rehman <a href="https://lvato.com/"></a></p>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/frontend.js"></script>
</body>

</html>