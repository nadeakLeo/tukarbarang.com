import { Button } from 'bootstrap-vue/es/components';

Vue.use(Button);

<template lang="html">
    <div class="panel-block field">
        <div class="control">
            <input type="text" class="input" v-on:keyup.enter="sendChat" style="width: 50%;height: 35px;font-size:120%;" v-model="chat">
            <input type="button" class="btn " style="background-color: #008CBA; color: white;" value="Send" v-on:click="sendChat">
        </div>


    </div>
</template>

<script>
    export default {
        props: ['chats', 'userid', 'partnerid'],
        data() {
            return {
                chat: ''
            }
        },
        methods: {
            sendChat: function(e) {
                if (this.chat != '') {
                    var data = {
                        chat: this.chat,
                        user_id: this.userid,
                        partner_id: this.partnerid

                    }
                    axios.post('/chat/sendChat', data).then((response) => {
                        this.chats.push(data)
                    this.chat = '';

                    })
                }
            }
        }
    }
</script>

<style scoped>
    .panel-block {
        flex-direction: row;
        width: 100%;
        border: none;
        padding: 0;
    }
    input {
        border-radius: 0;
    }
    .auto-width {
        width: auto;
    }
</style>
