<?php

/* chunks/footer.html */
class __TwigTemplate_6ca2eed1213128e5da1f01d94f921942 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- JQuery v1.8.2 -->
<script src=\"assets/templates/theme/scripts/jquery-1.8.2.min.js\"></script>
\t
<!-- Modernizr -->
<script src=\"assets/templates/theme/scripts/modernizr.custom.76094.js\"></script>

<!-- LESS 2 CSS -->
<script src=\"assets/templates/theme/scripts/less-1.3.3.min.js\"></script>

<!-- from footer -->
<!-- JQueryUI v1.9.2 -->
<script src=\"assets/templates/theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js\"></script>

<!-- JQueryUI Touch Punch -->
<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
<script src=\"assets/templates/theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js\"></script>

<!-- MiniColors -->
<script src=\"assets/templates/theme/scripts/jquery-miniColors/jquery.miniColors.js\"></script>

<!-- Select2 -->
<script src=\"assets/templates/theme/scripts/select2/select2.js\"></script>

<!-- Themer -->
<script>
var themerPrimaryColor = '#e7c406';
</script>
<script src=\"assets/templates/theme/scripts/jquery.cookie.js\"></script>
<script src=\"assets/templates/theme/scripts/themer.js\"></script>

<!-- jQuery Validate -->
<script src=\"assets/templates/theme/scripts/jquery-validation/dist/jquery.validate.min.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/theme/scripts/form_validator.js\" type=\"text/javascript\"></script>

<!-- Resize Script -->
<script src=\"assets/templates/theme/scripts/jquery.ba-resize.js\"></script>

<!-- DataTables -->
<script src=\"assets/templates/theme/scripts/DataTables/media/js/jquery.dataTables.min.js\"></script>
<script src=\"assets/templates/theme/scripts/DataTables/media/js/DT_bootstrap.js\"></script>
<script src=\"assets/templates/theme/scripts/DataTables/media/js/reload.js\"></script>
<script src=\"assets/templates/theme/scripts/DataTables/media/js/TableTools.min.js\"></script>
<script src=\"assets/templates/theme/scripts/jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.datepicker.js\"></script>
<!-- Uniform -->
<script src=\"assets/templates/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js\"></script>

<!-- Bootstrap Script -->
<script src=\"assets/templates/bootstrap/js/bootstrap.min.js\"></script>

<!-- Bootstrap Extended -->
<script src=\"assets/templates/bootstrap/extend/bootstrap-select/bootstrap-select.js\"></script>
<script src=\"assets/templates/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js\"></script>
<script src=\"assets/templates/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js\"></script>
<script src=\"assets/templates/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/bootstrap/extend/bootbox.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js\" type=\"text/javascript\"></script>

<!-- Custom Onload Script -->
<script src=\"assets/templates/theme/scripts/load.js\"></script>

<!-- Layout Options -->
<script src=\"assets/templates/theme/scripts/layout.js\"></script>

<!--<script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>-->

\t<!-- Sparkline -->
<script src=\"assets/templates/theme/scripts/jquery.sparkline.js\" type=\"text/javascript\"></script>

<!-- Notyfy -->
<script type=\"text/javascript\" src=\"assets/templates/theme/scripts/notyfy/jquery.notyfy.js\"></script>
<!--  Flot (Charts) JS -->
<script src=\"assets/templates/theme/scripts/flot/jquery.flot.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/theme/scripts/flot/jquery.flot.pie.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/theme/scripts/flot/jquery.flot.tooltip.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/theme/scripts/flot/jquery.flot.selection.js\"></script>
<script src=\"assets/templates/theme/scripts/flot/jquery.flot.resize.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/theme/scripts/flot/jquery.flot.orderBars.js\" type=\"text/javascript\"></script>
<script src=\"assets/templates/theme/scripts/bootbox.min.js\" type=\"text/javascript\"></script>
 <script src=\"assets/templates/theme/scripts/jquery.maskMoney.min.js\"></script>
<link rel=\"stylesheet\" href=\"assets/templates/theme/css/me.css\" />

<script>
Number.prototype.toMoney = function(decimals, decimal_sep, thousands_sep)
\t{ 
\t   var n = this,
\t   c = isNaN(decimals) ? 2 : Math.abs(decimals), 
\t   d = decimal_sep || '.', 
\t   t = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
\t   sign = (n < 0) ? '-' : '',
\t   i = parseInt(n = Math.abs(n).toFixed(c)) + '', 
\t
\t   j = ((j = i.length) > 3) ? j % 3 : 0; 
\t   return sign + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\\d{3})(?=\\d)/g, \"\$1\" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : ''); 
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "chunks/footer.html";
    }

    public function getDebugInfo()
    {
        return array (  775 => 535,  771 => 533,  768 => 532,  763 => 531,  750 => 520,  735 => 518,  731 => 516,  728 => 515,  707 => 514,  702 => 513,  691 => 512,  686 => 511,  681 => 510,  678 => 509,  660 => 508,  655 => 505,  651 => 503,  648 => 502,  637 => 493,  628 => 486,  615 => 484,  610 => 483,  605 => 480,  602 => 479,  582 => 463,  569 => 454,  555 => 444,  540 => 433,  525 => 422,  511 => 412,  504 => 409,  492 => 401,  485 => 398,  478 => 395,  463 => 384,  447 => 372,  435 => 362,  430 => 361,  425 => 360,  261 => 199,  248 => 189,  236 => 180,  211 => 158,  180 => 134,  175 => 132,  142 => 105,  137 => 103,  31 => 7,  84 => 12,  69 => 10,  60 => 9,  51 => 6,  48 => 5,  26 => 3,  269 => 108,  266 => 107,  255 => 105,  252 => 103,  249 => 102,  238 => 100,  235 => 98,  232 => 97,  221 => 95,  218 => 93,  215 => 92,  206 => 87,  202 => 86,  195 => 85,  185 => 82,  181 => 79,  170 => 73,  165 => 71,  163 => 70,  159 => 119,  156 => 66,  151 => 63,  145 => 61,  141 => 60,  135 => 58,  131 => 101,  121 => 54,  115 => 52,  105 => 49,  101 => 48,  95 => 46,  91 => 45,  85 => 43,  65 => 38,  57 => 8,  49 => 24,  41 => 14,  39 => 13,  37 => 12,  23 => 7,  340 => 155,  336 => 153,  334 => 141,  328 => 139,  325 => 138,  319 => 136,  316 => 135,  314 => 134,  307 => 130,  303 => 129,  298 => 126,  294 => 123,  292 => 122,  289 => 121,  286 => 120,  283 => 112,  281 => 116,  278 => 115,  276 => 114,  274 => 113,  272 => 110,  268 => 109,  263 => 107,  257 => 105,  253 => 104,  247 => 102,  243 => 101,  237 => 99,  233 => 98,  227 => 96,  223 => 95,  217 => 93,  213 => 91,  207 => 90,  203 => 89,  197 => 87,  194 => 86,  188 => 138,  184 => 74,  182 => 73,  179 => 78,  176 => 77,  173 => 76,  171 => 62,  168 => 72,  166 => 60,  164 => 59,  161 => 69,  155 => 54,  152 => 53,  148 => 52,  143 => 49,  138 => 47,  134 => 46,  129 => 45,  125 => 55,  119 => 42,  116 => 41,  111 => 51,  107 => 37,  99 => 32,  93 => 31,  89 => 29,  86 => 28,  83 => 27,  75 => 41,  70 => 23,  63 => 21,  55 => 26,  46 => 16,  43 => 14,  36 => 11,  28 => 10,  22 => 2,  82 => 42,  80 => 26,  72 => 31,  67 => 22,  64 => 27,  62 => 30,  58 => 20,  52 => 25,  47 => 15,  44 => 4,  40 => 13,  38 => 14,  35 => 10,  33 => 9,  29 => 7,  27 => 7,  21 => 2,  19 => 1,);
    }
}
