<template>
  <section class="section">
    <div class="container">

      <!--  -->

      <div class="field is-grouped">
        <p class="control">
          <a class="button is-link" @click="back">
            Back
          </a>
        </p>
        <p class="control">
          <a class="button is-danger" @click="deleteUser">
            Delete user
          </a>
        </p>
      </div>

      <h1 class="title">Edit user information</h1>
      <hr>
      <h2 class="subtitle">
        Edit user information
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

<div class="field">
  <label class="label">Password</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="password" placeholder="Your password" value="" name="password" v-model="user.password">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Address</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="text" placeholder="Your home address" value="" name="address" v-model="user.address">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Card number</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="text" placeholder="Credit card number" value="" name="card_number" v-model="user.card_number">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Card type</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="text" placeholder="Visa/MasterCard etc" value="" name="card_type" v-model="user.card_type">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
</div>

<div class="field">
  <label class="label">Info</label>
  <div class="control has-icons-left has-icons-right">
   <textarea class="textarea" placeholder="Provide some info about yourself" name="info" v-model="user.info"></textarea>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
</div>

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

        getUser()
        {
          axios.get('user/'+this.userId)
                .then( ({data}) => {
                    this.user = data;
                });
        },

        editUser()
        {
          let self = this;
                axios.post('user/'+this.user.id, {
                    user: this.user
                })
                .then(function (response) {
                    self.$router.push({
                      name: 'Home',
                      params: {
                        message: 'User successfully edited'
                      }
                    });
                })
        },

        deleteUser()
        {
          let self = this;
          axios.post('user-delete', {
            id: this.userId
          })
          .then(function (response) {
            self.$router.push({
              name: 'Home',
              params: {
                message: "User deleted"
              }
            })        
          })
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
