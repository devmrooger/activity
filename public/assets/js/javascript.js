(function(win, doc) {
    'use strict';

    function confirmDel(event){
        event.preventDefault();

        // event.target.parentNode.href

        let token = doc.getElementsByName("_token")[0].value;
        if (confirm("Deseja mesmo apagar?")) {
            console.log(event);
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function() {
                if (ajax.readyState === 4 && ajax.status === 200) {
                    win.location.href = 'activity';
                }
            };
            ajax.send();
        } else {
            return false
        }
    }

    if(doc.querySelector('.js-del')){
        let btn = doc.querySelectorAll('.js-del');
        for (let index = 0; index < btn.length; index++) {
            btn[index].addEventListener('click', confirmDel, false);
        }
    }
})(window, document);