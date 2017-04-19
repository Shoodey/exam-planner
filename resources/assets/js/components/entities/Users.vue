<script>
  export default{

    user: null,

    users: [
      {
        id: 1,
        name: "Hajar Zehimi",
        email: "hz@aui",
        password: "123",
        role: "Registration Office"
      },
      {
        id: 2,
        name: "Violetta Cavalli Sofrza",
        email: "vcs@aui",
        password: "123",
        role: "Instructor"
      }
    ],

    getUsers(){
      return this.users;
    },

    getUser (){
      return this.user;
    },

    setUser(id){
      this.users.forEach(user => {
        if(id == user.id)
          this.user = user
      })
    }

  }
</script>
