jQuery(document).on("ready", function () {
    // Função para remover os itens desnecessários do datetime nos comentários
    jQuery(function () {
        try {
            var dateTime = document.getElementsByTagName('time');
            for (let i = 0; i < dateTime.length; i++) {
                dateTime[i].innerText = dateTime[i].innerText.replace(" às", "")
            }
        }
        catch (e) {
            console.log(e.message)
        }
    });

    // corrige bug do ícone nos replys dos comments
    jQuery(function () {
        try {
            var commentReply = document.getElementsByClassName('comment-reply-link');
            for (let i = 0; i < commentReply.length; i++) {
                commentReply[i].innerText = '';
                commentReply[i].innerHTML = '<i size="50px" class="tainacan-icon tainacan-icon-1-25em tainacan-icon-undo"></i>';
            }
        } catch (e) {
            console.log(e.message)
        }
    });

    // troca o texto do botão submit do comment
    jQuery(function () {
        try {
            var commentReplyButton = document.getElementById('submit')
            var pai = document.getElementsByClassName('form-submit')
            jQuery(pai).addClass('wp-block-button')
            jQuery(commentReplyButton).addClass('wp-block-button__link')
            commentReplyButton.value = "Enviar";
        }
        catch (e) {
            console.log(e.message)
        }
    });

    // troca o texto "Comentário" por "Mensagem" e adiciona placeholder
    jQuery(function () {
        try {
            var commentTextLabel = jQuery("label[for='comment']")
            commentTextLabel[0].innerText = "Mensagem";
        } catch (e) {
            console.log(e.message)
        }
    });

    //adiciona placeholder's
    jQuery(function () {
        try {
            var commentTextArea = document.getElementById("comment");
            commentTextArea.setAttribute('placeholder', "Digite aqui seu comentário");
            var nome = document.getElementById("author");
            nome.setAttribute('placeholder', 'Digite aqui...');
        } catch (e) {
            console.log(e.message)
        }
    });

    jQuery(function () {
        try {
            var newElement = document.createElement('a')
            var filho = document.createElement('i')
            jQuery('.reply').append(newElement);
            if (jQuery('.comment-list>li>ol').hasClass('children')) {
                jQuery('.comment-list>li>ol').siblings('.comment-body').children('.reply').children('a:last-child').addClass('comment-collapse')
                jQuery('.comment-collapse').append(filho)
                jQuery('.comment-collapse>i').addClass('tainacan-icon tainacan-icon-1em tainacan-icon-plus')
            }
            var plus = document.getElementsByClassName('comment-collapse')
            for (let i = 0; i < plus.length; i++) {
                plus[i].setAttribute("type", 'button');
                plus[i].setAttribute('aria-expanded', 'false');
                plus[i].setAttribute('id', 'button-' + i)
            }
        } catch (e) {
            console.log(e.message)
        }
    });

    /// Adicionar collapse aos comments
    jQuery(function () {
        try {
            jQuery('.children').addClass('collapse');
        } catch (e) {
            console.log(e.message)
        }
    });

    // Add ou remove a classe 'show' ao clicar
    jQuery(function () {
        try {
            jQuery('a[type="button"]').on("click", function () {
                var element = document.getElementById((jQuery(this).attr("id"))).parentNode.parentNode.parentNode.lastElementChild
                var filho = document.getElementById(jQuery(this).attr("id"));
                console.log(filho.childNodes[0])
                if (!element.className.includes('show')) {
                    jQuery(element).addClass('show')
                    jQuery(filho.childNodes[0]).removeClass('tainacan-icon-plus')
                    jQuery(filho.childNodes[0]).addClass('tainacan-icon-minus')
                } else {
                    jQuery(element).removeClass('show')
                    jQuery(filho.childNodes[0]).addClass('tainacan-icon-plus')
                    jQuery(filho.childNodes[0]).removeClass('tainacan-icon-minus')
                }
            })
        }
        catch (e) {
            console.log(e.message)
        }
    })
});