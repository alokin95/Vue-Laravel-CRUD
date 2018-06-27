<template>
  <section class="section">
    <div class="container">
      <a class="button is-outlined" @click="back">Back</a>
      <h1 class="title">User information</h1>
      <hr>
      <h2 class="subtitle">
        <p>{{ user.name }}</p>
        <br/>
        <p>{{ user.email }}</p>
      </h2>
      <form @submit.prevent="editUser">
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

<!-- <div class="field">
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
</div> -->

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Edit</button>
  </div>
</div>
</form>
    </div>
  </section>

</template>

<script>
    export default {
      props: ['userId'],

      data()
      {
        return {
          user: {}
        }
      },

      methods: {

        getUser(){
          axios.get('user/'+this.userId)
                .then( ({data}) => {
                    this.user = data;
                });
        },

        back()
        {
          this.$router.go(-1);
        }
        
      },

      created(){
        this.getUser();
      }

    }
</script>
