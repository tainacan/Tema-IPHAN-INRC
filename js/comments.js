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
    console.log(commentReply)
    for (let i = 0; i < commentReply.length; i++) {
        commentReply[i].attributes[7].value = '<i size="50px" class="tainacan-icon tainacan-icon-undo"></i>';
        commentReply[i].attributes[8].value = '<i size="50px" class="tainacan-icon tainacan-icon-undo"></i>';
        commentReply[i].innerText = '';
        commentReply[i].innerHTML = '<i size="50px" class="tainacan-icon tainacan-icon-undo"></i>';
    }
    console.log(commentReply[0].attributes[8].value)
});

// troca o texto do botão submit do comment
jQuery(function ($) {
    var commentReplyButton = document.getElementById('submit');
    commentReplyButton.attributes('value') = 'Enviar';
    console.log(commentReplyButton)
});