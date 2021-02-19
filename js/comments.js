// Função para remover os itens desnecessários do datetime nos comentários
jQuery(function ($) {
    var dateTime = document.getElementsByTagName('time');
    for (let i = 0; i < dateTime.length; i++) {
        dateTime[i].innerText = dateTime[i].innerText.replace(" às", "")
    }
});

// corrige bug do ícone nos replys dos comments
jQuery(function ($) {
    try {
        var commentReply = document.getElementsByClassName('comment-reply-link');
        for (let i = 0; i < commentReply.length; i++) {
            commentReply[i].innerText = '';
            commentReply[i].innerHTML = '<i size="50px" class="tainacan-icon tainacan-icon-undo"></i>';
        }
    } catch {

    }
});

// troca o texto do botão submit do comment
jQuery(function ($) {
    try {
        var commentReplyButton = document.getElementById('submit');
        commentReplyButton.value = "Enviar";
    } catch {

    }
});

// troca o texto "Comentário" por "Mensagem" e adiciona placeholder
jQuery(function ($) {
    try {
        var commentTextLabel = jQuery("label[for='comment']")
        commentTextLabel[0].innerText = "Mensagem";
    } catch {

    }
});

//adiciona placeholder's
jQuery(function ($) {
    try {
        var commentTextArea = document.getElementById("comment");
        commentTextArea.setAttribute('placeholder', "Digite aqui seu comentário");
        var nome = document.getElementById("author");
        nome.setAttribute('placeholder', 'Digite aqui...');
    } catch {

    }
});

jQuery(function ($) {
    var newElement = document.createElement('a')
    jQuery('.reply').append(newElement);
    jQuery('.reply>a:last-child').addClass('comment-collapse')
    var plus = document.getElementsByClassName('comment-collapse')
    for (let i = 0; i < plus.length; i++) {
        plus[i].setAttribute("type", 'button');
    }
    try {
    } catch {

    }
});

/// Adicionar collapse aos comments
jQuery(function ($) {
    try {
        jQuery('.children').addClass('collapse');
    } catch {

    }
});

// Add ou remove a classe 'show' ao clicar
jQuery('.').click(function () {
    console.log('entrei')
    try {
        if (jQuery('children').hasClass('show')) {
            jQuery('children').removeClass('show');
        } else {
            jQuery('children').addClass('show');
        }
    } catch { }
}); 