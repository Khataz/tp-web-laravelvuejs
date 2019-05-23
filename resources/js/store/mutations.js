let mutations = {
    ADD_TODO(state, todo) {
        state.todos.unshift(todo)
    },
    CACHE_REMOVED(state, todo) {
        state.toRemove = todo;
    },
    CACHE_PROGRESSED(state, todo) {
        state.toProgress = todo;
    },
    GET_TODOS(state, todos) {
        state.todos = todos
    },
    DELETE_TODO(state, todo) {
        state.todos.splice(state.todos.indexOf(todo), 1)
        state.toRemove = null;
    },
    PROGRESS_TODO(state, todo) {
        console.log(todo)
        todo.progressed = true
    }
}
export default mutations