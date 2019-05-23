<template>
    <li class="todo" :class="{ completed: todo.completed, progressed:todo.progressed }">
        <div class="view">
            <input type="checkbox" v-model="todo.completed" class="toggle">
            <label>{{todo.title}}</label>
            <button @click="removeTodo(todo)" class="destroy"></button>
            <button @click="progressTodo(todo)" class="progress"></button>
        </div>
    </li>
</template>
<script>
export default {
    name: "Todo",
    props: ["todo"],

    methods: {
    removeTodo(todo) {
        this.$store.commit("CACHE_REMOVED", todo)
        this.$store.dispatch("DELETE_TODO", todo);
    },
    progressTodo(todo) {
        this.$store.commit("CACHE_PROGRESSED", todo)
        this.$store.dispatch("PROGRESS_TODO", todo);  
    }
    }
};
</script>