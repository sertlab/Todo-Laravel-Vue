<template>
    <div class="entry">
        <form @submit.prevent="addTodo" enctype="multipart/form-data">
            <input name="title" class="input" type="text" placeholder="Title input" v-model="todo.title">
            <textarea name="body" class="textarea" placeholder="e.g. Hello world" v-model="todo.body"></textarea>
            <input type="submit" class="button is-primary" value="Submit">
        </form>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                todo: {}
            }
        },
        methods: {
            addTodo(){
                    let uri = 'http://127.0.0.1:8000/api/todo/create';
                    this.$emit('todoAdded',this.todo);
                    this.axios.post(uri, this.todo).then((response) => {
                        this.todo.title = '';
                        this.todo.body = '';
                        // this.axios.get('http://127.0.0.1:8000/todos');
                    });
            }
        }
    }
</script>
<style>
    .input {
        margin-bottom: 10px;
    }

    .entry {
        border: 1px solid hsl(0, 17%, 71%);
        padding: 50px;
    }

    .textarea {
        margin-bottom: 10px;
    }

    .button {
        float: right;
    }
</style>
