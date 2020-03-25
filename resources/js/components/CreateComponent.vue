<template>
    <div>
        <h1>Todo létrehozása</h1>
        <form @submit.prevent="addTodo">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Todo cím:</label>
                      <input type="text" class="form-control" v-model="todo.title">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Todo állapot:</label>
                      <select id="condition" class="btn btn-secondary" v-model="todo.condition">
                          <option value="1">Kész</option>
                          <option value="0">Folyamatban</option>
                      </select>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Todo leírás:</label>
                      <textarea class="form-control" v-model="todo.description" rows="5"></textarea>
                  </div>
              </div>
          </div><br />
          <div class="form-group">
              <button class="btn btn-primary">Létrehozás</button>
          </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todo: {
                    'condition': '1'
                }
            }
        },
        methods: {
            addTodo() {
                let uri = 'api/create/todo';
                this.axios.post(uri, this.todo).then((response) => {
                this.$router.push({name: 'todos'});
                });
            }
        }
    }
</script>