const form = document.querySelector('.signup form');
continueBtn = form.querySelector('.button input');
errorText = form.querySelector('.error-text');


form.onsubmit = (e) =>{
    e.preventDefault();  
}
continueBtn.onclick = ()=>{
    /*Assincrono Javascript AJAX*/

    let xhr = new XMLHttpRequest(); /*Cria um Objecto XML */

    xhr.open("POST", "../php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "sucesso"){
                    location.href = "user.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}