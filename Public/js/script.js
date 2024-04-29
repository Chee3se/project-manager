function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev, status) {
    ev.preventDefault();
    var id = ev.dataTransfer.getData("text");
    var task = document.getElementById(id);
    var target = ev.target;

    while (target && !target.classList.contains('task_type')) {
        target = target.parentNode;
    }

    if (target) {
        task.remove();

        target.appendChild(task);

        // Make an AJAX call
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/task/update_status", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id + "&status=" + status);
    }
}

