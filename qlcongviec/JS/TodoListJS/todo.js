const listsContainer = document.querySelector('[data-lists]');
const newListForm = document.querySelector('[data-new-list-form]');
const newListInput = document.querySelector('[data-new-list-input]');
const logout = document.querySelector('.logout');

const listTemplate = document.getElementById('todo-list-template');

const SESSION_STORAGE_LIST_KEY = 'task.lists';

let lists = [];
render();
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}

function getListsDB() {
    var ajax = new XMLHttpRequest();
    ajax.open('GET', '../PHP/todo_getData.php', true);
    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            sessionStorage.setItem(SESSION_STORAGE_LIST_KEY, this.responseText);
            console.log('Todo got successfully!');
        }
        else if (this.readyState == 4 && this.status != 200) {
            console.error('Error getting Todo: ' + ajax.statusText);
        }
    }
    lists = JSON.parse(sessionStorage.getItem(SESSION_STORAGE_LIST_KEY)) || [];
}

function postListDB() {
    var data = JSON.stringify(sessionStorage.getItem(SESSION_STORAGE_LIST_KEY));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/todo_saveData.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('Todo updated successfully!');
        } else if (xhr.readyState == 4 && xhr.status != 200) {
            console.error('Error updating Todo: ' + xhr.statusText);
        }
    };

    // Send the AJAX request with the session storage data as form data
    xhr.send('data=' + encodeURIComponent(data));
}

newListForm.addEventListener('submit', e => {
    e.preventDefault();
    const listName = newListInput.value;
    if (listName == null || listName === '') return;
    const list = createList(listName)
    newListInput.value = null
    lists.push(list)
    saveAndRender()
});

function createList(name) {
    return { id: Date.now().toString(), name: name, tasks: [] }
}

function saveAndRender() {
    save()
    render()
}

function save() {
    sessionStorage.setItem(SESSION_STORAGE_LIST_KEY, JSON.stringify(lists));
    postListDB();
}

function render() {
    clearElement(listsContainer);
    getListsDB();
    getListsDB();
    getListsDB();
    renderList();
}

function renderList() {
    lists.forEach(list => {
        var listElement = document.importNode(listTemplate.content, true);
        listElement.querySelector('[data-list-title]').textContent = list.name;

        const taskTemplate = document.getElementById('task-template')
        const deleteListButton = listElement.querySelector('[data-delete-list-button]');
        const tasksContainer = listElement.querySelector('[data-tasks]');
        const newTaskForm = listElement.querySelector('[data-new-task-form]');
        const newTaskInput = listElement.querySelector('[data-new-task-input]');
        const clearCompleteTaskButton = listElement.querySelector('[data-clear-complete-task-button]');


        renderTasks();

        function renderTasks() {
            clearElement(tasksContainer);
            list.tasks.forEach(task => {
                const taskElement = document.importNode(taskTemplate.content, true);
                const checkbox = taskElement.querySelector('input');
                checkbox.id = task.id;
                checkbox.checked = task.complete;
                const label = taskElement.querySelector('label');
                label.htmlFor = task.id;
                label.append(task.name);
                tasksContainer.appendChild(taskElement);
            });
        }

        deleteListButton.addEventListener('click', () => {
            const check = confirm("Are you sure you want to delete this item?");

            if (check) {
                lists = lists.filter(getList => getList.id !== list.id);
                saveAndRender();
            }
        });

        newTaskForm.addEventListener('submit', e => {
            e.preventDefault()
            const taskName = newTaskInput.value
            if (taskName == null || taskName === '') return
            const task = createTask(taskName)
            newTaskInput.value = null
            const selectedList = lists.find(getlist => getlist.id === list.id)
            selectedList.tasks.push(task)
            saveAndRender()
        });

        tasksContainer.addEventListener('click', e => {
            if (e.target.tagName.toLowerCase() === 'input') {
                const selectedList = lists.find(getlist => getlist.id === list.id)
                const selectedTask = selectedList.tasks.find(task => task.id === e.target.id)
                selectedTask.complete = e.target.checked
                save()
            }
        })

        clearCompleteTaskButton.addEventListener('click', e => {
            const selectedList = lists.find(getlist => getlist.id === list.id)
            selectedList.tasks = selectedList.tasks.filter(task => !task.complete)
            saveAndRender()
        })

        function createTask(name) {
            return { id: Date.now().toString(), name: name, complete: false}
        }

        listsContainer.appendChild(listElement);
    });
}

function clearElement(element) {
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}

logout.addEventListener('click', e => {
    sessionStorage.clear();
})

