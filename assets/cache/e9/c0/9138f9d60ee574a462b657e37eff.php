<?php

/* page.html */
class __TwigTemplate_e9c09138f9d60ee574a462b657e37eff extends Twig_Template
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
        // line 2
        echo "\t
\t<!-- Start Content -->
\t<div class=\"container-fluid\">
\t\t
\t\t";
        // line 6
        $this->env->loadTemplate("chunks/navbar.html")->display($context);
        // line 7
        echo "\t\t
\t\t\t\t<div id=\"wrapper\">
\t\t";
        // line 9
        $this->env->loadTemplate("chunks/leftmenu.html")->display($context);
        // line 10
        echo "\t\t<div id=\"content\">
        ";
        // line 11
        $this->env->loadTemplate("chunks/bread.html")->display($context);
        // line 12
        echo "<div class=\"separator\"></div>

";
        // line 14
        if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
        if (($this->getAttribute($___REQUEST_, "object") == "index")) {
            // line 15
            echo "<div class=\"heading-buttons\">
\t<h3 class=\"glyphicons display\"><i></i> Dashboard</h3>
\t<div class=\"buttons pull-right\">
\t\t";
            // line 19
            echo "\t</div>
\t<div class=\"clearfix\" style=\"clear: both;\"></div>
</div>
";
        }
        // line 23
        echo "<div class=\"separator\"></div>

";
        // line 26
        if (array_key_exists("content", $context)) {
            // line 27
            if (isset($context["content"])) { $_content_ = $context["content"]; } else { $_content_ = null; }
            $context["content"] = ("modules/" . $_content_);
            // line 28
            if (isset($context["content"])) { $_content_ = $context["content"]; } else { $_content_ = null; }
            $template = $this->env->resolveTemplate($_content_);
            $template->display($context);
        }
        // line 31
        echo "            <!-- End Content -->
    </div>
    <!-- End Wrapper -->
    </div>
    
    <!-- Sticky Footer -->
    ";
        // line 37
        $this->env->loadTemplate("chunks/sticky.footer.html")->display($context);
        // line 38
        echo "            
</div>
\t
\t

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "page.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 38,  80 => 37,  72 => 31,  67 => 28,  64 => 27,  62 => 26,  58 => 23,  52 => 19,  47 => 15,  44 => 14,  40 => 12,  38 => 11,  35 => 10,  33 => 9,  29 => 7,  27 => 6,  21 => 2,  19 => 1,);
    }
}
