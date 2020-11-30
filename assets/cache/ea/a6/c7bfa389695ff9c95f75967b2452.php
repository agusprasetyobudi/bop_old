<?php

/* chunks/p.header.html */
class __TwigTemplate_eaa6c7bfa389695ff9c95f75967b2452 extends Twig_Template
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
        echo "<!DOCTYPE html>
<!--[if lt IE 7]> <html class=\"lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>    <html class=\"lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>    <html class=\"lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
\t<title>";
        // line 7
        if (isset($context["__SETTINGS"])) { $___SETTINGS_ = $context["__SETTINGS"]; } else { $___SETTINGS_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($___SETTINGS_, "title"), "html", null, true);
        echo "</title>
\t
\t<!-- Meta -->
\t<meta charset=\"UTF-8\" />
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0\">
\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">
\t<base href=\"";
        // line 14
        if (isset($context["__SETTINGS"])) { $___SETTINGS_ = $context["__SETTINGS"]; } else { $___SETTINGS_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($___SETTINGS_, "base_url"), "html", null, true);
        echo "\">
    
\t<!-- Bootstrap -->
\t<link href=\"assets/templates/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" />
\t<link href=\"assets/templates/bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\" />
\t
\t<!-- Bootstrap Extended -->
\t<link href=\"assets/templates/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css\" rel=\"stylesheet\">
\t<link href=\"assets/templates/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css\" rel=\"stylesheet\">
\t<link href=\"assets/templates/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css\" rel=\"stylesheet\">
\t
\t<!-- Select2 -->
\t<link rel=\"stylesheet\" href=\"assets/templates/theme/scripts/select2/select2.css\"/>
\t
\t<!-- JQueryUI v1.9.2 -->
\t<link rel=\"stylesheet\" href=\"assets/templates/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css\" />
\t
\t<!-- Glyphicons -->
\t<link rel=\"stylesheet\" href=\"assets/templates/theme/css/glyphicons.css\" />
\t
\t<!-- Bootstrap Extended -->
\t<link rel=\"stylesheet\" href=\"assets/templates/bootstrap/extend/bootstrap-select/bootstrap-select.css\" />
\t<link rel=\"stylesheet\" href=\"assets/templates/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css\" />
\t
\t<!-- Uniform -->
\t<link rel=\"stylesheet\" media=\"screen\" href=\"assets/templates/theme/scripts/pixelmatrix-uniform/css/uniform.default.css\" />
    
    <!-- DataTables -->
\t<link rel=\"stylesheet\" media=\"screen\" href=\"assets/templates/theme/scripts/DataTables/media/css/DT_bootstrap.css\" />
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"assets/templates/theme/scripts/DataTables/media/css/TableTools.css\">
\t
\t<!-- MiniColors -->
\t<link rel=\"stylesheet\" media=\"screen\" href=\"assets/templates/theme/scripts/jquery-miniColors/jquery.miniColors.css\" />
\t
\t<!-- Theme -->
\t<link rel=\"stylesheet\" href=\"assets/templates/theme/css/style.min.css?1363272449\" />
\t
\t<!-- JQuery v1.8.2 -->
\t<script src=\"assets/templates/theme/scripts/jquery-1.8.2.min.js\"></script>
\t
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
</script>
</head>
<body>";
    }

    public function getTemplateName()
    {
        return "chunks/p.header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 38,  80 => 37,  72 => 31,  67 => 28,  64 => 27,  62 => 26,  58 => 23,  52 => 19,  47 => 15,  44 => 14,  40 => 12,  38 => 14,  35 => 10,  33 => 9,  29 => 7,  27 => 7,  21 => 2,  19 => 1,);
    }
}
