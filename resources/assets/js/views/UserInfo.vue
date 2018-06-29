<template>
  <div class="modal is-active">
    <div class="modal-background">
    </div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">User details</p>
          <button class="delete" aria-label="close" @click="close"></button>
        </header>
        <section class="modal-card-body">
        <!-- Content ... -->
          <div class="card">
            <header class="card-header">
              <p class="card-header-title">
                {{ user.name }}
              </p>
              <a href="#" class="card-header-icon" aria-label="more options">
                <span class="icon">
                  <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
              </a>
            </header>
            <div class="card-content">
              <div class="content">
                <p> {{ user.email }} </p>
                <p> {{ user.address }} </p>
                <p> {{ user.card_type }} </p>
                <p> {{ user.card_number }} </p>
                <p> {{ user.info }} </p>
                <br>
                <time datetime="2016-1-1">Membership since: {{ user.created_at }}</time>
              </div>
            </div>
            <footer class="card-footer">
              <router-link :to="{name: 'edit', params: {userId: user.id}}" class="card-footer-item">
                Edit
              </router-link>
              <a class="card-footer-item" @click="deleteUser">Delete</a>
            </footer>
          </div>
        </section>
      </div>
  </div>
</template>

<script>
  export default {


    props: ['user'],

    methods: {
      
      close()
      {
        Event.$emit('closeUserInfo');
      },

      deleteUser()
      {
        Event.$emit('user-deleted', this.user.id);
      }
    }
  }
</script>