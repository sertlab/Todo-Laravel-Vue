<template>    
    <article class="message is-primary">
        <div class="message-header">
            <p>{{todos.title}}</p>
            <button class="delete" aria-label="delete"></button>
        </div>
        <div class="message-body" style="background-color: grey">
            {{todos.body}}
        </div>
    </article>
</template>
<script>
    export default {
        data()  {
            return {
                nothing: []
            }
        },
        props: ['todos'],
    }
</script>