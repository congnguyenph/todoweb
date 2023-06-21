export default class KanbanAPI {
	static getItems(columnId) {
		const column = read().find(column => column.id == columnId);

		if (!column) {
			return [];
		}

		return column.items;
	}

	static insertItem(columnId, content) {
		const data = read();
		const column = data.find(column => column.id == columnId);
		const item = {
			id: Math.floor(Math.random() * 100000),
			content
		};

		if (!column) {
			throw new Error("Column does not exist.");
		}

		column.items.push(item);
		save(data);

		return item;
	}

	static updateItem(itemId, newProps) {
		const data = read();
		const [item, currentColumn] = (() => {
			for (const column of data) {
				const item = column.items.find(item => item.id == itemId);

				if (item) {
					return [item, column];
				}
			}
		})();

		if (!item) {
			throw new Error("Item not found.");
		}

		item.content = newProps.content === undefined ? item.content : newProps.content;

		// Update column and position
		if (
			newProps.columnId !== undefined
			&& newProps.position !== undefined
		) {
			const targetColumn = data.find(column => column.id == newProps.columnId);

			if (!targetColumn) {
				throw new Error("Target column not found.");
			}

			// Delete the item from it's current column
			currentColumn.items.splice(currentColumn.items.indexOf(item), 1);

			// Move item into it's new column and position
			targetColumn.items.splice(newProps.position, 0, item);
		}

		save(data);
	}

	static deleteItem(itemId) {
		const data = read();

		for (const column of data) {
			const item = column.items.find(item => item.id == itemId);

			if (item) {
				column.items.splice(column.items.indexOf(item), 1);
			}
		}

		save(data);
	}
}

function read() {
	getKanbanDB();
	getKanbanDB();
	getKanbanDB();
	const json = sessionStorage.getItem("kanban-data");

	if (!json) {
		return [
			{
				id: 1,
				items: []
			},
			{
				id: 2,
				items: []
			},
			{
				id: 3,
				items: []
			},
		];
	}

	return JSON.parse(json);
}

function save(data) {
	sessionStorage.setItem("kanban-data", JSON.stringify(data));
	postKanbanDB();
}

function getKanbanDB() {
    var ajax = new XMLHttpRequest();
    ajax.open('GET', '../PHP/kanban_getData.php', true);
    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            sessionStorage.setItem("kanban-data", this.responseText);
            console.log('Kanban got successfully!');
        }
        else if (this.readyState == 4 && this.status != 200) {
            console.error('Error getting Kanban: ' + this.statusText);
        }
    }
}

function postKanbanDB() {
    var data = JSON.stringify(sessionStorage.getItem("kanban-data"));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/kanban_saveData.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('Kanban updated successfully!');
        } else if (xhr.readyState == 4 && xhr.status != 200) {
            console.error('Error updating Kanban: ' + xhr.statusText);
        }
    };

    // Send the AJAX request with the session storage data as form data
    xhr.send('data=' + encodeURIComponent(data));
}