<template>
<div>
    <Notification v-if="message" :message="message"></Notification>
    <table class="table is-hoverable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>E-mail</th>
      <th>Date Joined</th>
      <th>Date updated</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="user in users">
        <td> {{user.id}} </td>
        <td> {{user.name}} </td>
        <td> {{user.email}} </td>
        <td> {{user.created_at}} </td>
        <td> {{user.updated_at}} </td>
        <th><a class="button is-info is-small" @click="editUser(user.id)">Edit</a></th>
        <th><a class="button is-danger is-small user-delete" @click="deleteUser(user.id)">Delete</a></th>
    </tr>
  </tbody>
</table>
</div>
</template>

<script>
    import Notification from './Notification';
    export default {

        data(){
            return {
                users: [],
                message: ""
            }
        },

        methods: {

            redirectMessage(){
                 if (this.$route.query.message)
                    {
                        this.message = this.$route.query.message
                    }

            },
            
            getUsers(){
                axios.get('users')
                .then( ({data}) => {
                    this.users = data;
                });
            },

            deleteUser(id){
                let self = this;
                axios.post('user-delete', {
                    id
                })
                .then(function (response) {
                    self.$router.push({
                        path: '/',
                        query: {
                            message: "User successfully deleted"
                        }
                    });

                    if (self.$route.query.message)
                    {
                        self.message = self.$route.query.message
                    }

                    Event.$emit('fetchUsers');
                })
                
            }
        },

        components: {
            Notification
        },

        created() {

            this.getUsers();

            if (this.$route.query.message)
            {
                this.message = this.$route.query.message
            }

            Event.$on('deleteMessage', () => this.message = "");

            Event.$on('fetchUsers', () => this.getUsers());
        }

    }
</script>
