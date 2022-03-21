var addedListeners = {};
function addWindowListenerIfNone(eventType, fun) {
    if (addedListeners[eventType]) return;
    addedListeners[eventType] = fun;
    window.addEventListener(eventType, fun);
}

addWindowListenerIfNone('message', function(event){
    
    const message = event.message ? 'message' : 'data';
    const data = event[message];

    if (data.type == 'itemEditionMessage' && data.item === null)
        window.location.href = window.location.origin + '/faca-seu-cadastro-para-abertura-de-um-novo-inventario/';

}, false);