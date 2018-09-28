<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>
         
                    <div class="panel-body">
                       <h3>Spisak korisnika:</h3>
                        <ul>
                          <li v-for="user in users">{{user}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['list_users'],
        data(){
          return {
             users: this.list_users
          }
        },
        
        computed: {
            formatedUser(){
                return JSON.parse(this.users);
                console.log(this.users);
            }
        }
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>

</style>
