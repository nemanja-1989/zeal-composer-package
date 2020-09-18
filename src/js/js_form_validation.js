const form = document.querySelector("#form");
console.log(form);
const fname = document.querySelector("#fname");
console.log(fname);
const lname = document.querySelector("#lname");
console.log(lname);
const email = document.querySelector("#email");
console.log(email);
const comment = document.querySelector("#comment");
console.log(comment);
const submit = document.querySelector("#submit");
console.log(submit);

fname.style.cssText = "border: none; border-bottom: 1px solid #ff2222; margin-bottom: 4px; background: #112233;";
lname.style.cssText = "border: none; border-bottom: 1px solid #ff2222; margin-bottom: 4px; background: #112233;";
email.style.cssText = "border: none; border-bottom: 1px solid #ff2222; margin-bottom: 4px; background: #112233;";
comment.style.cssText = "border: none; border-bottom: 1px solid #ff2222; margin-bottom: 4px; background: #112233;";
submit.style.cssText = "border: none; border-bottom: 1px solid #112233; margin-bottom: 4px; background: #ff2222;";

form.addEventListener("submit", onSubmit);

    function onSubmit(e) {
        
        let fnameValue = /^[a-zA-Z]{3,25}$/;
        let lnameValue = /^[a-zA-Z]{3,30}$/;
        let emailValue = /^[a-zA-Z0-9\.\_\-]+\@[a-zA-Z]+\.[a-z]{2,4}$/;
        
        if(!e.target.fname.value.match(fnameValue)) {
            alert("Please enter valid First name!");
            return false;
        }else if(!e.target.lname.value.match(lnameValue)) {
            alert("Please enter valid Last name!");
            return false;
        }else if(!e.target.email.value.match(emailValue)) {
            alert("Please enter valid Email address!");
            return false;
        }else {
            return true;
        }
    }
    

