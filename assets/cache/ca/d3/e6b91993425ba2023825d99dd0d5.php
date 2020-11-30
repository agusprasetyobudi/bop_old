<?php

/* chunks/navbar.html */
class __TwigTemplate_cad3e6b91993425ba2023825d99dd0d5 extends Twig_Template
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
        echo "<div class=\"navbar main\">
\t\t\t<a href=\"";
        // line 2
        if (isset($context["__SETTINGS"])) { $___SETTINGS_ = $context["__SETTINGS"]; } else { $___SETTINGS_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($___SETTINGS_, "base_url"), "html", null, true);
        echo "\" class=\"pull-left\" style=\"line-height:40px;padding-left:10px\">
\t\t\t\t<span>
\t\t\t\t\t<img src=\"assets/templates/theme/images/logo.gif\"  width=\"28\" /> ";
        // line 4
        if (isset($context["__SETTINGS"])) { $___SETTINGS_ = $context["__SETTINGS"]; } else { $___SETTINGS_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($___SETTINGS_, "title"), "html", null, true);
        echo "
\t\t\t\t</span>
\t\t\t</a>
\t\t\t
\t\t\t";
        // line 11
        echo "\t\t\t
\t\t\t<ul class=\"topnav pull-right\">
\t\t\t\t";
        // line 13
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if ((($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 4) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 1))) {
            // line 14
            echo "                <li class=\"visible-desktop\">
                \t<a href=\"";
            // line 15
            echo twig_escape_filter($this->env, site_url("firm"), "html", null, true);
            echo "\" class=\"glyphicons read_it_later\"><i></i><span>Firm Transfer</span></a>
                </li>
                ";
        }
        // line 18
        echo "                
                ";
        // line 19
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "transfer", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "transfer"), "view") == 1))) {
            // line 20
            echo "                <li class=\"visible-desktop\"><a class=\"glyphicons read_it_later\" href=\"";
            echo twig_escape_filter($this->env, site_url("transfer"), "html", null, true);
            echo "\"><i></i><span>Rekapitulasi Bukti Transfer</span></a></li>
                <li class=\"visible-desktop\"><a class=\"glyphicons read_it_later\" href=\"";
            // line 21
            echo twig_escape_filter($this->env, site_url("pengeluaran"), "html", null, true);
            echo "\"><i></i><span>Rekapitulasi Bukti Pengeluaran</span></a></li>
\t\t\t\t\t";
            // line 22
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if ((($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") != 6) && ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") != 5))) {
                // line 23
                echo "\t\t\t\t\t <li class=\"visible-desktop\"><a class=\"glyphicons read_it_later\" href=\"";
                echo twig_escape_filter($this->env, site_url("bukubank"), "html", null, true);
                echo "\"><i></i>Buku Kas</a></li>
\t\t\t\t\t <li class=\"visible-desktop\"><a class=\"glyphicons read_it_later\" href=\"";
                // line 24
                echo twig_escape_filter($this->env, site_url("bukukas"), "html", null, true);
                echo "\"><i></i>Buku Bank</a></li>
\t\t\t\t\t";
            }
            // line 26
            echo "                ";
        }
        // line 27
        echo "                
                ";
        // line 28
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if ((($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 2) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 1))) {
            // line 29
            echo "                <li class=\"dropdown visible-desktop\">
                \t<a href=\"#\" data-toggle=\"dropdown\" class=\"glyphicons show_lines\"><i></i>Level PMU <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu pull-right\"><li class=\"\"><a href=\"";
            // line 31
            echo twig_escape_filter($this->env, site_url("pmu"), "html", null, true);
            echo "\"><span>Rekapitulasi Input level PMU</span></a></li>\t\t\t\t                <li class=\"\"><a href=\"";
            echo twig_escape_filter($this->env, site_url("lastinvo"), "html", null, true);
            echo "\"><span>Invoice Terakhir</span></a></li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, site_url("rekapsisakontrak"), "html", null, true);
            echo "\"><span>Rekapitulasi Sisa Kontrak</span></a></li>
                    </ul>
                </li>

                ";
        }
        // line 37
        echo "                ";
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (((((($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 6) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 5)) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 4)) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 3)) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 1))) {
            // line 38
            echo "                <li class=\"dropdown visible-desktop\">
                \t<a href=\"#\" data-toggle=\"dropdown\" class=\"glyphicons show_lines\"><i></i>Report <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu pull-right\">
                    \t";
            // line 41
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if ((($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 4) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 1))) {
                // line 42
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("transfer/report"), "html", null, true);
                echo "\"><span>Firm Transfer</span></a></li>
                        ";
            }
            // line 44
            echo "                        ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if ((((($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 6) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 5)) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 3)) || ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 1))) {
                // line 45
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("transfer/penerimaanreport"), "html", null, true);
                echo "\"><span>Penerimaan Transfer</span></a></li>
                        <li class=\"\"><a href=\"";
                // line 46
                echo twig_escape_filter($this->env, site_url("pengeluaran/pengeluaranreport"), "html", null, true);
                echo "\"><span>Pengeluaran Transfer</span></a></li>
                        <li class=\"\"><a href=\"";
                // line 47
                echo twig_escape_filter($this->env, site_url("bukubank/report"), "html", null, true);
                echo "\"><span>Buku Bank</span></a></li>
                        ";
            }
            // line 49
            echo "                    </ul>
                </li>
                ";
        }
        // line 52
        echo "                ";
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kontrak", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kontrak"), "view") == 1))) {
            // line 53
            echo "                <li class=\"visible-desktop\">
                \t<a href=\"";
            // line 54
            echo twig_escape_filter($this->env, site_url("kontrak"), "html", null, true);
            echo "\" class=\"glyphicons cargo\"><i></i>Kontrak</a>
                </li>
                ";
        }
        // line 57
        echo "                
                ";
        // line 59
        echo "                ";
        // line 60
        echo "                    ";
        // line 61
        echo "                    ";
        $context["active"] = false;
        // line 62
        echo "                    ";
        // line 63
        if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
        if (((((((($this->getAttribute($___REQUEST_, "object") == "propinsi") || ($this->getAttribute($___REQUEST_, "object") == "osp")) || ($this->getAttribute($___REQUEST_, "object") == "kabupaten")) || ($this->getAttribute($___REQUEST_, "object") == "jabatan")) || ($this->getAttribute($___REQUEST_, "object") == "kantor")) || ($this->getAttribute($___REQUEST_, "object") == "komponen")) || ($this->getAttribute($___REQUEST_, "object") == "aktifitas"))) {
            // line 71
            echo "                        ";
            $context["active"] = true;
            // line 72
            echo "                    ";
        }
        // line 73
        echo "                ";
        // line 74
        echo "                ";
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (((((((($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "propinsi", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "propinsi"), "view") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kabupaten", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kabupaten"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "osp", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "osp"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kantor", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kantor"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "jabatan", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "jabatan"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "komponen", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "komponen"), "view") == 1))) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "aktifitas", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "aktifitas"), "view") == 1)))) {
            // line 82
            echo "                
\t\t\t\t<li class=\"dropdown visible-desktop\">
\t\t\t\t\t<a href=\"\" data-toggle=\"dropdown\" class=\"glyphicons cogwheel\"><i></i>Data Master <span class=\"caret\"></span></a>
\t\t\t\t\t<ul class=\"dropdown-menu pull-right\">
                    \t";
            // line 86
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "propinsi", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "propinsi"), "view") == 1))) {
                // line 87
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("propinsi"), "html", null, true);
                echo "\"><span>Propinsi</span></a></li>
                        ";
            }
            // line 89
            echo "\t\t\t\t\t\t";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kabupaten", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kabupaten"), "view") == 1))) {
                // line 90
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("kabupaten"), "html", null, true);
                echo "\"><span>Kabupaten / Kota</span></a></li>
                        ";
            }
            // line 92
            echo "                        ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "osp", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "osp"), "view") == 1))) {
                // line 93
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("osp"), "html", null, true);
                echo "\"><span>OSP</span></a></li>
                        ";
            }
            // line 95
            echo "                        ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "kantor", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "kantor"), "view") == 1))) {
                // line 96
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("kantor"), "html", null, true);
                echo "\"><span>Kantor</span></a></li>
                        ";
            }
            // line 98
            echo "                        ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "jabatan", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "jabatan"), "view") == 1))) {
                // line 99
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("jabatan"), "html", null, true);
                echo "\"><span>Jabatan</span></a></li>
                        ";
            }
            // line 101
            echo "                        ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "komponen", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "komponen"), "view") == 1))) {
                // line 102
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("komponen"), "html", null, true);
                echo "\"><span>Komponen Biaya</span></a></li>
                        ";
            }
            // line 104
            echo "                        ";
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if (($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "aktifitas", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "aktifitas"), "view") == 1))) {
                // line 105
                echo "                        <li class=\"\"><a href=\"";
                echo twig_escape_filter($this->env, site_url("aktifitas"), "html", null, true);
                echo "\"><span>Aktifitas</span></a></li>
                        ";
            }
            // line 107
            echo "\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t";
        }
        // line 109
        echo "\t
                                
                ";
        // line 112
        echo "                ";
        // line 113
        echo "                ";
        // line 114
        echo "                    ";
        // line 115
        echo "                    ";
        $context["active"] = false;
        // line 116
        echo "                    ";
        // line 117
        if (isset($context["__REQUEST"])) { $___REQUEST_ = $context["__REQUEST"]; } else { $___REQUEST_ = null; }
        if ((($this->getAttribute($___REQUEST_, "object") == "pengguna") || ($this->getAttribute($___REQUEST_, "object") == "grouppengguna"))) {
            // line 120
            echo "                        ";
            $context["active"] = true;
            // line 121
            echo "                    ";
        }
        // line 122
        echo "                ";
        // line 123
        echo "                ";
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "grouppengguna", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "grouppengguna"), "view") == 1)) || ($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last", array(), "any", false, true), "prev", array(), "any", false, true), "pengguna", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "prev"), "pengguna"), "view") == 1)))) {
            // line 126
            echo "                <li class=\"dropdown visible-desktop\">
\t\t\t\t\t<a href=\"\" data-toggle=\"dropdown\" class=\"glyphicons cogwheel\"><i></i>Pengguna <span class=\"caret\"></span></a>
                    <ul class=\"dropdown-menu pull-right\">
                    \t<li class=\"\"><a href=\"";
            // line 129
            echo twig_escape_filter($this->env, site_url("grouppengguna"), "html", null, true);
            echo "\"><span>Kelompok Pengguna</span></a></li>
\t                    <li class=\"\"><a href=\"";
            // line 130
            echo twig_escape_filter($this->env, site_url("pengguna"), "html", null, true);
            echo "\"><span>Pengguna</span></a></li>
                    </ul>
                </li>
                ";
        }
        // line 134
        echo "\t            ";
        // line 135
        echo "\t\t\t\t<li class=\"account\">
\t\t\t\t\t<a data-toggle=\"dropdown\" href=\"#\" class=\"glyphicons logout lock\"><span class=\"hidden-phone text\">Logout (<b style=\"text-transform:uppercase;font-style:italic;\">";
        // line 136
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "nickname"), "html", null, true);
        echo "</b>)</span><i></i></a>
\t\t\t\t\t<ul class=\"dropdown-menu pull-right\">
                    \t";
        // line 138
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") != 1)) {
            // line 139
            echo "\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, site_url("pengguna/changepass"), "html", null, true);
            echo "\" class=\"glyphicons cogwheel\">Change Password<i></i></a></li>
                        ";
        }
        // line 141
        echo "\t\t\t\t\t\t";
        // line 153
        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t<a class=\"btn btn-default btn-small pull-right\" style=\"padding: 2px 10px; background: #fff;\" href=\"";
        // line 155
        echo twig_escape_filter($this->env, site_url("oauth/signout"), "html", null, true);
        echo "\">Sign Out</a>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>";
    }

    public function getTemplateName()
    {
        return "chunks/navbar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  340 => 155,  336 => 153,  334 => 141,  328 => 139,  325 => 138,  319 => 136,  316 => 135,  314 => 134,  307 => 130,  303 => 129,  298 => 126,  294 => 123,  292 => 122,  289 => 121,  286 => 120,  283 => 117,  281 => 116,  278 => 115,  276 => 114,  274 => 113,  272 => 112,  268 => 109,  263 => 107,  257 => 105,  253 => 104,  247 => 102,  243 => 101,  237 => 99,  233 => 98,  227 => 96,  223 => 95,  217 => 93,  213 => 92,  207 => 90,  203 => 89,  197 => 87,  194 => 86,  188 => 82,  184 => 74,  182 => 73,  179 => 72,  176 => 71,  173 => 63,  171 => 62,  168 => 61,  166 => 60,  164 => 59,  161 => 57,  155 => 54,  152 => 53,  148 => 52,  143 => 49,  138 => 47,  134 => 46,  129 => 45,  125 => 44,  119 => 42,  116 => 41,  111 => 38,  107 => 37,  99 => 32,  93 => 31,  89 => 29,  86 => 28,  83 => 27,  75 => 24,  70 => 23,  63 => 21,  55 => 19,  46 => 15,  43 => 14,  36 => 11,  28 => 4,  22 => 2,  82 => 38,  80 => 26,  72 => 31,  67 => 22,  64 => 27,  62 => 26,  58 => 20,  52 => 18,  47 => 15,  44 => 14,  40 => 13,  38 => 14,  35 => 10,  33 => 9,  29 => 7,  27 => 7,  21 => 2,  19 => 1,);
    }
}
