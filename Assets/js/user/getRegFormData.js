const registrationForm = document.getElementById('regForm');

registrationForm.addEventListener('submit',function (event){
    event.preventDefault();

    const formData = new FormData(this);

    // const url = "register.php";
    const url = "App/Http/user/regFormHandler.php";

    if (checkAllInputs()){
        sendFormDataToPHP(url,formData,"message");
    }else {
        document.getElementById('message')
            .innerHTML = "<h5 class='text-danger text-center'>Invalid Fields!</h5>";
    }

})