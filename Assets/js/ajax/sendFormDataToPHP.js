function sendFormDataToPHP(url,data,notificationID = 'NO',redirect = "NO"){
    const settings = {
        method: 'POST',
        body: data
    };
    console.log("----------------------------------------------")
    console.log("Successfully Called SendFormToPHP Function!")

    fetch(url,settings)
        .then(function (response){
            console.log("Successfully Fetching!")
            return response.text();
        })
        .then(function (returnedPHPData){
            if (notificationID !== 'NO'){
                console.log("This is the notification Element ID Where will show message: " + notificationID)

                if (returnedPHPData.indexOf("Success") >= 0){
                    let print = "<h5 class='text-success text-center'>" + returnedPHPData + "</h5>";
                    document.getElementById(notificationID).innerHTML = print;
                }else{
                    let print = "<h5 class='text-danger text-center'>" + returnedPHPData + "</h5>";
                    document.getElementById(notificationID).innerHTML = print;
                }
            }
            //Check if returned message contains word 'Success'
            if (returnedPHPData.indexOf('Success') >= 0){
                console.log("This is a success message from PHP: " + returnedPHPData);
            }
            if (redirect !== "NO"){
                setTimeout(function(){
                    window.location.replace(redirect);
                }, 1300);
            }
            console.log(returnedPHPData);
            return returnedPHPData;
        })
        .catch(function (error){
            console.log(error)
            return error;
        })
}