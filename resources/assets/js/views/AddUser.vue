<template>
<form @submit.prevent="addUser">
<div class="field">
  <label class="label">Name</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="text" placeholder="Text input" value="" name="name" v-model="user.name">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="email" placeholder="Email input" value="" name="email" v-model="user.email">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Password</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="password" placeholder="Password" value="" name="password" v-model="user.password">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Confirm password</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="password" placeholder="Confirm password" value="" name="password_confirmation" v-model="user.password_confirmation">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Submit</button>
  </div>
</div>
</form>
</template>

<script>
    export default {

        data(){
            return {
                user: {}
            }
        },

        methods: {
            addUser(){
                let self = this;
                axios.post('user', {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                    password_confirmation: this.user.password_confirmation
                })
                .then(function (response) {
                    self.$router.push({
                        path: '/',
                        query: {
                            message: "User successfully added"
                        }
                    });
                })
            }
        },

        mounted() {
            
        }
    }
</script>
