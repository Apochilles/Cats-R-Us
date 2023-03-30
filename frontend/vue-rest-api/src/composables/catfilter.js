export default {
    setup() {
        function filterTodo(type) {
            activeFilter.value = type;
        }
        function resetTodo() {
            newTodo.value = "";
            newTodoType.value = "Personal";
        }
        return {
            filterTodo,
            resetTodo,
        };
    },
};
