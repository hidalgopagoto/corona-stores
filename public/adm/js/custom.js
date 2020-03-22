$('.date').mask('00/00/0000');
$('.time').mask('00:00:00');
$('.date_time').mask('00/00/0000 00:00:00');
$('.cep').mask('00000-000');
$('.phone').mask('0000-0000');
$('.phone_with_ddd').mask('(00) 0000-0000');
$('.phone_us').mask('(000) 000-0000');
$('.mixed').mask('AAA 000-S0S');
$('.cpf').mask('000.000.000-00', {reverse: true});
$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
$('.money').mask('000.000.000.000.000,00', {reverse: true});
$('.money2').mask("#.##0,00", {reverse: true});
$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
translation: {
  'Z': {
    pattern: /[0-9]/, optional: true
  }
}
});
$('.ip_address').mask('099.099.099.099');
$('.percent').mask('##0,00%', {reverse: true});
$('.money').mask('##0.00', {reverse: true});
$('.numberdecimal').mask('##0,000', {reverse: true});
$('.integer').mask('##0', {reverse: true});
$('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
$('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
$('.fallback').mask("00r00r0000", {
  translation: {
    'r': {
      pattern: /[\/]/,
      fallback: '/'
    },
    placeholder: "__/__/____"
  }
});
$('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

// using jQuery Mask Plugin v1.7.5
// http://jsfiddle.net/d29m6enx/2/
var maskBehavior = function (val) {
 return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {onKeyPress: function(val, e, field, options) {
 field.mask(maskBehavior.apply({}, arguments), options);
 }
};

$('.mask-phone').mask(maskBehavior, options);

jQuery(document).ready(function($) {
    if ($('.date-picker').length > 0) {
        $('.date-picker').datepicker({
            rtl: false,
            orientation: "left",
            autoclose: true,
            language: "pt-BR",
            format: "dd/mm/yyyy"
        });
    }
});
