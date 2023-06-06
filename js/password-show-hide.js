const pswField = document.querySelector('input[type="password"]');

toggleBtn = document.querySelector('i');

toggleBtn.onclick =() =>{
    if (pswField.type === "password") {
    pswField.type = "text";
    toggleBtn.classList.add("active");
  } else {
    pswField.type = "password";
    toggleBtn.classList.remove("active");

  }
}