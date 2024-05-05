// получаем форму и добавляем обработчик события отправки формы
document.getElementById("loginForm").addEventListener("submit", function(event) {
    // отменяем перезагрузку страницы
    event.preventDefault();
    
    // отправляем данные формы асинхронно (спасаемся от обновлений страницы)
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // проверяем ответ от сервера
            var response = xhr.responseText;
            if (response.includes("Неверное имя пользователя или пароль.")) {
                document.getElementById("errorMessage").innerText = response;
            } else {
                // если ок, перенаправляем пользователя на другую страницу
                window.location.href = "formula.php"; // тут свой поставим
            }
        }
    };
    xhr.send(formData);
});


// установка значения в куки
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// получить значение из куки
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

async function translateAll(lang) {
    let response = await fetch('localization.json', {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      },
    });
    let result = await response.json();

    document.querySelectorAll('[data-locname]').forEach( link => {
        let localizedText = result[link.getAttribute('data-locname')][lang];
        if (link.getAttribute('value') != null)
            link.setAttribute('value', localizedText);
        link.innerHTML = link.innerHTML.replace("\t", localizedText);
    });
}


var lang = getCookie("language"); // получить язык из куки
if (lang == "") lang = "ru";
translateAll(lang);


document.getElementById("lang_en").addEventListener("click", function() {
    setCookie("language", "en", 1440);
    location.reload();
});

document.getElementById("lang_ru").addEventListener("click", function() {
    setCookie("language", "ru", 1440);
    location.reload();
});