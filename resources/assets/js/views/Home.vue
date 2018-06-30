<template>
<div>

    <Notification v-if="message" :message="message"></Notification>
    <div class="field">
  <div class="control">
    <input class="input is-info" type="text" placeholder="Search members by name" @keyup="search" v-model="name">
  </div>
</div>

      <paginate
        name="users"
        :list="users"
        :per="5"
        >
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

      <tr v-for="user in paginated('users')" :key="user.id">
        <td> {{user.id}} </td>
        <td> {{user.name}} </td>
        <td> {{user.email}} </td>
        <td> {{user.card_type}} </td>
        <td> {{user.created_at}} </td>
        <td> {{user.updated_at}} </td>
        <th><a class="button is-small" @click="getSingleUser(user.id)">Info</a></th>
        <template v-if="user.id">
            <router-link :to="{ name: 'edit', params: { userId: user.id }}" tag="th">
                <a class="button is-info is-small">Edit</a>
            </router-link>
        </template>

        <th><a class="button is-danger is-small user-delete" @click="deleteUser(user.id)">Delete</a></th>
    </tr>
  </tbody>
  
</table>
</paginate>
<Info v-show = "isInfoVisible" @closeUserInfo = "isInfoVisible = false" :user="user"></Info>
<br/>
    <paginate-links for="users"></paginate-links>

</div>
</template>

<script>
    import Notification from './Notification';
    import Info from './UserInfo';
    

    export default {

        data(){
            return {
                message: "",
                users: [],
                paginate: ['users'],
                user: "", 
                isInfoVisible : false,
                name: ""
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
                .then( ({data}) => {
                    
                    self.message = "User successfully deleted";
                    
                    Event.$emit('fetchUsers');
                })
                
            },

            search()
            {
                let self = this;

                axios.get('user-search', {
                    params : {
                        name: self.name
                    }
                })
                .then( ({data}) => {
                    self.users = data;
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
                this.user = "";
            });

            Event.$on('deleteMessage', () => this.message = "");

            Event.$on('fetchUsers', () => this.getUsers());
            Event.$on('user-deleted', (id) => {
                this.deleteUser(id);
                this.isInfoVisible = false;
                this.user = "";
            });
            
        }

    }
</script>
