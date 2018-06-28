<template>
<div>
    <Notification v-if="message" :message="message"></Notification>
    <table class="table is-hoverable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>E-mail</th>
      <th>Card type</th>
      <th>Date Joined</th>
      <th>Date updated</th>
    </tr>
  </thead>
  <tbody>
      <tr v-for="user in users">
        <td> {{user.id}} </td>
        <td> {{user.name}} </td>
        <td> {{user.email}} </td>
        <td> {{user.card_type}} </td>
        <td> {{user.created_at}} </td>
        <td> {{user.updated_at}} </td>
        <th><a class="button is-small" @click="getSingleUser(user.id)">Info</a></th>
        <router-link :to="{ name: 'edit', params: { userId: user.id }}" tag="th">
            <a class="button is-info is-small">Edit</a>
        </router-link>
        <th><a class="button is-danger is-small user-delete" @click="deleteUser(user.id)">Delete</a></th>
    </tr>
  </tbody>
</table>
<Info v-show = "isInfoVisible" @closeUserInfo = "isInfoVisible = false"></Info>
</div>
</template>

<script>
    import Notification from './Notification';
    import Info from './UserInfo';
    export default {

        props: ['message'],

        data(){
            return {
                users: [],
                user: "",
                isInfoVisible : false
            }
        },

        methods: {
            
            getUsers()
            {
                axios.get('users')
                .then( ({data}) => {
                    this.users = data;
                });
            },

            getSingleUser(id)
            {
                this.isInfoVisible = true;

                 axios.get('user/' + id)
                .then( ({data}) => {
                    this.user = data;
                });
            },

            deleteUser(id)
            {
                let self = this;
                axios.post('user-delete', {
                    id
                })
                .then(function (response) {
                    
                    self.message = "User successfully deleted";

                    if (self.$route.params.message)
                    {
                        self.message = self.$route.params.message
                    }

                    Event.$emit('fetchUsers');
                })
                
            }
        },

        components: {
            Notification,
            Info
        },

        created() {

            this.getUsers();

            if (this.$route.params.message)
            {
                this.message = this.$route.params.message
            }

            Event.$on('closeUserInfo', () => {
                this.isInfoVisible = false;
            });

            Event.$on('deleteMessage', () => this.message = "");

            Event.$on('fetchUsers', () => this.getUsers());
        }

    }
</script>
