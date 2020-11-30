<?php

/* chunks/bread.html */
class __TwigTemplate_352684ffef135cdaedd12da8cc533890 extends Twig_Template
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
        echo "<ul class=\"breadcrumb\">
    <li><a href=\"";
        // line 2
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\" class=\"glyphicons home\"><i></i> Dashboard</a></li>
    ";
        // line 3
        if (isset($context["breadcrumb"])) { $_breadcrumb_ = $context["breadcrumb"]; } else { $_breadcrumb_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_breadcrumb_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 4
            echo "    \t";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ($this->getAttribute($_loop_, "last")) {
                // line 5
                echo "        \t<li class=\"divider\"></li>
            <li>";
                // line 6
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $_val_, "html", null, true);
                echo "</li>
        ";
            } else {
                // line 8
                echo "            <li class=\"divider\"></li>
            <li><a href=\"";
                // line 9
                if (isset($context["key"])) { $_key_ = $context["key"]; } else { $_key_ = null; }
                echo twig_escape_filter($this->env, site_url($_key_), "html", null, true);
                echo "\" class=\"\">";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $_val_, "html", null, true);
                echo "</a></li>
\t\t";
            }
            // line 10
            echo "    
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "chunks/bread.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 12,  69 => 10,  60 => 9,  51 => 6,  48 => 5,  26 => 3,  269 => 108,  266 => 107,  255 => 105,  252 => 103,  249 => 102,  238 => 100,  235 => 98,  232 => 97,  221 => 95,  218 => 93,  215 => 92,  206 => 87,  202 => 86,  195 => 85,  185 => 82,  181 => 79,  170 => 73,  165 => 71,  163 => 70,  159 => 68,  156 => 66,  151 => 63,  145 => 61,  141 => 60,  135 => 58,  131 => 57,  121 => 54,  115 => 52,  105 => 49,  101 => 48,  95 => 46,  91 => 45,  85 => 43,  65 => 38,  57 => 8,  49 => 24,  41 => 14,  39 => 13,  37 => 12,  23 => 7,  340 => 155,  336 => 153,  334 => 141,  328 => 139,  325 => 138,  319 => 136,  316 => 135,  314 => 134,  307 => 130,  303 => 129,  298 => 126,  294 => 123,  292 => 122,  289 => 121,  286 => 120,  283 => 112,  281 => 116,  278 => 115,  276 => 114,  274 => 113,  272 => 110,  268 => 109,  263 => 107,  257 => 105,  253 => 104,  247 => 102,  243 => 101,  237 => 99,  233 => 98,  227 => 96,  223 => 95,  217 => 93,  213 => 91,  207 => 90,  203 => 89,  197 => 87,  194 => 86,  188 => 82,  184 => 74,  182 => 73,  179 => 78,  176 => 77,  173 => 76,  171 => 62,  168 => 72,  166 => 60,  164 => 59,  161 => 69,  155 => 54,  152 => 53,  148 => 52,  143 => 49,  138 => 47,  134 => 46,  129 => 45,  125 => 55,  119 => 42,  116 => 41,  111 => 51,  107 => 37,  99 => 32,  93 => 31,  89 => 29,  86 => 28,  83 => 27,  75 => 41,  70 => 23,  63 => 21,  55 => 26,  46 => 16,  43 => 14,  36 => 11,  28 => 10,  22 => 2,  82 => 42,  80 => 26,  72 => 31,  67 => 22,  64 => 27,  62 => 30,  58 => 20,  52 => 25,  47 => 15,  44 => 4,  40 => 13,  38 => 14,  35 => 10,  33 => 9,  29 => 7,  27 => 7,  21 => 2,  19 => 1,);
    }
}
