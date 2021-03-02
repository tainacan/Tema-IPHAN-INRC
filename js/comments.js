jQuery(document).on("ready", function () {
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
        if (jQuery('.comment-list>li>ol').hasClass('children')) {
            jQuery('.comment-list>li>ol').siblings('.comment-body').children('.reply').children('a:last-child').addClass('comment-collapse')
        }
        var plus = document.getElementsByClassName('comment-collapse')
        for (let i = 0; i < plus.length; i++) {
            plus[i].setAttribute("type", 'button');
            plus[i].setAttribute('aria-expanded', 'false');
            plus[i].setAttribute('id', 'button-' + i)
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

    jQuery(function () {
        jQuery('a[type="button"]').on("click", function () {
            var element = document.getElementById((jQuery(this).attr("id"))).parentNode.parentNode.parentNode.lastElementChild
            if (!element.className.includes('show')) {
                console.log('entrei')
                jQuery(element).addClass('show')
                jQuery(jQuery(this).attr("id")).addClass('expanded')
            } else {
                console.log('else')
                jQuery(element).removeClass('show')
                jQuery(jQuery(this).attr("id")).removeClass('expanded')
            }
        })
    })

    // Add ou remove a classe 'show' ao clicar
    /*     jQuery(function () {
            jQuery('a.comment-collapse').on("click", function () {
                try {
                    if (jQuery('a[type="button"]').on("click", function (evt) {
                        console.log(jQuery(this).attr("id"));
                    }));
                    if (jQuery('.children').hasClass('show')) {
                        jQuery('.children').removeClass('show');
                        jQuery('a.comment-collapse').removeClass('expanded')
                    } else {
                        jQuery('.children').addClass('show');
                        jQuery('a.comment-collapse').addClass('expanded')
                    }
                } catch { }
            });
        }); */
});