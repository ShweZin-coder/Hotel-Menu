<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../assets/css/customer/signin.css" />
    <title>Nature Land</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/admin/naturelandlogo.png">
    <style>
      label{
        color:red;
      }
     .btn{
      margin-top:25px !important;
     }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email" id="signinuseremail"/><br>
              <label class="emailerror"></label>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="signinuserpassword" /><br>
              <label class="passworderror"></label>
            </div>
            <input type="button" value="Login" class="btn solid" id="btnsignin" />
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" id="signupusername"/><br>
              <label class="upnameerror"></label>
              
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" id="signupuseremail" /><br>
              <label class="upemailerror"></label>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="signupuserpassword" />
              <label class="uppassworderror"></label>
            </div>
            <input type="button" class="btn" value="Sign up" id="btnsignup" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
             Be one of members in our nature land.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="../assets/img/customer/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Welcome back from Nature Land!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="../assets/img/customer/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../assets/js/customer/signin.js"></script>
    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.1/firebase-app.js";
  import { getAuth, createUserWithEmailAndPassword,signInWithEmailAndPassword, sendEmailVerification, onAuthStateChanged,signOut} from "https://www.gstatic.com/firebasejs/9.9.1/firebase-auth.js";
  import {getDatabase,ref,get,set,child,update,remove} from "https://www.gstatic.com/firebasejs/9.9.1/firebase-database.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyCF_GbA73gLbWqDpz6zMWrO5uOwFhiu3Ro",
    authDomain: "naturelandhotel-ff493.firebaseapp.com",
    databaseURL: "https://naturelandhotel-ff493-default-rtdb.firebaseio.com",
    projectId: "naturelandhotel-ff493",
    storageBucket: "naturelandhotel-ff493.appspot.com",
    messagingSenderId: "808884251438",
    appId: "1:808884251438:web:df4a9651b5e0018550e8bf"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const auth = getAuth();
  const db = getDatabase();

  const signup = document.getElementById("btnsignup");
  const signin = document.getElementById("btnsignin");

  /* signup form */
  function sign_up_action()
  {
    var name = document.getElementById("signupusername").value;
    var email = document.getElementById("signupuseremail").value;
    var password = document.getElementById("signupuserpassword").value;
    var upnameerror = document.querySelector(".upnameerror");
    var upemailerror = document.querySelector(".upemailerror");
    var uppassworderror = document.querySelector(".uppassworderror");
    if(name == "")
    {
       upnameerror.innerHTML = "Please fill name";
    }
 else if(email == "")
    {
      upemailerror.innerHTML = "Please fill email";
    }
 else if(password == "")
    {
      uppassworderror.innerHTML = "Please fill password";
    }
   else
    {
           // create account with firebase authentication
       createUserWithEmailAndPassword(auth,email, password)
  .then((userCredential) => {
    // Signed in 
    const user = userCredential.user;
    set(ref(db, 'owners/' + user.uid), {
    name:name,
    email:email,
    password:password
  }).then(() => {
    alert("Data saved successfully");
    window.location.assign('signin.html');
})
.catch((error) => {
  alert(error);
});

  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    alert(errorMessage);
  });
}

 }
 function sign_in_action()
 {
    var email = document.getElementById("signinuseremail").value;
    var password = document.getElementById("signinuserpassword").value;
    var emailerror = document.querySelector(".emailerror");
    var passworderror = document.querySelector(".passworderror");
   if(email == "")
    {
      emailerror.innerHTML = "Please fill email";
    }
 else if(password == "")
    {
      passworderror.innerHTML = "Please fill password";
    }
   else{
      signInWithEmailAndPassword(auth, email, password)
  .then((userCredential) => {
    // Signed in 
    const user = userCredential.user;
    var lgDate = new Date();
    update(ref(db, 'owners/' + user.uid), {
     last_login:lgDate,
  }).then(() => {
    alert("User logged in successfully");
    window.location.assign("../admin/index.html");
})
.catch((error) => {
  alert(error);
});
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
    alert(errorMessage);
  });
  onAuthStateChanged(auth, (user) => {
  if (user) {
    sendEmailVerification(auth.currentUser)
  .then(() => {
    alert("sent");
    // ...
  })
  .catch((error) => {
  alert(error);
});

  } else {
    alert("Please Sign in");
  }
});
    }

 }
 signup.addEventListener("click",sign_up_action);
  signin.addEventListener("click",sign_in_action);
</script>
  </body>
</html>
