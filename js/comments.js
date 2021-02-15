// Função para remover os itens desnecessários do datetime nos comentários
jQuery(function ($) {
    var dateTime = document.getElementsByTagName('time');
    for (let i = 0; i < dateTime.length; i++) {
        dateTime[i].innerText = dateTime[i].innerText.replace(" às", "")
    }
});

//corrige bug do ícone nos replys dos comments
jQuery(function ($) {
    var commentReply = document.getElementsByClassName('comment-reply-link');
    commentReply.removeData("data-replyto", '<i size="50px" class="tainacan-icon tainacan-icon-undo"></i>');
    commentReply.removeData("aria-label", '<i size="50px" class="tainacan-icon tainacan-icon-undo"></i>');
});