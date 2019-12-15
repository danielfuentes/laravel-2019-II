window.onload=function(){
  //  Esta es otra forma de capturar el elemento de formulario var registerForm = document.forms[0]
  let register= document.querySelector('#formulario')
  //console.log(register.elements.first_name)
  //Esto lo hago para disponer el focus en ese campo apenas carga el formulario
  register.elements.name.focus();
  console.log(register.elements.name.value);
  register.onsubmit = function(evento) {
    
      if (!validateRegister()) {
        evento.preventDefault()
      }else{
        register.submit()
      }
    }
    function validateRegister() {
      let {name, email, password,password_confirmation} = register.elements
      if (!validateName(name)) return false;
      if (!validateEmail(email)) return false;
      if (!validatePassword(password)) return false;
      if (!validatePasswordRepeat(password, password_confirmation)) return false;
      
      return true;
      }
      function validateName(name) {
          console.log("Hola");
          let errorName = document.getElementById('errorName');
          if (name.value.length < 1){
            errorName.innerHTML = "Por favor complete el campo Nombre";
            errorName.classList.add('alert-danger');
            name.classList.add('is-invalid');
            return false;
          } else{
            errorName.innerHTML = "";
            errorName.classList.remove('alert-danger');
            name.classList.remove('is-invalid');
            name.classList.add('is-valid');
            register.elements.email.focus();
            return true;
          }
  }
  function validateEmail(email) {
      let re = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
      let error = document.getElementById('errorEmail');
      if (!re.test(email.value)){
        email.classList.add('is-invalid');
        console.log(error);
        error.innerHTML= "Debe colocar un email válido";
        error.classList.add('alert-danger');
        //errorEmail.classList.add('alert-danger');
       // email.addEventListener('change',cambioNombre);
      return false
    }else{
      error.innerHTML= "";
      error.classList.remove('alert-danger');
      email.classList.remove('is-invalid');
      email.classList.add('is-valid');
      register.elements.password.focus()
      return true;
    }
  }
  function validatePassword(password) {
        //En la contraseña como minimo se requiero ocho caracteres, usando mayusculas y minusculas, si desean usar 6 caracteres  deben entonces cambiar el 8    (   d]{8,}$/  ) por un 6 
        let re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
        let errorPass = document.getElementById('errorPassword');
        if (!re.test(password.value)) {
          errorPass.innerHTML = "Debe especificar una contraseña válida";
          errorPass.classList.add('alert-danger');
          password.classList.add('is-invalid');
          return false;
        }else{
          errorPass.innerHTML = "";
          errorPass.classList.remove('alert-danger');
          password.classList.remove('is-invalid');
          password.classList.add('is-valid');
          register.elements.password_confirmation.focus();
          // swal('Error', 'Ingrese una contraseña válida', 'error')
          return true;
        }
      }
      function validatePasswordRepeat(password,password_confirmation){
        console.log(password.value);
        console.log(password_confirmation.value);
        errorPass2 = document.getElementById('errorPasswordConfirmation');
        if (password.value != password_confirmation.value) {
          errorPass2.innerHTML = "Las conraseñas no coinciden";
          errorPass2.classList.add('alert-danger');
          password_confirmation.classList.add('is-invalid');
          return false;
        }else{
          errorPass2.innerHTML = "";
          errorPass2.classList.remove('alert-danger');
          password_confirmation.classList.remove('is-invalid');
          password_confirmation.classList.add('is-valid');
          register.elements.button.focus();
          return true;
        }
      }

      //Aquí incorporo lo referido a la incorporación de la visualización del código del password, lo realice usando jquery
      //Ojo no se les olvide incorporar el llamado a <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>   y eso lo colocan en su app.blade.php antes del cierre del </body>
      let password1 = $('#password')
      $('#ojoPassword').click(function () { 
          if(password1.attr('type')=='password'){
              $('#ojoPassword').attr('name','eye')
              password1.attr('type','text')
          }else{
               $('#ojoPassword').attr('name','eye-off')            
               password1.attr('type','password')
          }
      });        


  } // Fin de la función onload
  