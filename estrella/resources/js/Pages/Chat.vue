<template>
  <div>
    <h1>Chat with Estrella</h1>
    <div class="chat-container">
      <div class="chat-history">
        <div v-for="message in messages" :key="message.id" class="message">
          <p><strong>{{ message.user }}:</strong> {{ message.text }}</p>
        </div>
      </div>
      <div class="chat-input">
        <input type="text" v-model="newMessage" @keyup.enter="sendMessage" placeholder="Type your message...">
        <button @click="sendMessage">Send</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: [],
      newMessage: '',
    };
  },
  methods: {
    sendMessage() {
        if (this.newMessage.trim() !== '') {
            this.$inertia.post(route('chat.send'), {
                message: this.newMessage,
            });
            this.messages.push({
                id: Date.now(),
                user: 'You',
                text: this.newMessage,
            });
            this.newMessage = '';
        }
    },
  },
};
</script>

<style scoped>
.chat-container {
  max-width: 600px;
  margin: 0 auto;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
}

.chat-history {
  height: 300px;
  overflow-y: scroll;
  border-bottom: 1px solid #ccc;
  margin-bottom: 10px;
  padding: 10px;
}

.message {
  margin-bottom: 10px;
}

.chat-input {
  display: flex;
}

.chat-input input {
  flex-grow: 1;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.chat-input button {
  margin-left: 10px;
  padding: 5px 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: #f0f0f0;
  cursor: pointer;
}
</style>
