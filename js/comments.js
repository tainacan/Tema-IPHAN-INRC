// Função para remover os itens desnecessários do datetime nos comentários
jQuery(function ($) {
    var dateTime = document.getElementsByTagName('time');
    for (let i = 0; i < dateTime.length; i++) {
        dateTime[i].innerText = dateTime[i].innerText.replace(" às", "")
    }
});

// corrige bug do ícone nos replys dos comments
jQuery(function ($) {
    var commentReply = document.getElementsByClassName('comment-reply-link');
    for (let i = 0; i < commentReply.length; i++) {
        commentReply[i].innerText = '';
        commentReply[i].innerHTML = '<i size="50px" class="tainacan-icon tainacan-icon-undo"></i>';
    }
});

// troca o texto do botão submit do comment
jQuery(function ($) {
    var commentReplyButton = document.getElementById('submit');
    commentReplyButton.value = "Enviar";
});

/* // Adicionar collapse aos comments
jQuery(function ($) {
    jQuery('.children').addClass('collapse');
}); */

