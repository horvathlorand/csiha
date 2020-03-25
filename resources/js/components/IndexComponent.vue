<template>
    <div>
        <h1>Todo</h1>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label>Állapot:</label>
                    <select class="btn btn-secondary btn-sm" v-model="filter">
                        <option value="1">Kész</option>
                        <option value="0">Folyamatban</option>
                    </select>
                    <button class="col-md-2 btn btn-success btn-sm" @click.prevent="filterTodos(filter)">Szűrés</button></td>
                </div>
            </div>
            <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Todo létrehozása</router-link>
            </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Todo cím</th>
                <th>Todo állapot</th>
                <th>Todo leírás</th>
                <th>Funkciók</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="todo in todos" :key="todo.id">
                    <td>{{ todo.id }}</td>
                    <td>{{ todo.title }}</td>
                    <td>{{ todo.condition == 1 ? 'Kész' : 'Folyamatban' }}</td>
                    <td>{{ todo.description }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: todo.id }}" class="btn btn-primary">Szerkesztés</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deleteTodo(todo.id)">Törlés</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todos: {},
                filter: '1'
            }
        },
        created() {
            let uri = `/api/todos`;
            this.axios.get(uri).then(response => {
                this.todos = response.data;
            });
        },
        methods: {
            deleteTodo(id) {
                let uri = `/api/delete/todo/${id}`;
                this.axios.delete(uri).then(response => {
                    this.todos.splice(this.todos.indexOf(id), 1);
                });
            },
            filterTodos(filter) {
                let uri = `/api/filter/todos/${filter}`;
                this.axios.get(uri, this.filter).then((response) => {
                    this.todos = response.data;
                    this.$router.push({name: 'filter', params: { id: this.filter}});
                });
            }
        }
    }
</script>