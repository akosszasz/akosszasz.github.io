/**
 * GDPR Plugin for CategoryCMS
 * This plugin views a window with a specified text to notify the user about the cookie usage.
 * All rights reserved: Imre Godla, www.godla.hu
 */

$(document).ready(function(){
    //Cookie subname, custom subname, default: domain name
    var coockieName = document.domain;
    //Cookie expiration date
    var theExdate = 365;
    //Alert if cannot set cookie
    var cookieAlert = 'Nem sikerült feldolgozni kérését. Kérem, hogy értesíte a weboldal kezelőjét a kapcsolati adatoknál megadott elérhetőségeken. Köszönöm!';
    //Variables for other settings
    var container = $('body');
    var boxHeight = '-250px';
    var gdpr_backGroundColor = '#68d1c9';
    var fontSize = '';

    if($(window).innerWidth() <= 425){
        fontSize = '12px !important';
    } else {
        fontSize = 'inherit';
    }

    var dataButton1 = "<a class='gdpr-a' href='http://www.rendbejossz.hu/pszichologia-blog/index.php/adatvedelmi-nyilatkozat' target='_self' style='color:#fff;text-decoration: underline'>A részletekről itt olvashat.</a>";
    var modalButton = "<a href='http://www.rendbejossz.hu/pszichologia-blog/index.php/adatvedelmi-nyilatkozat' target='_self' style='text-decoration: underline'>Adatvédelmi nyilatkozat</a>";
    var html = "<div class='cat-gdpr' style=\"z-index:9999\"><div style='color:#fff;text-align:justify;width:70%;float:left'><h4 style='font-size: " + fontSize + "'>A weboldal böngészésével elfogadom, hogy a weboldal cookie-kat használ. " + dataButton1 + "</h4></div><div style='width:30%;float:left'><button class='submit-gdpr btn btn-primary' style='background-color: #fff'>Elfogadom</button></div>";

    var modal = "<div style='z-index:10000' class=\"modal fade\" id=\"emailModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"emailModalLabel\" aria-hidden=\"true\">\n" +
        "  <div class=\"modal-dialog\" role=\"document\">\n" +
        "    <div class=\"modal-content\">\n" +
        "      <div class=\"modal-header\">\n" +
        "        <h5 class=\"modal-title\" id=\"emailModalLabel\">Elfogadom az Adatvédelmi nyilatkozatot\n" +
        "      </div>\n" +
        "      <!--div class=\"modal-body\">\n" +
        "        Elfogadom az " + modalButton + "-ot\n" +
        "      </div-->\n" +
        "      <div class=\"modal-footer\" style='text-align: center'>\n" +
        "        <button type=\"button\" id='emailSubmit' class=\"btn btn-primary\" data-dismiss=\"modal\">Elfogadom</button>\n" +
        "        <button type=\"button\" id='emailNoSubmit' class=\"btn btn-primary\" data-dismiss=\"modal\" aria-label=\"Close\">Nem fogadom el</button>\n" +
        "      </div>\n" +
        "    </div>\n" +
        "  </div>\n" +
        "</div>";

    //Check if GDPR accepted before
    var accepted = 'cat_GDPR' + '_' + coockieName;
    if(getCookie(accepted)){
        return true;
    } else {
        //Show popup layer
        container.append(html).find('.cat-gdpr').css({
            'position':'fixed',
            'bottom': boxHeight,
            'display':'block',
            'width':'100%',
            'background-color':gdpr_backGroundColor,
            'border-top':'3px solid #fff',
            'height':'fit-content',
            'overflow':'hidden',
            'margin':'0',
            'text-align':'center',
            'padding':'10px'
        }).delay(500).animate({'bottom':0},700);
        container.append(modal);

        //If click accept, make the cookie
        clickSubmit();
    }

    //FUNCTIONS
    function clickSubmit() {
        var theHeight = $('.cat-gdpr').height() * -1 - 100;
        $('button.submit-gdpr').on('click', function () {
            // Make the cookie
            var exdays = theExdate;
            var user = document.domain + '/' + Math.random() + '/' + Date.now();

            if(setCookie(accepted,user,exdays)){
                // Hide the popup layer
                $(this).parents('.cat-gdpr').animate({'bottom': theHeight},300);

                //Insert datahandle text with button
                location.reload();
            } else {
                alert(cookieAlert);
            }
        })
    }

    function setCookie(accepted, user, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        if(document.cookie = accepted + "=" + user + ";" + expires + ";path=/"){
            return true;
        } else {
            return false;
        }

    }

    function getCookie(accepted) {
        //Check if GDPR acception happened before
        var name = accepted + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    hoverOnSubmit();
    function hoverOnSubmit(){
        //Change gdpr submit button background on hover and mouseout
        var button = $('.submit-gdpr');
        button.on('mouseover',function(){
            $(this).css('background-color','#059b90');
        });
        button.on('mouseout',function(){
            $(this).css('background-color','#fff');
        });
    }

    /*
    Drop modal if click on email address, and handle cookie.
     */
    emailClick();
    function emailClick(){
        if(getCookie(accepted)){
            return true;
        } else {
            var theHeight = $('.cat-gdpr').height() * -1 - 100;
            $('a[href="mailto:info@rendbejossz.hu"]').on('click', function (e) {
                e.preventDefault();
                $('#emailModal').modal('show');
                $('button#emailSubmit').on('click',function(){
                    var exdays = theExdate;
                    var user = document.domain + '/' + Math.random() + '/' + Date.now();

                    if (setCookie(accepted, user, exdays)) {
                        // Hide the popup layer
                        $('.cat-gdpr').animate({'bottom': theHeight}, 300);

                        //Insert datahandle text with button
                        $('#emailModal').modal('hide');
                        location.assign("mailto:info@rendbejossz.hu");
                    } else {
                        $('#emailModal').modal('hide');
                        alert(cookieAlert);
                    }
                });
            })
        }
    }
});
