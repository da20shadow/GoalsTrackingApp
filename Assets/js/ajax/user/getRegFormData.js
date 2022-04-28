const registrationForm = document.getElementById('regForm');

registrationForm.addEventListener('submit',function (event){
    event.preventDefault();

    const formData = new FormData(this);

    const url = "regFormDataHandler.php";

    sendFormDataToPHP(url,formData);
})