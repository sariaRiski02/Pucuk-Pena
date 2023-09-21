
  const pass = document.getElementById("password");
  const confirm_pass = document.getElementById("confirm-pass");
  const checkbox = document.getElementById("check");

  checkbox.addEventListener('change', ()=>{

    if(checkbox.checked){
      pass.type = "text";
      confirm_pass.type = "text";
    }else{
      pass.type = "password";
      confirm_pass.type = "password";
    }
  });
