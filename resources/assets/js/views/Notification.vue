<template>
  <div v-if="isVisible" class="notification is-success">
    <button class="delete" @click="hide"></button>
    {{ message }}
  </div>
</template>

<script>
  export default {
    props: ['message'],

    data(){
      return {
        isVisible: true
      }
    },

    methods: {
      hide(){
        this.isVisible = false;
        Event.$emit('deleteMessage');
      }
    }
  }
</script>