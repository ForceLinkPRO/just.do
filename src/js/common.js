function funcBefore () {
	$("#content").text ("Ожалание данных...");
}

function funcSuccess (data) {
	$("#content").html (data);
}

$(document).ready (function() {
	$("#img-logo").bind("click", function () {
		$.ajax ({
			url: "content/index.php",
			type: "POST",
			dataType: "html",
			BeforeSend: funcBefore,
			success: funcSuccess
		})
	});

	//Авторизация

	$(".btn-login").bind("click", function () {
		$.ajax ({
			url: "content/login.php",
			type: "POST",
			dataType: "html",
			BeforeSend: funcBefore,
			success: funcSuccess
		})
	});

	$("#form-login").bind("click", function () {
		var msg   = $('#form-login').serialize();
		$.ajax ({
			url: "login.php",
			type: "POST",
			data: msg,
			success: funcSuccess,
			error:  function(xhr, str){
				alert('Возникла ошибка: ' + xhr.responseCode);
			},
			dataType: "html",
			BeforeSend: funcBefore,
			success: funcSuccess
		})
	});
	


	//Регистрация


	$(".btn-signup").bind("click", function () {
		$.ajax ({
			url: "content/signup.php",
			type: "POST",
			dataType: "html",
			BeforeSend: funcBefore,
			success: funcSuccess
		})
	});
});