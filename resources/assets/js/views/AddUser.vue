<template>
<div>
<a class="button is-outlined" @click="back">Back</a>
<br>
<br>
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
    <button class="button is-link">Submit</button>
  </div>
</div>
</form>
</div>
</template>

<script>
  
    import Validator from '../Validator';

    export default {

        data(){
            return {
                user: {},
                errors: Validator
            }
        },

        methods: {
            addUser(){

                let self = this;

                axios.post('user', {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                    card_type: this.user.card_type,
                    card_number: this.user.card_number,
                    info: this.user.info,
                    address: this.user.address
                })
                .then(function (response) {
                    self.$router.push({
                        name: 'Home',
                        params : {
                          message: 'User successfully added'
                        }
                    });
                })
                .catch(function (error) {
                  self.errors.store(error.response.data);
              });
            },

          back()
          {
            this.$router.go(-1);
          }
        },

        mounted() {
            
        }
    }
</script>
