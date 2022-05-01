const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit',function (event){
    event.preventDefault();

    const formData = new FormData(this);

    // const url = "register.php";
    const url = "App/Http/user/formsHandlers/loginFormHandler.php";

    sendFormDataToPHP(url,formData,"message","account.php");

    // if (checkAllInputs()){
    //     sendFormDataToPHP(url,formData,"message");
    // }else {
    //     document.getElementById('message')
    //         .innerHTML = "<h5 class='text-danger text-center'>Invalid Fields!</h5>";
    // }

})