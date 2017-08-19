import React from 'react';

export default class TodosListItem extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            isEditing: false 
        };
    }

    renderTaskSection() /* Блок текста задания */ {
        const { task, isCompleted } = this.props;

        const taskStyle = {
            color: isCompleted ? 'green' : 'red',
            cursor: 'pointer'
        };
		/* Подключает стили в зависимости от логического значения isCompleted*/

        if (this.state.isEditing) /* Если состояние подразумевает значение isEditing: true */ {
            return (
                <div>
                    <form onSubmit={this.onSaveClick.bind(this)}>
                        <input type="text" defaultValue={task} ref="editInput" /> 
                    </form>
                </div>/* Возвращает форму с активным полем ввода со стандартным значением, равным тексту предыдущего задаия */
            );
        }

        return (
            <div style={taskStyle} /* Вариативные стили по клику, зависящие от isComplited */
                onClick={this.props.toggleTask.bind(this, task)}
            >
                {task}
            </div>
        );
    }

    renderActionsSection() {
        if (this.state.isEditing) /* Если состояние подразумевает значение isEditing: true, дает возможность сохранить или отменить действие и вернуть значение isEditing без изменения значения атрибута task*/ {
            return (
                <div>
                    <button onClick={this.onSaveClick.bind(this)}>сахранить</button>
                    <button onClick={this.onCancelClick.bind(this)}>не</button>
                </div>
            );
        }

        return /* Если условие не выполняется, то выводятся кнопки, которые не подразумевают редактирование*/ (
            <div>
                <button onClick={this.onEditClick.bind(this)}>ПЕРЕПЛАНИРОВАТЬ</button>
                <button onClick={this.props.deleteTask.bind(this, this.props.task)}>УДАЛИТЕД</button>
            </div>
        );
    }

    render() /* Выводит блок с текстом задания и блок с кнопками*/ {
        return (
            <div>
                {this.renderTaskSection()} 
                {this.renderActionsSection()}
            </div>
        );
    }

    onEditClick() {
        this.setState({ isEditing: true }); /* Просто заменяет элементы для редактирования */
    }

    onCancelClick() {
        this.setState({ isEditing: false }); /* Возвращает к исходному состоянию */
    }

    onSaveClick(event) {
        event.preventDefault();

        const oldTask = this.props.task;
        const newTask = this.refs.editInput.value;
        this.props.saveTask(oldTask, newTask);
        this.setState({ isEditing: false }); /* Обработчик сохраняющий старое задание, новое задание и передающий их в saveTask */
    }
}
