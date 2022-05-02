const goalForm = document.getElementById('goalForm');

goalForm.addEventListener('submit',function (event){
    event.preventDefault();

    const formData = new FormData(this);

    // const url = "register.php";
    const url = "App/Http/goals/goalFormHandler.php";

    sendFormDataToPHP(url,formData,"message");

    // if (checkAllInputs()){
    //     sendFormDataToPHP(url,formData,"message");
    // }else {
    //     document.getElementById('message')
    //         .innerHTML = "<h5 class='text-danger text-center'>Invalid Fields!</h5>";
    // }

})