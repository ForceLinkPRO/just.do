import React from 'react';

export default class TodosList extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            error: null
        };
    }

    renderError() /* Возвращает ошибку со стилем и текстом взятым из состояния error или null*/ {
        if (!this.state.error) { return null; }

        return <div style={{ color: 'red' }}>{this.state.error}</div>;
    }

    render() {
        return (
            <form onSubmit={this.handleCreate.bind(this)}>
                <input type="text" placeholder="ШО ДЕЛАТЬ?" ref="createInput" />
                <button>Добавить</button>
                {this.renderError()}
            </form>
        );
    }

    handleCreate(event) {
        event.preventDefault();

        const createInput = this.refs.createInput; /* Считывает данные с формы createInput сохраняет их в переменной task, проверяет на ошибки и если validateInput не равно null создает задание, если равно - выдает соответсвующую ошибку */
        const task = createInput.value;
        const validateInput = this.validateInput(task);

        if (validateInput) {
            this.setState({ error: validateInput });
            return;
        }

        this.setState({ error: null });
        this.props.createTask(task);
        this.refs.createInput.value = ''; /* По завершению работы функции поле ввода очищается*/ 
    }

    validateInput(task) {
        if (!task) {
            return 'ДОБАВЬ ЗАДАНИЕ ';
        } else if (_.find(this.props.todos, todo => todo.task === task)) {
            return 'Такое уже есть';
        } else {
            return null;
        }
    }
}
