function bodyLock(){
    const body = document.getElementById("body")
    body.classList.toggle("overflow-y-hidden");
    console.log(body);
}

function showAddListButton(){
    const menu_tambah = document.getElementById("menu_tambah");
    // bodyLock();
    menu_tambah.classList.toggle("hidden")

}

function modalDeleteAlert(){
    const menu_tambah = document.getElementById("delete_alert");
   
    menu_tambah.classList.toggle("hidden")
    bodyLock();

}

function addFormUser(){
    const menu_tambah = document.getElementById("tambah_form_user");
   
    menu_tambah.classList.toggle("hidden")
    bodyLock();
}
function addFormSkil(){
    const menu_tambah = document.getElementById("tambah_form_skil");
   
    menu_tambah.classList.toggle("hidden")
    bodyLock();
}