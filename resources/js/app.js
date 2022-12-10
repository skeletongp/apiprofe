import './bootstrap';
import 'remixicon/fonts/remixicon.css'
import Autolinker from 'autolinker';

import NumberSuffix from 'number-suffix';

var autolinker = new Autolinker( {
    urls : {
        schemeMatches : true,
        tldMatches    : true,
        ipV4Matches   : true,
    },
    email       : true,
    phone       : true,
    mention     : 'instagram',
    hashtag     : false,

    stripPrefix : true,
    stripTrailingSlash : true,
    newWindow   : true,

    truncate : {
        length   : 0,
        location : 'end'
    },

    className : 'text-blue-500 hover:text-blue-600 underline'
} );

$(document).ready(function() {
    var linkers= document.querySelectorAll('.linker');
    linkers.forEach(function(linker){
        linker.innerHTML = autolinker.link(linker.innerHTML);
    });
    
    var shorts= document.querySelectorAll('.shortnumber');
    shorts.forEach(function(short){
        var number= parseFloat(short.innerHTML);
        var precision= short.dataset.precision? parseInt(short.dataset.precision) : 0;
        
        if(number>999){
            short.innerHTML = NumberSuffix.format(number, {precision: precision});
        }
        
    });
    $('.ajustable').each(function(){


        $(this).on('input', function(){
            var color= $(this).data('color');
            $(this).css('height', this.scrollHeight);
          

        })

    }
    );
});
let formatter = Intl.NumberFormat('en', { notation: 'compact' });
