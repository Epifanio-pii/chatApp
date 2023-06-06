 const searchBar = document.querySelector('.search input');
 searchBtn = document.querySelector('.search button'),
 userList = document.querySelector(".user-list");

 searchBtn.onclick = () =>{
    searchBar.classList.toggle('active');
    searchBar.focus();
    searchBtn.classList.toggle('active');
    searchBar.value = "";
 } 


 searchBar.onkeyup=()=>{
    let searchTerm = searchBar.value;

    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");

    }

    let xhr = new XMLHttpRequest(); /*Cria um Objecto XML */
    xhr.open("POST", "../php/searchp.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userList.innerHTML = data;
                  console.log(searchTerm);
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm="  + searchTerm); 
 }

 
 setInterval(()=>{
    /*Assincrono Javascript AJAX*/

    let xhr = new XMLHttpRequest(); /*Cria um Objecto XML */

    xhr.open("GET", "../php/userp.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                    userList.innerHTML = data;
                }
            }
        }
    }
    xhr.send(); 
 }, 500)

 ;
