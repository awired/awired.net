/*
 * Shoutbox - Plugin pour DotClear
 * Copyright (C) 2006 NICOLAS CHAMBRIER - MARS 2006
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
* @class DC_Shoutbox
* Classe regroupant les méthodes statiques pour la gestion de la shoutbox
**/
var DC_Shoutbox = {

    /**
    * L'élément du DOM : liste des messages (élément d'id = "dc_shoutbox_messages_list")
    * @type Node
    **/
    messagesLayer : null,
    
    /**
    * L'élément du DOM : date du dernier message (élément d'id = "dc_shoutbox_last_time")
    * @type Node
    **/
    lastTimeLayer : null,
    
    /**
    * L'élément du DOM : formulaire d'ajout de nouveau message (premier formulaire dans l'élément d'id = "dc_shoutbox")
    * @type Node
    **/
    form : null,
    
    /**
    * Message par défaut dans le formulaire d'ajout de message
    * @type string
    **/
    initialMessage : '',
    
    /**
    * Fréquence de rafraichissement automatique
    * @type int
    **/
    refreshFrequency : 30,
    
    /**
    * Réinitialiser le champ "sb_message" à la prochaine requête Ajax ?
    * @type bool
    **/
    resetMessage : false,

    /**
    * @static
    * Initialisation de l'environnement
    **/
    init : function() {
        // configurer le rafraichissement automatique en récupérant la conf sur le serveur
        var opts = {
            method: 'post', 
            asynchronous: true, 
            postBody: 'sb_ajax=get_freq', 
            onSuccess: DC_Shoutbox.getRefreshFrequency, 
            onFailure: DC_Shoutbox.ajaxFailure
        };
        new Ajax.Request(document.location.href, opts);
        // initialiser les layers
        DC_Shoutbox.messagesLayer = $('dc_shoutbox_messages_list');
        DC_Shoutbox.lastTimeLayer = $('dc_shoutbox_last_time');
        var mainLayer = $('dc_shoutbox');
        Try.these( function() {
            var forms = mainLayer.getElementsByTagName('form');
            if (forms[0]) {
                DC_Shoutbox.form = forms[0];
                DC_Shoutbox.initialMessage = DC_Shoutbox.form.sb_message.value;
                DC_Shoutbox.form.onsubmit = DC_Shoutbox.validate;
            }
        });
    },
    
    /**
    * @static
    * Callback Ajax : récupérer la fréquence de rafraichissement configurée
    **/
    getRefreshFrequency : function(req) {
        var freq = DC_Shoutbox.refreshFrequency;
        if (req && req.responseText) freq = parseInt(req.responseText);
        DC_Shoutbox.refreshFrequency = freq;
        DC_Shoutbox.refresh();
    },

    /**
    * @static
    * Appel en Ajax pour le rafraichissement de la liste des messages (fonction appelée régulièrement)
    * Note : on utilise setTimeout et pas l'observer de Prototype car ainsi si DC_Shoutbox.refreshFrequency est
    * modifiée en cours d'exécution, la nouvelle valeur est prise en compte.
    **/
    refresh : function() {
        if (DC_Shoutbox.refreshFrequency > 0) {
            var opts = {
                method: 'post',
                asynchronous: true,
                postBody: 'sb_ajax=refresh',
                onSuccess: DC_Shoutbox.ajaxSuccess,
                onFailure: DC_Shoutbox.ajaxFailure
            };
            // Affichage de l'anim d'attente
            DC_Shoutbox.loading(true);
            // envoi de la requête
            new Ajax.Request(document.location.href, opts);
            // prochain appel selon la fréquence
            setTimeout('DC_Shoutbox.refresh()', DC_Shoutbox.refreshFrequency*1000);
        }
    },

    /**
    * @static
    * Validation du formulaire, envoi du nouveau message
    **/
    validate : function() {
        if (this.sb_message.value == DC_Shoutbox.initialMessage || this.sb_message.value == '') {
            this.sb_message.focus();
            return false;
        }
        var opts = {
            method: 'post',
            asynchronous: true,
            postBody: 'sb_message='+this.sb_message.value+'&sb_username='+this.sb_username.value+'&sb_ajax=refresh',
            onSuccess: DC_Shoutbox.ajaxSuccess,
            onFailure: DC_Shoutbox.ajaxFailure
        };
        // affichage de l'anim d'attente
        DC_Shoutbox.loading(true, true);
        // envoi de la requête
        DC_Shoutbox.resetMessage = true;
        new Ajax.Request(document.location.href, opts);
        return false;
    },

    /**
    * @static
    * Callback Ajax : affichage d'une erreur ou mise à jour de la liste des messages selon
    * le contenu récupéré sur le serveur
    **/
    ajaxSuccess : function(req) {
        if (req.responseText.substring(0,4) == 'ERR:') {
            // erreur côté serveur, on affiche l'alerte
            alert(req.responseText.substring(4));
        }
        else {
            var lines = req.responseText.split("###");
            DC_Shoutbox.lastTimeLayer.innerHTML = lines.shift();
            DC_Shoutbox.messagesLayer.innerHTML = lines.join("###");
            if (DC_Shoutbox.resetMessage)
                DC_Shoutbox.form.sb_message.value = DC_Shoutbox.initialMessage;
        }
        DC_Shoutbox.loading(false);
        DC_Shoutbox.resetMessage = false;
    },
    
    /**
    * @static
    * Callback Ajax : alerte en cas d'erreur
    **/
    ajaxFailure : function(req) {
        alert('Error ' + t.status + ' -- ' + t.statusText);
        DC_Shoutbox.loading(false);
        DC_Shoutbox.resetMessage = false;
    },

    /**
    * @static
    * Affichage/coupure d'une animation lors du chargement d'une requête Ajax
    **/
    loading : function(doLoading, disableForm) {
        if (doLoading) {
            if (disableForm)
                Form.disable(DC_Shoutbox.form);
            Element.setStyle($('dc_shoutbox_loadimg'), {display:'inline'});
        }
        else {
            Element.setStyle($('dc_shoutbox_loadimg'), {display:'none'});
            Form.enable(DC_Shoutbox.form);
        }
    }

}

// on initialise l'environnement sur l'évènement window.onload
Event.observe(window, 'load', DC_Shoutbox.init);
