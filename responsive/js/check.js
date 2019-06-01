//校验用户名格式
var isCurName = $("#user_name").blur(function() {
    if (/^[a-zA-z][0-9a-zA-z_].{5,17}$/.test($("#user_name").val())) {
        $("#words").html("用户名可用").css("color", "green");
        return true;
    } else {
        $("#words").html("用户名输入格式有误").css("color", "red");
        // $(this)[0].focus();
        //$(this)[0].select();
        return false;
    }
});

//校验密码格式
var isCurPwd = $("#user_pwd").blur(function() {
    if (/^[0-9a-zA-z_].{5,17}$/.test($("#user_pwd").val())) {
        $("#words").html("密码可用").css("color", "green");
        return true;
    } else {
        $("#words").html("密码输入格式有误").css("color", "red");
        //$(this)[0].select();
        //$(this).focus();
        return false;
    }
});

//校验手机号格式
var isCurPwd = $("#mobile").blur(function() {
    if (/^((\+\s)?86\s\-\s|((\+\s\-\s)?\s86)?)0?1[34579]\d{9}$/.test($("#mobile").val())) {
        $("#words").html("手机号可用").css("color", "green");
        return true;
    } else {
        $("#words").html("手机号输入格式有误").css("color", "red");
        //$(this)[0].select();
        //$(this).focus();
        return false;
    }
});

//校验身份证格式
var isCurPwd = $("#card").blur(function() {
    if (/^[1-9]\d{5}(18|19|20)\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/.test($("#card").val())) {
        $("#words").html("身份证号可用").css("color", "green");
        return true;
    } else {
        $("#words").html("身份证输入格式有误").css("color", "red");
        //$(this)[0].select();
        //$(this).focus();
        return false;
    }
});

//校验邮编格式
var isCurPwd = $("#zipcode").blur(function() {
    if (/^[0-9]{6}$/.test($("#zipcode").val())) {
        $("#words").html("邮编可用").css("color", "green");
        return true;
    } else {
        $("#words").html("邮编输入格式有误").css("color", "red");
        //$(this)[0].select();
        //$(this).focus();
        return false;
    }
});