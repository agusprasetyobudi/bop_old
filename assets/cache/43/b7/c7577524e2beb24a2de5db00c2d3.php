<?php

/* chunks/leftmenu.html */
class __TwigTemplate_43b7c7577524e2beb24a2de5db00c2d3 extends Twig_Template
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
        echo "<!--<div id=\"menu\" class=\"hidden-phone\">
    <div id=\"menuInner\">
        ";
        // line 7
        echo "        <ul>
            <li class=\"heading\"><span>BOP Menu </span></li>
            
            <li class=\"glyphicons home ";
        // line 10
        if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
        if (($this->getAttribute($___REQUEST_, "object") == "index")) {
            echo "active";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\"><i></i><span>Dashboard</span></a></li>
            ";
        // line 12
        echo "            ";
        // line 13
        echo "            \t";
        // line 14
        echo "            \t";
        $context["active"] = false;
        // line 15
        echo "                ";
        // line 16
        if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
        if (((((((($this->getAttribute($___REQUEST_, "object") == "propinsi") || ($this->getAttribute($___REQUEST_, "object") == "osp")) || ($this->getAttribute($___REQUEST_, "object") == "kabupaten")) || ($this->getAttribute($___REQUEST_, "object") == "jabatan")) || ($this->getAttribute($___REQUEST_, "object") == "kantor")) || ($this->getAttribute($___REQUEST_, "object") == "komponen")) || ($this->getAttribute($___REQUEST_, "object") == "aktifitas"))) {
            // line 24
            echo "                \t";
            $context["active"] = true;
            // line 25
            echo "                ";
        }
        // line 26
        echo "            ";
        // line 27
        echo "            
            
            
            ";
        // line 30
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (((((((($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "propinsi", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "propinsi"), "view") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kabupaten", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kabupaten"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "osp", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "osp"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kantor", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kantor"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "jabatan", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "jabatan"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "komponen", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "komponen"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "aktifitas", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "aktifitas"), "view") == 1)))) {
            // line 38
            echo "            <li class=\"hasSubmenu ";
            if (isset($context["active"])) { $_active_ = $context["active"]; } else { $_active_ = null; }
            if ($_active_) {
                echo "active";
            }
            echo "\">
                <a data-toggle=\"collapse\" class=\"glyphicons table\" href=\"#master_form\"><i></i><span>Data Master</span></a>
                
                <ul class=\"";
            // line 41
            if (isset($context["active"])) { $_active_ = $context["active"]; } else { $_active_ = null; }
            if ($_active_) {
                echo "in ";
            }
            echo "collapse\" id=\"master_form\">
                \t";
            // line 42
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "propinsi", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "propinsi"), "view") == 1))) {
                // line 43
                echo "                    <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("propinsi"), "html", null, true);
                echo "\"><span>Propinsi</span></a></li>
                    ";
            }
            // line 45
            echo "                    ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kabupaten", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kabupaten"), "view") == 1))) {
                // line 46
                echo "                    <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("kabupaten"), "html", null, true);
                echo "\"><span>Kabupaten / Kota</span></a></li>
                    ";
            }
            // line 48
            echo "                    ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "osp", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "osp"), "view") == 1))) {
                // line 49
                echo "                    <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("osp"), "html", null, true);
                echo "\"><span>OSP</span></a></li>
                    ";
            }
            // line 51
            echo "                    ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kantor", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kantor"), "view") == 1))) {
                // line 52
                echo "                    <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("kantor"), "html", null, true);
                echo "\"><span>Kantor</span></a></li>
                    ";
            }
            // line 54
            echo "                    ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "jabatan", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "jabatan"), "view") == 1))) {
                // line 55
                echo "                    <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("jabatan"), "html", null, true);
                echo "\"><span>Jabatan</span></a></li>
                    ";
            }
            // line 57
            echo "                    ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "komponen", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "komponen"), "view") == 1))) {
                // line 58
                echo "                    <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("komponen"), "html", null, true);
                echo "\"><span>Komponen Biaya</span></a></li>
                    ";
            }
            // line 60
            echo "                    ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "aktifitas", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "aktifitas"), "view") == 1))) {
                // line 61
                echo "                    <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("aktifitas"), "html", null, true);
                echo "\"><span>Aktifitas</span></a></li>
                    ";
            }
            // line 63
            echo "                </ul>
            </li>
            ";
        }
        // line 66
        echo "            
            ";
        // line 68
        echo "          \t";
        // line 69
        echo "            ";
        // line 70
        echo "            \t";
        // line 71
        echo "            \t";
        $context["active"] = false;
        // line 72
        echo "                ";
        // line 73
        if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
        if ((($this->getAttribute($___REQUEST_, "object") == "pengguna") || ($this->getAttribute($___REQUEST_, "object") == "grouppengguna"))) {
            // line 76
            echo "                \t";
            $context["active"] = true;
            // line 77
            echo "                ";
        }
        // line 78
        echo "            ";
        // line 79
        echo "            ";
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "grouppengguna", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "grouppengguna"), "view") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "pengguna", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "pengguna"), "view") == 1)))) {
            // line 82
            echo "            <li class=\"hasSubmenu ";
            if (isset($context["active"])) { $_active_ = $context["active"]; } else { $_active_ = null; }
            if ($_active_) {
                echo "active";
            }
            echo "\">
                <a data-toggle=\"collapse\" class=\"glyphicons user\" href=\"#pengguna_form\"><i></i><span>Pengguna</span></a>
                
                <ul class=\"";
            // line 85
            if (isset($context["active"])) { $_active_ = $context["active"]; } else { $_active_ = null; }
            if ($_active_) {
                echo "in ";
            }
            echo "collapse\" id=\"pengguna_form\">
                    <li class=\"\"><a href=\"";
            // line 86
            echo twig_escape_filter($this->env, site_url("grouppengguna"), "html", null, true);
            echo "\"><span>Kelompok Pengguna</span></a></li>
                    <li class=\"\"><a href=\"";
            // line 87
            echo twig_escape_filter($this->env, site_url("pengguna"), "html", null, true);
            echo "\"><span>Pengguna</span></a></li>
                </ul>
            </li>
            ";
        }
        // line 91
        echo "            ";
        // line 92
        echo "              
            ";
        // line 93
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kontrak", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kontrak"), "view") == 1))) {
            // line 95
            echo "            <li class=\"glyphicons cargo ";
            if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
            if (($this->getAttribute($___REQUEST_, "object") == "kontrak")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, site_url("kontrak"), "html", null, true);
            echo "\"><i></i><span>Kontrak</span></a></li>
            ";
        }
        // line 97
        echo "            
            ";
        // line 98
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "firm", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "firm"), "view") == 1))) {
            // line 100
            echo "            <li class=\"glyphicons read_it_later ";
            if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
            if (($this->getAttribute($___REQUEST_, "object") == "firm")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, site_url("firm"), "html", null, true);
            echo "\"><i></i><span>Firm Transfer</span></a></li>
            ";
        }
        // line 102
        echo "            
            ";
        // line 103
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "transfer", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "transfer"), "view") == 1))) {
            // line 105
            echo "            <li class=\"glyphicons read_it_later ";
            if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
            if (($this->getAttribute($___REQUEST_, "object") == "transfer")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, site_url("transfer"), "html", null, true);
            echo "\"><i></i><span>Rekapitulasi Bukti Transfer</span></a></li>
            ";
        }
        // line 107
        echo "            
            ";
        // line 108
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "pmu", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "pmu"), "view") == 1))) {
            // line 110
            echo "            <li class=\"glyphicons read_it_later ";
            if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
            if (($this->getAttribute($___REQUEST_, "object") == "pmu")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, site_url("pmu"), "html", null, true);
            echo "\"><i></i><span>Rekapitulasi Iput level PMU</span></a></li>
            ";
        }
        // line 112
        echo "            
        </ul>
    </div>
</div> -->";
    }

    public function getTemplateName()
    {
        return "chunks/leftmenu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  269 => 108,  266 => 107,  255 => 105,  252 => 103,  249 => 102,  238 => 100,  235 => 98,  232 => 97,  221 => 95,  218 => 93,  215 => 92,  206 => 87,  202 => 86,  195 => 85,  185 => 82,  181 => 79,  170 => 73,  165 => 71,  163 => 70,  159 => 68,  156 => 66,  151 => 63,  145 => 61,  141 => 60,  135 => 58,  131 => 57,  121 => 54,  115 => 52,  105 => 49,  101 => 48,  95 => 46,  91 => 45,  85 => 43,  65 => 38,  57 => 27,  49 => 24,  41 => 14,  39 => 13,  37 => 12,  23 => 7,  340 => 155,  336 => 153,  334 => 141,  328 => 139,  325 => 138,  319 => 136,  316 => 135,  314 => 134,  307 => 130,  303 => 129,  298 => 126,  294 => 123,  292 => 122,  289 => 121,  286 => 120,  283 => 112,  281 => 116,  278 => 115,  276 => 114,  274 => 113,  272 => 110,  268 => 109,  263 => 107,  257 => 105,  253 => 104,  247 => 102,  243 => 101,  237 => 99,  233 => 98,  227 => 96,  223 => 95,  217 => 93,  213 => 91,  207 => 90,  203 => 89,  197 => 87,  194 => 86,  188 => 82,  184 => 74,  182 => 73,  179 => 78,  176 => 77,  173 => 76,  171 => 62,  168 => 72,  166 => 60,  164 => 59,  161 => 69,  155 => 54,  152 => 53,  148 => 52,  143 => 49,  138 => 47,  134 => 46,  129 => 45,  125 => 55,  119 => 42,  116 => 41,  111 => 51,  107 => 37,  99 => 32,  93 => 31,  89 => 29,  86 => 28,  83 => 27,  75 => 41,  70 => 23,  63 => 21,  55 => 26,  46 => 16,  43 => 14,  36 => 11,  28 => 10,  22 => 2,  82 => 42,  80 => 26,  72 => 31,  67 => 22,  64 => 27,  62 => 30,  58 => 20,  52 => 25,  47 => 15,  44 => 15,  40 => 13,  38 => 14,  35 => 10,  33 => 9,  29 => 7,  27 => 7,  21 => 2,  19 => 1,);
    }
}
