import React from 'react';
import CreateTodo from './create-todo';
import TodosList from './todos-list';

const todos = [
{
    task: 'uebat dimasu',
    isCompleted: false
},
{
    task: 'SAAAASAI',
    isCompleted: true
}
];

export default class App extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            todos
        };
    }

    render() {
        return (
            <div>
                <h1>ForceDo</h1>
                <CreateTodo todos={this.state.todos} createTask={this.createTask.bind(this)} />
                <TodosList
                    todos={this.state.todos} /* хранит в себе состояние */
                    toggleTask={this.toggleTask.bind(this)} /* хранят в себе все обработчики */
                    saveTask={this.saveTask.bind(this)}
                    deleteTask={this.deleteTask.bind(this)}
                />
            </div>
        );
    }

    toggleTask(task) {
        const foundTodo = _.find(this.state.todos, todo => todo.task === task); /* находит необходимый пункт списка */
        foundTodo.isCompleted = !foundTodo.isCompleted; /* Заменяет значение от которого зависит отображение элемента и обновляет состояние*/
        this.setState({ todos: this.state.todos });
    }

    createTask(task) {
        this.state.todos.push({
            task,
            isCompleted: false
        }); /* Добавляет в массив еще одно задание с предопределенным свойством isCompleted */
        this.setState({ todos: this.state.todos });
    }

    saveTask(oldTask, newTask) /* После нажатия "Сохранить" во время редактирования задачи, находит что именно нужно заменить, записывая в переменную foundTodo элемент списка, совпадающий со старым заданием, записывает в него новое задание и обновляет состояние */ {
        const foundTodo = _.find(this.state.todos, todo => todo.task === oldTask);
        foundTodo.task = newTask;
        this.setState({ todos: this.state.todos });
    }

    deleteTask(taskToDelete) {
        _.remove(this.state.todos, todo => todo.task === taskToDelete); /* Удаляет из масива объект равный объекту для удаления и обновляет состояние*/
        this.setState({ todos: this.state.todos });
    }
}
