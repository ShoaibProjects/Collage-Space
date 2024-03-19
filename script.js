
let ScArea = document.getElementById('scarea');
function phonenum() {
    ScArea.innerHTML = "07325288068 or 7325288070";
}
function email() {
    ScArea.innerHTML = "tsec.mp@gmail.com";
}
let userCredencials = {
    username : '',
    password : '',
    team : '',
    desc : '',
    role : ''
}
let signupBox = document.getElementById("signupbox");
let loginBox = document.getElementById("loginbox");
let blurBox = document.getElementById("blurbox");
let popupBox = document.getElementById("pop-cont");
let userIcon = document.getElementById('usericon');
let userInfo = {
    nameInfo : document.getElementById("user-name"),
    teamInfo : document.getElementById("user-team"),
    roleInfo : document.getElementById("user-role"),
    descInfo : document.getElementById("user-desc")
};
let updateBox = document.getElementById("updatebox");
updateBox.classList.add('invisible');
let update = {
    username : document.getElementById("update-username"),
    password : document.getElementById("update-password"),
    team : document.getElementById("update-team"),
    desc : document.getElementById("update-desc"),
    role : document.getElementById("update-role")
};
let editBtn = document.getElementById("edit-btn");
let logoutBtn = document.getElementById("logout-btn");
let body=document.body;
let modeBtn = document.getElementById('modeBtn');
let NotLogged = true;
let account = true;
let dark = false;
modeSwitcher();
let xhr4= new XMLHttpRequest();
        xhr4.open('POST', 'sessionCheck.php', false);
        xhr4.onload = function(){
            if(xhr4.status === 200){
                let responseData = JSON.parse(xhr4.responseText);
                if(responseData.Status=='OK'){
                    NotLogged = false;
                    console.log(responseData.Status);
                    userInfo.nameInfo.innerHTML = responseData.name;
                    switch(responseData.team){
                        case 'TJ':
                            userInfo.teamInfo.innerHTML = 'Team Java';
                            break;
                        case 'TCPP':
                            userInfo.teamInfo.innerHTML = 'Team C++';
                            break;    
                        case 'TP':
                            userInfo.teamInfo.innerHTML = 'Team Python';
                            break;
                        case 'TAI':
                            userInfo.teamInfo.innerHTML = 'Team AI ML';
                            break;
                        case 'TW':
                            userInfo.teamInfo.innerHTML = 'Team Web Development';
                            break;
                        case 'TD':
                            userInfo.teamInfo.innerHTML = 'Team Data Science';
                            break;
                        case 'TAnd':
                            userInfo.teamInfo.innerHTML = 'Team Android Dev.';
                            break;
                        case 'TDSA':
                            userInfo.teamInfo.innerHTML = 'Team DSA';
                            break;
                    };
                    userInfo.roleInfo.innerHTML = responseData.role;
                    userInfo.descInfo.innerHTML = responseData.desc;

                    userCredencials.username = responseData.name;
                    userCredencials.team = responseData.team;
                    userCredencials.desc = responseData.desc;
                    userCredencials.role = responseData.role;
                }
                if(responseData.mode){
                    dark = responseData.mode;
                    modeSwitcher();
                }
                // console.log(responseData.mode);

            }
        };
        xhr4.send();
modeBtn.addEventListener("click",function(){
    dark=!dark;
    modeSwitcher();
    let xhr5= new XMLHttpRequest();
    let darkJson = { value : dark.toString()};
    xhr5.open('POST', 'darkMode.php', true);
    xhr5.onload = function(){
        if(xhr5.status === 200){
            let responseData = JSON.parse(xhr5.responseText);
            // console.log(responseData);
            // console.log(darkJson.value);
        }
    };
    xhr5.send(JSON.stringify(darkJson));
});
function modeSwitcher(){
    if(dark){
        body.classList.add('dark-mode');
        modeBtn.innerHTML = '<ion-icon name="sunny-outline"></ion-icon>';
    }
    else{
        body.classList.remove('dark-mode');
        modeBtn.innerHTML = '<ion-icon name="moon-outline"></ion-icon>';
    }
}
logoutBtn.addEventListener('click',function(){
    let logoutStatus = {value : true};
    let xhr6 = new XMLHttpRequest();
    xhr6.open('POST', 'logout.php', false);
    xhr6.onload = function(){
        if(xhr6.status === 200){
            let responseData = JSON.parse(xhr6.responseText);
            if(responseData.res == 'done'){
                console.log('done');
                location.reload();
            }
        }
    };
    xhr6.send(JSON.stringify(logoutStatus));
});
let editBtnFC = true;
editBtn.addEventListener('click',function(){
    updateBox.classList.remove('invisible');
    popupBox.classList.remove('invisible');
    blurBox.classList.remove('invisible');
    loginBox.classList.add('invisible');
    signupBox.classList.add('invisible');
    if(editBtn){
    update.username.value = userCredencials.username;
    update.team.value = userCredencials.team;
    update.desc.value = userCredencials.desc;
    update.role.value = userCredencials.role;
    }
    editBtn = false;
});
document.getElementById('edit-cancel').addEventListener('click',function(event){
    event.preventDefault();
    updateBox.classList.add('invisible');
    popupBox.classList.add('invisible');
    blurBox.classList.add('invisible');
});
document.getElementById("updateForm").addEventListener('submit',function(event){
    event.preventDefault();
    let formData = {
        username : update.username.value,
        password : update.password.value,
        team : update.team.value,
        desc : update.desc.value,
        role : update.role.value
    }
    let xhr7 = new XMLHttpRequest();
    xhr7.open('POST', 'update.php', false);
    xhr7.onload = function(){
        if(xhr7.status === 200){
            let responseData = JSON.parse(xhr7.responseText);
            console.log(responseData.res);
            if(responseData.res == 'done'){
                
                refresh();
                userInfo.nameInfo.innerHTML = formData.username;
                switch(formData.team){
                    case 'TJ':
                        userInfo.teamInfo.innerHTML = 'Team Java';
                        break;
                    case 'TCPP':
                        userInfo.teamInfo.innerHTML = 'Team C++';
                        break;    
                    case 'TP':
                        userInfo.teamInfo.innerHTML = 'Team Python';
                        break;
                    case 'TAI':
                        userInfo.teamInfo.innerHTML = 'Team AI ML';
                        break;
                    case 'TW':
                        userInfo.teamInfo.innerHTML = 'Team Web Development';
                        break;
                    case 'TD':
                        userInfo.teamInfo.innerHTML = 'Team Data Science';
                        break;
                    case 'TAnd':
                        userInfo.teamInfo.innerHTML = 'Team Android Dev.';
                        break;
                    case 'TDSA':
                        userInfo.teamInfo.innerHTML = 'Team DSA';
                        break;
                };
                userInfo.roleInfo.innerHTML = formData.role;
                userInfo.descInfo.innerHTML = formData.desc;

                userCredencials.username = formData.username;
                userCredencials.password = formData.password;
                userCredencials.team = formData.team;
                userCredencials.desc = formData.desc;
                userCredencials.role = formData.role;
                updateBox.classList.add('invisible');
                popupBox.classList.add('invisible');
                blurBox.classList.add('invisible');
            }
        }
    };
    xhr7.send(JSON.stringify(formData));
});
function valid(){
    popupBox.classList.add('invisible');
    blurBox.classList.add('invisible');
    userIcon.innerHTML = '<i class="fa-solid fa-user"></i>';
}
function refresh(){
    let xhr2= new XMLHttpRequest();
    xhr2.open('POST', 'refresh.php', true);
    xhr2.onload = function(){
        if(xhr2.status === 200){
            let responseData = JSON.parse(xhr2.responseText);
        document.getElementById("Rank1name").innerHTML = responseData.SN[0];
        document.getElementById("Rank1data").innerHTML = responseData.SD[0];
        document.getElementById("Rank2name").innerHTML = responseData.SN[1];
        document.getElementById("Rank2data").innerHTML = responseData.SD[1];
        document.getElementById("Rank3name").innerHTML = responseData.SN[2];
        document.getElementById("Rank3data").innerHTML = responseData.SD[2];
        document.getElementById("Rank4name").innerHTML = responseData.SN[3];
        document.getElementById("Rank4data").innerHTML = responseData.SD[3];
        document.getElementById("Rank5name").innerHTML = responseData.SN[4];
        document.getElementById("Rank5data").innerHTML = responseData.SD[4];
        document.getElementById("Rank6name").innerHTML = responseData.SN[5];
        document.getElementById("Rank6data").innerHTML = responseData.SD[5];
        document.getElementById("Rank7name").innerHTML = responseData.SN[6];
        document.getElementById("Rank7data").innerHTML = responseData.SD[7];
        document.getElementById("Rank8name").innerHTML = responseData.SN[7];
        document.getElementById("Rank8data").innerHTML = responseData.SD[7];
        console.log(responseData);
        }
    };
    xhr2.send();
}
NotLogged = true;
if (NotLogged) {
    userIcon.innerHTML = '<i class="fa-solid fa-user-xmark"></i>';
    setTimeout(function () {
        popupBox.classList.remove('invisible');
        blurBox.classList.remove('invisible');
    }, 5000);
    function form() {
        if (account) {
            loginBox.classList.remove('invisible');
            signupBox.classList.add('invisible');
        }
        else {
            signupBox.classList.remove('invisible');
            loginBox.classList.add('invisible');
        }
    }
    form();
    function loginBtn() {
        account = true;
        form();
    }
    function signupBtn() {
        account = false;
        form();
    }
    document.getElementById("signupForm").addEventListener("submit", function(event){
        event.preventDefault();
        validateForm();
    });
    function validateForm(){
        let usernameVar = document.getElementById("signup-username").value;
        let passwordVar = document.getElementById("signup-password").value;
        let teamVar = document.getElementById("team").value;
        let descriptionVar = document.getElementById("desc").value;
        let roleVar = document.getElementById("role").value;
        let rem = document.getElementById("remember-me");
        if(rem.checked){
            rem = rem.value;
        }
        else{
            rem = '';
        }
        if(usernameVar && passwordVar && teamVar && descriptionVar && roleVar){
            let formData = {
                username : usernameVar,
                password : passwordVar,
                team : teamVar,
                description : descriptionVar,
                role : roleVar,
                remember : rem
            };
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'signup.php', true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            xhr.onload = function(){
                if(xhr.status === 200){
                    let responseData = JSON.parse(xhr.responseText);
                    if(responseData.Status=="OK"){
                        valid();
                        refresh();
                        userCredencials.username = responseData.Username;
                        userCredencials.password = responseData.Password;
                        userCredencials.team = responseData.Team;
                        userCredencials.desc = responseData.Desc;
                        userCredencials.role = responseData.Role;
                    }
                    if(responseData.Status=="usernameDuplication"){
                        console.log('username taken');
                    }
                    if(responseData.Status=="EmptyUsername"){
                        console.log('username empty');
                    }
                    if(responseData.Status=="EmptyPassword"){
                        console.log('password empty');
                    }
                    if(responseData.Status=="LessThan8Chars"){
                        console.log('Password must be at least 8 characters');
                    }
                }
            };
            xhr.send(JSON.stringify(formData));
            console.log("form submitted successfully!");
        }
        else{
            console.log("Please correctly fill the form");
        }

    }

    document.getElementById("loginForm").addEventListener("submit", function(event){
        event.preventDefault();
        authenticateForm();
    });
    function authenticateForm(){
        let usernameVar = document.getElementById("login-username").value;
        let passwordVar = document.getElementById("login-password").value;
        let remember2 = document.getElementById("remember-me2");
        if(remember2.checked){
            remember2 = remember2.value;
        }
        else{
            remember2 = '';
        }
        if(usernameVar && passwordVar){
            let formData = {
                username : usernameVar,
                password : passwordVar,
                remember : remember2
            };
            let xhr3= new XMLHttpRequest();
            xhr3.open('POST', 'login.php', true);
            xhr3.onload = function(){
                if(xhr3.status === 200){
                    let responseData = JSON.parse(xhr3.responseText);
                    console.log(responseData.Status);
                    if(responseData.Status=='OK'){
                        valid();
                        userInfo.nameInfo.innerHTML = responseData.name;
                        switch(responseData.team){
                            case 'TJ':
                                userInfo.teamInfo.innerHTML = 'Team Java';
                                break;
                            case 'TCPP':
                                userInfo.teamInfo.innerHTML = 'Team C++';
                                break;    
                            case 'TP':
                                userInfo.teamInfo.innerHTML = 'Team Python';
                                break;
                            case 'TAI':
                                userInfo.teamInfo.innerHTML = 'Team AI ML';
                                break;
                            case 'TW':
                                userInfo.teamInfo.innerHTML = 'Team Web Development';
                                break;
                            case 'TD':
                                userInfo.teamInfo.innerHTML = 'Team Data Science';
                                break;
                            case 'TAnd':
                                userInfo.teamInfo.innerHTML = 'Team Android Dev.';
                                break;
                            case 'TDSA':
                                userInfo.teamInfo.innerHTML = 'Team DSA';
                                break;
                        };
                        userInfo.roleInfo.innerHTML = responseData.role;
                        userInfo.descInfo.innerHTML = responseData.desc;
                    }
                }
            };
            xhr3.send(JSON.stringify(formData));
        }
    }
}
else{
    userIcon.innerHTML = '<i class="fa-solid fa-user"></i>';
}


