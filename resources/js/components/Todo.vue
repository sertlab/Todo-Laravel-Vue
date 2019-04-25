<template>
    <div>
        <div class="todoShape" v-for="(todo) in todos" v-bind:key="todo.id">
          <list-todo :todos="todo"></list-todo>
        </div>
        <div class="entry">
        <!-- <form @submit.prevent="addTodo" enctype="multipart/form-data">
            <input name="title" class="input" type="text" placeholder="Title input" v-model="todobox.title">
            <textarea name="body" class="textarea" placeholder="e.g. Hello world" v-model="todobox.body"></textarea>
            <input type="submit" class="button is-primary" value="Submit">
        </form> -->
        <add-todo></add-todo>
    </div>
    </div>
</template>
<script>
  import AddTodo from './Todo/AddTodo.vue'
  import ListTodo from './Todo/ListTodo.vue'
  
  export default {
    components: {
      'add-todo': AddTodo,
      'list-todo': ListTodo
    },
    data()  {
      return {
          todos: [],
          test: null,
          todobox: {}
      }
    },
    mounted(){

      var self = this;
      this.axios.get('http://127.0.0.1:8000/api/todos/')
                .then(function (response) {
                      // console.log(response.data);
                      self.todos = response.data;
                }).catch(function (error) {
                      console.log(error);
                });
      // console.log(self.todos);
    },
    methods: {
            addTodo(e){
                    // var self = this;
                    let uri = 'http://127.0.0.1:8000/api/todo/create';
                    let test = this.todobox
                    this.axios.post(uri, this.todobox).then((response) => {
                          this.todos.push(test);
                          this.todobox.title = 'spo';
                          this.todobox.body = 'spi';
                    });
            }
    } 
  }
  // }
</script>
<style>
  .todoShape {
    margin-bottom: 40px;
  }
</style>