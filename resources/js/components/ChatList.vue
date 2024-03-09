<!-- resources/js/components/ChatList.vue -->
<template>
    <div>
      <h1>Chat List</h1>
      <ul>
        <li v-for="chat in chats" :key="chat.id">
          <router-link :to="'/chat/' + chat.id">{{ chat.name }}</router-link>
        </li>
      </ul>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        chats: []
      };
    },
    created() {
      this.fetchChats();
    },
    methods: {
      fetchChats() {
        axios.get('/api/chats')
          .then(response => {
            this.chats = response.data.chats;
          })
          .catch(error => {
            console.error('Error fetching chats:', error);
          });
      }
    }
  };
  </script>
