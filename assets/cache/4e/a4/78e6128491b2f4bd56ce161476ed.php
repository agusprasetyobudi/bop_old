<?php

/* login.html */
class __TwigTemplate_4ea478e6128491b2f4bd56ce161476ed extends Twig_Template
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
        $this->env->loadTemplate("chunks/p.header.html")->display($context);
        echo " 
\t<script>
\t\t\$(document).on('ready',function(){
\t\t\t// \$(\"#loginform\").validate({
\t\t\t// \tsubmitHandler : function (form){
\t\t\t// \t\t\$.ajax({
\t\t\t// \t\t  type: \"POST\",
\t\t\t// \t\t  url: \"";
        // line 8
        echo twig_escape_filter($this->env, site_url("oauth/auth"), "html", null, true);
        echo "\",
\t\t\t// \t\t  data: \$(\"#loginform\").serialize(),
\t\t\t// \t\t  success: function(){},
\t\t\t// \t\t  dataType: 'json'
\t\t\t// \t\t}).done(function(){
\t\t\t// \t\t\t// document.location.href=\"";
        // line 13
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
\t\t\t// \t\t});
\t\t\t// \t\t// return false;\t
\t\t\t// \t} 
\t});
\t</script>
\t<!-- Start Content -->
\t<div class=\"container-fluid login\" style=\"border:none; background:none;\">
\t\t<div id=\"login\" style=\"border:none; background:none;\"> \t
\t\t\t<form class=\"form-signin\" method=\"post\" id=\"loginform\" action=\"";
        // line 22
        echo twig_escape_filter($this->env, site_url("oauth/auth"), "html", null, true);
        echo "\">
                <div class=\"widget widget-4\">
                    <div class=\"widget-head\">
                        <h4 class=\"heading\">Please sign in</h4>
                    </div>
              </div>
                <h2 class=\"form-signin-heading\"><img src=\"assets/templates/theme/images/logo.gif\"  width=\"35\" /> ";
        // line 28
        if (isset($context["__SETTINGS"])) { $___SETTINGS_ = $context["__SETTINGS"]; } else { $___SETTINGS_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($___SETTINGS_, "title"), "html", null, true);
        echo "</h2>
                <div class=\"uniformjs\"> 
                \t<div class=\"control-group\">
                    \t<div class=\"controls\">
\t\t                    <input type=\"text\" class=\"input-block-level required\" placeholder=\"Username\" name=\"username\"> 
                        </div>
                    </div>
                    <div class=\"control-group\">
                    \t<div class=\"controls\">
                    <input type=\"password\" class=\"input-block-level required\" placeholder=\"Password\" name=\"pass\"> 
                    \t</div>
                    </div>
                    <label class=\"checkbox\"><input type=\"checkbox\" name=\"remember\" value=\"1\">Remember me</label>
                </div>
                <button class=\"btn btn-large btn-primary\" id=\"#buttons\" type=\"submit\">Sign in</button>
            </form>
\t\t</div>\t\t
\t\t\t\t
\t</div> 
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 28,  49 => 22,  37 => 13,  29 => 8,  19 => 1,);
    }
}
