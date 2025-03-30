

function Validator(args) {

    let inputRules = {};//khởi tạo 1 mảng để chứa nhiều rule cho cùng 1 input;

    //bắt đầu validate
    function validate(inputelement,rule) {
        let errorMessage;
        let errorElement = inputelement.parentElement.querySelector('.form-message');
        let rules = inputRules[rule.input];
        //lặp qua từng rule của từng input , kiểm tra lỗi => có lỗi thì break;
        for(let i = 0 ; i< rules.length ; ++i ){
            errorMessage = rules[i](inputelement.value);
            if(errorMessage) break;
        }
            if (errorMessage) {
                errorElement.innerHTML = errorMessage;
                inputelement.parentElement.classList.add('invalid');
            }else {
                errorElement.innerHTML = "";
                inputelement.parentElement.classList.remove('invalid');
            }
    }
    //gán rule cho từng trường hợp
    var formelement = document.querySelector(args.form);
    if(formelement){

        formelement.onsubmit = function (e) {
            //Khi bấm submit làm qua từng rule check lại 1 lần nữa
            args.rules.forEach( (rule) => {
                let inputelement = formelement.querySelector(rule.input);
                validate(inputelement, rule);
            });
        };
        args.rules.forEach( (rule) => {
            if(Array.isArray(inputRules[rule.input])){
                inputRules[rule.input].push(rule.test);
            }else
            {
                inputRules[rule.input] = [rule.test];
            }
            let inputelement = formelement.querySelector(rule.input);
            let errorElement = inputelement.parentElement.querySelector('.form-message');
            if(inputelement){
                //xử lý trường hợp blur khỏi input
                inputelement.onblur = function () {validate(inputelement, rule);}
                //xử lý trường hợp nhập input
                inputelement.oninput = function () {
                errorElement.innerHTML = "";
                inputelement.parentElement.classList.remove('invalid');
                }
            }
                
        })
    }
}

// RULES
Validator.isrequired = function (input) {
    return {
        input: input,
        test: function(value) {
            return value.trim() ? undefined: "Vui lòng nhập đầy đủ thông tin"
        }
    }
}
Validator.isEmail = function (input) {
    return {
        input: input,
        test: function(value) {
            let regex =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined:"Vui lòng nhập đúng cú pháp";
        }
    }
}
Validator.checkLength = function (input) {
    return {
        input: input,
        test: function(value) {
            return value.length >= 8 ? undefined:"Mật khẩu phải có 8 ký tự trở lên";
        }
    }
}
Validator.ConfirmPass = function (input,confirmvalue) {
    return {
        input: input,
        test: function(value) {
            return value === confirmvalue() ? undefined:"Mật khẩu nhập lại không chính xác";
        }
    }
}