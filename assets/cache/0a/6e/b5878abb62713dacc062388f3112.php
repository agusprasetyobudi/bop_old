<?php

/* modules/bukubank/list.html */
class __TwigTemplate_0a6eb5878abb62713dacc062388f3112 extends Twig_Template
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
        echo "<style>
#firm-table tr.green td
{
\tbackground:#C6EBB3;
}
#firm-table tr.red td
{
\tbackground:#FFC0C6;
}
</style>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Data Buku Kas</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px;\">
        <a type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, site_url("bukubank/add"), "html", null, true);
        echo "\"><i></i>Tambah Data</a>
        </div>
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"firm-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>No</th>
                      <th>No Bukti Transfer</th>
                      <th>Tanggal</th>
                      <th>Uraian</th>
                      <th>No Bukti</th>
                      <th>Transaksi Debet</th>
                      <th>Transaksi Kredit</th>
                      <th>Saldo Debet</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
                \t";
        // line 34
        $context["debet"] = 0;
        // line 35
        echo "                    ";
        $context["kredit"] = 0;
        // line 36
        echo "                    ";
        $context["saldo"] = 0;
        // line 37
        echo "                    ";
        $context["no_bukti"] = "";
        // line 38
        echo "                    ";
        $context["index"] = 0;
        // line 39
        echo "                \t";
        if (isset($context["list"])) { $_list_ = $context["list"]; } else { $_list_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 40
            echo "                   ";
            // line 55
            echo "                    ";
            if (isset($context["index"])) { $_index_ = $context["index"]; } else { $_index_ = null; }
            $context["index"] = ($_index_ + 1);
            // line 56
            echo "                    ";
            if (isset($context["index"])) { $_index_ = $context["index"]; } else { $_index_ = null; }
            $context["index_c"] = $_index_;
            // line 57
            echo "                    ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context["no_bukti_transfer"] = $this->getAttribute($_val_, "no_bukti_transfer");
            // line 58
            echo "                    ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context["tanggal"] = $this->getAttribute($_val_, "tanggal");
            // line 59
            echo "                    ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context["nama_komponen"] = $this->getAttribute($this->getAttribute($_val_, "uraian"), "nama_komponen");
            // line 60
            echo "                    ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context["nama_subkomponen"] = $this->getAttribute($this->getAttribute($_val_, "uraian"), "nama_subkomponen");
            // line 61
            echo "                    ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context["nama_aktifitas"] = $this->getAttribute($this->getAttribute($_val_, "uraian"), "nama_aktifitas");
            // line 62
            echo "                    ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context["no_bukti"] = $this->getAttribute($_val_, "no_bukti");
            // line 63
            echo "                    ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context["total"] = $this->getAttribute($_val_, "total");
            echo " 
\t\t\t\t\t<tr>
                    \t
\t\t\t\t\t  <td>";
            // line 66
            if (isset($context["index_c"])) { $_index_c_ = $context["index_c"]; } else { $_index_c_ = null; }
            echo twig_escape_filter($this->env, $_index_c_, "html", null, true);
            echo "</td>
                      <td>";
            // line 67
            if (isset($context["no_bukti_transfer"])) { $_no_bukti_transfer_ = $context["no_bukti_transfer"]; } else { $_no_bukti_transfer_ = null; }
            echo twig_escape_filter($this->env, $_no_bukti_transfer_, "html", null, true);
            echo "</td>
                      <td>";
            // line 68
            if (isset($context["tanggal"])) { $_tanggal_ = $context["tanggal"]; } else { $_tanggal_ = null; }
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $_tanggal_, "d-m-Y"), "html", null, true);
            echo "</td>
                      <td>";
            // line 69
            if (isset($context["nama_komponen"])) { $_nama_komponen_ = $context["nama_komponen"]; } else { $_nama_komponen_ = null; }
            echo twig_escape_filter($this->env, $_nama_komponen_, "html", null, true);
            echo " - ";
            if (isset($context["nama_subkomponen"])) { $_nama_subkomponen_ = $context["nama_subkomponen"]; } else { $_nama_subkomponen_ = null; }
            if (($_nama_subkomponen_ == "Activity")) {
                if (isset($context["nama_aktifitas"])) { $_nama_aktifitas_ = $context["nama_aktifitas"]; } else { $_nama_aktifitas_ = null; }
                echo twig_escape_filter($this->env, $_nama_aktifitas_, "html", null, true);
            } else {
                if (isset($context["nama_subkomponen"])) { $_nama_subkomponen_ = $context["nama_subkomponen"]; } else { $_nama_subkomponen_ = null; }
                echo twig_escape_filter($this->env, $_nama_subkomponen_, "html", null, true);
                echo " (";
                if (isset($context["nama_aktifitas"])) { $_nama_aktifitas_ = $context["nama_aktifitas"]; } else { $_nama_aktifitas_ = null; }
                echo twig_escape_filter($this->env, $_nama_aktifitas_, "html", null, true);
                echo ")";
            }
            echo "</td>
                      <td>";
            // line 70
            if (isset($context["no_bukti"])) { $_no_bukti_ = $context["no_bukti"]; } else { $_no_bukti_ = null; }
            echo twig_escape_filter($this->env, $_no_bukti_, "html", null, true);
            echo "</td>
                      <td>";
            // line 71
            if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_total_, 0, ".", ","), "html", null, true);
            echo "</td>
                      <td></td>
                      <td>";
            // line 73
            if (isset($context["saldo"])) { $_saldo_ = $context["saldo"]; } else { $_saldo_ = null; }
            if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($_saldo_ + $_total_), 0, ".", ","), "html", null, true);
            echo "</td>
                      ";
            // line 74
            if (isset($context["saldo"])) { $_saldo_ = $context["saldo"]; } else { $_saldo_ = null; }
            if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
            $context["saldo"] = ($_saldo_ + $_total_);
            // line 75
            echo "                      ";
            if (isset($context["debet"])) { $_debet_ = $context["debet"]; } else { $_debet_ = null; }
            if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
            $context["debet"] = ($_debet_ + $_total_);
            // line 76
            echo "                      ";
            if (isset($context["index_c"])) { $_index_c_ = $context["index_c"]; } else { $_index_c_ = null; }
            $context["index_c"] = ($_index_c_ + 1);
            // line 77
            echo "\t\t\t\t\t</tr>
                    \t
                    ";
            // line 79
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_val_, "debet"));
            foreach ($context['_seq'] as $context["d_key"] => $context["d_val"]) {
                // line 80
                echo "                    \t";
                if (isset($context["index"])) { $_index_ = $context["index"]; } else { $_index_ = null; }
                $context["index"] = ($_index_ + 1);
                // line 81
                echo "                        ";
                if (isset($context["index"])) { $_index_ = $context["index"]; } else { $_index_ = null; }
                $context["index_c"] = $_index_;
                // line 82
                echo "                        ";
                if (isset($context["no_bukti_transfer"])) { $_no_bukti_transfer_ = $context["no_bukti_transfer"]; } else { $_no_bukti_transfer_ = null; }
                $context["no_bukti_transfer"] = $_no_bukti_transfer_;
                // line 83
                echo "                        ";
                if (isset($context["d_val"])) { $_d_val_ = $context["d_val"]; } else { $_d_val_ = null; }
                $context["tanggal"] = $this->getAttribute($_d_val_, "tanggal");
                // line 84
                echo "                        ";
                if (isset($context["d_val"])) { $_d_val_ = $context["d_val"]; } else { $_d_val_ = null; }
                $context["no_bukti"] = $this->getAttribute($_d_val_, "no_bukti");
                // line 85
                echo "                        ";
                if (isset($context["d_val"])) { $_d_val_ = $context["d_val"]; } else { $_d_val_ = null; }
                $context["total"] = $this->getAttribute($_d_val_, "total");
                echo " 
                        <tr>
                            
                          <td>";
                // line 88
                if (isset($context["index_c"])) { $_index_c_ = $context["index_c"]; } else { $_index_c_ = null; }
                echo twig_escape_filter($this->env, $_index_c_, "html", null, true);
                echo "</td>
                          <td>";
                // line 89
                if (isset($context["no_bukti_transfer"])) { $_no_bukti_transfer_ = $context["no_bukti_transfer"]; } else { $_no_bukti_transfer_ = null; }
                echo twig_escape_filter($this->env, $_no_bukti_transfer_, "html", null, true);
                echo "</td>
                          <td>";
                // line 90
                if (isset($context["tanggal"])) { $_tanggal_ = $context["tanggal"]; } else { $_tanggal_ = null; }
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $_tanggal_, "d-m-Y"), "html", null, true);
                echo "</td>
                          <td>";
                // line 91
                if (isset($context["nama_komponen"])) { $_nama_komponen_ = $context["nama_komponen"]; } else { $_nama_komponen_ = null; }
                echo twig_escape_filter($this->env, $_nama_komponen_, "html", null, true);
                echo " - ";
                if (isset($context["nama_subkomponen"])) { $_nama_subkomponen_ = $context["nama_subkomponen"]; } else { $_nama_subkomponen_ = null; }
                if (($_nama_subkomponen_ == "Activity")) {
                    if (isset($context["nama_aktifitas"])) { $_nama_aktifitas_ = $context["nama_aktifitas"]; } else { $_nama_aktifitas_ = null; }
                    echo twig_escape_filter($this->env, $_nama_aktifitas_, "html", null, true);
                } else {
                    if (isset($context["nama_subkomponen"])) { $_nama_subkomponen_ = $context["nama_subkomponen"]; } else { $_nama_subkomponen_ = null; }
                    echo twig_escape_filter($this->env, $_nama_subkomponen_, "html", null, true);
                    echo " (";
                    if (isset($context["nama_aktifitas"])) { $_nama_aktifitas_ = $context["nama_aktifitas"]; } else { $_nama_aktifitas_ = null; }
                    echo twig_escape_filter($this->env, $_nama_aktifitas_, "html", null, true);
                    echo ")";
                }
                echo "</td>
                          <td>";
                // line 92
                if (isset($context["no_bukti"])) { $_no_bukti_ = $context["no_bukti"]; } else { $_no_bukti_ = null; }
                echo twig_escape_filter($this->env, $_no_bukti_, "html", null, true);
                echo "</td>
                          <td></td>
                          <td>";
                // line 94
                if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_total_, 0, ".", ","), "html", null, true);
                echo "</td>
                          <td>";
                // line 95
                if (isset($context["saldo"])) { $_saldo_ = $context["saldo"]; } else { $_saldo_ = null; }
                if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($_saldo_ - $_total_), 0, ".", ","), "html", null, true);
                echo "</td>
                          ";
                // line 96
                if (isset($context["saldo"])) { $_saldo_ = $context["saldo"]; } else { $_saldo_ = null; }
                if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
                $context["saldo"] = ($_saldo_ - $_total_);
                // line 97
                echo "                          ";
                if (isset($context["kredit"])) { $_kredit_ = $context["kredit"]; } else { $_kredit_ = null; }
                if (isset($context["total"])) { $_total_ = $context["total"]; } else { $_total_ = null; }
                $context["kredit"] = ($_kredit_ + $_total_);
                // line 98
                echo "                          ";
                if (isset($context["index_c"])) { $_index_c_ = $context["index_c"]; } else { $_index_c_ = null; }
                $context["index_c"] = ($_index_c_ + 1);
                // line 99
                echo "                        </tr>
                       ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['d_key'], $context['d_val'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 101
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 102
        echo "\t\t\t\t</tbody>
                <tfoot>
                \t<tr>
                    \t<td colspan=\"5\">
                        
                        </td>
                        <td>
                        \t";
        // line 109
        if (isset($context["debet"])) { $_debet_ = $context["debet"]; } else { $_debet_ = null; }
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_debet_, 0, ".", ","), "html", null, true);
        echo "
                        </td>
                        <td>
                        \t";
        // line 112
        if (isset($context["kredit"])) { $_kredit_ = $context["kredit"]; } else { $_kredit_ = null; }
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_kredit_, 0, ".", ","), "html", null, true);
        echo "
                        </td>
                        <td>
                        \t";
        // line 115
        if (isset($context["saldo"])) { $_saldo_ = $context["saldo"]; } else { $_saldo_ = null; }
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_saldo_, 0, ".", ","), "html", null, true);
        echo "
                        </td>
                    </tr>
                </tfoot>
\t\t\t</table>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/bukubank/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 115,  311 => 112,  304 => 109,  295 => 102,  289 => 101,  282 => 99,  278 => 98,  273 => 97,  269 => 96,  263 => 95,  258 => 94,  252 => 92,  234 => 91,  229 => 90,  224 => 89,  219 => 88,  211 => 85,  207 => 84,  203 => 83,  199 => 82,  195 => 81,  191 => 80,  186 => 79,  182 => 77,  178 => 76,  173 => 75,  169 => 74,  163 => 73,  157 => 71,  152 => 70,  134 => 69,  129 => 68,  124 => 67,  119 => 66,  111 => 63,  107 => 62,  103 => 61,  99 => 60,  95 => 59,  91 => 58,  87 => 57,  83 => 56,  79 => 55,  77 => 40,  71 => 39,  68 => 38,  65 => 37,  62 => 36,  59 => 35,  57 => 34,  37 => 17,  19 => 1,);
    }
}
