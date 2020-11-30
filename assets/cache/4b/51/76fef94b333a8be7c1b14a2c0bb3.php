<?php

/* modules/bukubank/form.html */
class __TwigTemplate_4b5176fef94b333a8be7c1b14a2c0bb3 extends Twig_Template
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
        echo "<script>
Number.prototype.formatMoney = function(places, symbol, thousand, decimal) {
\tplaces = !isNaN(places = Math.abs(places)) ? places : 2;
\tsymbol = symbol !== undefined ? symbol : \"\$\";
\tthousand = thousand || \",\";
\tdecimal = decimal || \".\";
\tvar number = this, 
\t    negative = number < 0 ? \"-\" : \"\",
\t    i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + \"\",
\t    j = (j = i.length) > 3 ? j % 3 : 0;
\treturn symbol + negative + (j ? i.substr(0, j) + thousand : \"\") + i.substr(j).replace(/(\\d{3})(?=\\d)/g, \"\$1\" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : \"\");
};
\$(document).on('ready',function(){
\tvar message = \"\";
\tvar messageFunc = function () { return message; };
\t\$.validator.addMethod(\"currency_min\", function(value, element, params) {
\t\tvalue = Number(value.replace(/,/g, ''));
\t\tif(value==0)
\t\t{
\t\t\treturn false;
\t\t}
\t\treturn true;
\t
\t}, \$.validator.format(\"Silakan Masukan Angka Diatas 0\"));
\t\$.validator.addMethod(\"maximum_val\", function(value, element, params) {
\t\tvalue = Number(value.replace(/,/g, ''));
\t\tmax_c = Number(\$(\"#id_item_transfer\").find('option:selected').attr('data-max'));
\t\tif(value>max_c)
\t\t{
\t\t\tmessage = \"Maksimal Nilai Yang Diperbolehkan \" + max_c.formatMoney(0,'',',','');
\t\t\tconsole.log(message);
\t\t\treturn false;
\t\t}
\t\treturn true;
\t
\t}, messageFunc);
\t\$('#form-search').validate({
\t\tsubmitHandler:function(form){
\t\t\tform.submit();
\t\t\treturn false;
\t\t}
\t});
\t\$('#form-input').validate({
\t\trules:{
\t\t\ttotal : {
\t\t\t\tcurrency_min : true,
\t\t\t\tmaximum_val:true
\t\t\t}
\t\t},
\t\tsubmitHandler:function(){
\t\t\t\$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 53
        echo twig_escape_filter($this->env, site_url("bukubank/save"), "html", null, true);
        echo "\",
\t\t\t  data: \$('#form-input').serialize(),
\t\t\t  success: function(out){
\t\t\t\t  if(out.success)
\t\t\t\t  {
\t\t\t\t\t  document.location.href=\"";
        // line 58
        echo twig_escape_filter($this->env, site_url("bukubank"), "html", null, true);
        echo "\";
\t\t\t\t  }
\t\t\t\t  else
\t\t\t\t  {
\t\t\t\t\t  alert(out.message);
\t\t\t\t  }
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t});
\t\t\treturn false;
\t\t}
\t});
\t\$(\".datepicker\").datepicker({dateFormat:\"dd-mm-yy\",changeYear:true,changeMonth:true});
\t\$(\".money\").maskMoney({thousands:',', decimal:'', allowZero:true,precision:0});
\t\$(\"#id_komponen_biaya\").on('change',function(){
\t\tmasx = \$(this).find('option:selected').attr('data-max');
\t});
});
</script>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Form Buku Kas</h4>
\t\t</div>
\t\t<div style=\"padding: 10px 0 0;\" class=\"widget-body\">
        \t<form action=\"\" method=\"post\" id=\"form-search\">
\t\t\t<div class=\"row-fluid\">
                <div class=\"span6\">
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Kota (Kabupaten) / Nama Korkot</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<div class=\"span6 input img-polaroid\" id=\"kode_jabatan\">
\t\t\t\t\t\t\t\t\t";
        // line 92
        if (isset($context["kabupaten"])) { $_kabupaten_ = $context["kabupaten"]; } else { $_kabupaten_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_kabupaten_, "nama_kabupaten"), "html", null, true);
        echo "
                                </div>
                                <div class=\"controls span6\">
\t                            <input type=\"text\" class=\"span12\" disabled=\"disabled\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, cfsession("bop_last.nickname"), "html", null, true);
        echo "\">
\t                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"widget widget-4 row-fluid\">
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                            \t<input type=\"hidden\" name=\"search\" value=\"1\" />
                                <button type=\"submit\" class=\"btn btn-primary\">Search</button>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class=\"span6\">
                \t
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Bulan / Tahun</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                                <select id=\"periode_bulan\" class=\"span4 required\" name=\"periode_bulan\">
                                    <option value=\"\">--SELECT BULAN--</option>
                                    ";
        // line 121
        if (isset($context["list_month"])) { $_list_month_ = $context["list_month"]; } else { $_list_month_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_month_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 122
            echo "                                    <option value=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id"), "html", null, true);
            echo "\" ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            if (isset($context["periode_bulan"])) { $_periode_bulan_ = $context["periode_bulan"]; } else { $_periode_bulan_ = null; }
            if (($this->getAttribute($_val_, "id") == $_periode_bulan_)) {
                echo "selected=\"selected\"";
            }
            echo ">";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "bulan"), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 124
        echo "                                </select>
                                <select id=\"periode_tahun\" class=\"span8 required\" name=\"periode_tahun\">
                                    <option value=\"\">--SELECT TAHUN--</option>
                                    ";
        // line 127
        $context["start"] = 2014;
        // line 128
        echo "                                    ";
        if (isset($context["start"])) { $_start_ = $context["start"]; } else { $_start_ = null; }
        $context["end"] = ($_start_ + 5);
        // line 129
        echo "                                    ";
        if (isset($context["start"])) { $_start_ = $context["start"]; } else { $_start_ = null; }
        if (isset($context["end"])) { $_end_ = $context["end"]; } else { $_end_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range($_start_, $_end_));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 130
            echo "                                    <option value=\"";
            if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
            echo twig_escape_filter($this->env, $_i_, "html", null, true);
            echo "\" ";
            if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
            if (isset($context["periode_tahun"])) { $_periode_tahun_ = $context["periode_tahun"]; } else { $_periode_tahun_ = null; }
            if (($_i_ == $_periode_tahun_)) {
                echo "selected=\"selected\"";
            }
            echo ">";
            if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
            echo twig_escape_filter($this->env, $_i_, "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 132
        echo "                                </select>
                            </div>
                        </div>
                    </div>
                </div>
\t\t\t</div>
            </form>
\t\t</div>
        <!-- end widget body -->
        ";
        // line 141
        if (isset($context["firm_list"])) { $_firm_list_ = $context["firm_list"]; } else { $_firm_list_ = null; }
        if ((twig_length_filter($this->env, $_firm_list_) > 0)) {
            // line 142
            echo "        <div class=\"innerLR\">
            <div class=\"widget widget-gray widget-body-white\">
                <div class=\"widget-head\">
                    <h4 class=\"heading\">Data View</h4>
                </div>
                <div class=\"widget-body\" style=\"padding: 10px 0;\">
                    <table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"kontrak-table\">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>No Bukti</th>
                                <th>Transaksi Kredit</th>
                                <th>Transaksi Debet</th>
                                <th>Total Transaksi Kredit</th>
                                <th>Total Transaksi Debet</th>
                                <th>Total Saldo Debet</th>
                            </tr>
                        </thead>
                        <tbody>
                        \t";
            // line 163
            $context["total_t_debet"] = 0;
            // line 164
            echo "                            ";
            $context["total_t_kredit"] = 0;
            // line 165
            echo "                        \t";
            if (isset($context["firm_list"])) { $_firm_list_ = $context["firm_list"]; } else { $_firm_list_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_firm_list_);
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 166
                echo "                            \t
                            \t";
                // line 168
                echo "                            \t";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                $context["transfer_list"] = $this->getAttribute($_val_, "transfer_list");
                // line 169
                echo "                                ";
                if (isset($context["transfer_list"])) { $_transfer_list_ = $context["transfer_list"]; } else { $_transfer_list_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_transfer_list_);
                foreach ($context['_seq'] as $context["tfl_key"] => $context["tfl_val"]) {
                    // line 170
                    echo "                                    ";
                    if (isset($context["tfl_val"])) { $_tfl_val_ = $context["tfl_val"]; } else { $_tfl_val_ = null; }
                    $context["items"] = $this->getAttribute($_tfl_val_, "items");
                    // line 171
                    echo "                                    ";
                    if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($_items_);
                    foreach ($context['_seq'] as $context["items_key"] => $context["items_val"]) {
                        // line 172
                        echo "                                        ";
                        if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                        if ((twig_length_filter($this->env, $this->getAttribute($_items_val_, "t_debet")) > 0)) {
                            // line 173
                            echo "                                        ";
                            if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                            $context["debet"] = $this->getAttribute($_items_val_, "t_debet");
                            // line 174
                            echo "                                        ";
                            if (isset($context["debet"])) { $_debet_ = $context["debet"]; } else { $_debet_ = null; }
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($_debet_);
                            foreach ($context['_seq'] as $context["key_debet"] => $context["val_debet"]) {
                                // line 175
                                echo "                                           ";
                                if (isset($context["total_t_debet"])) { $_total_t_debet_ = $context["total_t_debet"]; } else { $_total_t_debet_ = null; }
                                if (isset($context["val_debet"])) { $_val_debet_ = $context["val_debet"]; } else { $_val_debet_ = null; }
                                $context["total_t_debet"] = ($_total_t_debet_ + $this->getAttribute($_val_debet_, "total"));
                                // line 176
                                echo "                                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['key_debet'], $context['val_debet'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            // line 177
                            echo "                                        ";
                        }
                        // line 178
                        echo "                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['items_key'], $context['items_val'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 179
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['tfl_key'], $context['tfl_val'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 180
                echo "                                ";
                if (isset($context["total_t_kredit"])) { $_total_t_kredit_ = $context["total_t_kredit"]; } else { $_total_t_kredit_ = null; }
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                $context["total_t_kredit"] = ($_total_t_kredit_ + $this->getAttribute($_val_, "jumlah"));
                // line 181
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 182
            echo "                            
                            ";
            // line 183
            if (isset($context["firm_list"])) { $_firm_list_ = $context["firm_list"]; } else { $_firm_list_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_firm_list_);
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
                // line 184
                echo "                            <tr>
                            \t<td>
                                \t";
                // line 186
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_val_, "periode_bulan_label"), "bulan"), "html", null, true);
                echo "/";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_tahun"), "html", null, true);
                echo "
                                </td>
                                <td>
                                \t";
                // line 189
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_val_, "tanggal_transfer"), "d-m-Y"), "html", null, true);
                echo "
                                </td>
                                <td>
                                \t";
                // line 192
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                $context["transfer_list"] = $this->getAttribute($_val_, "transfer_list");
                // line 193
                echo "                                \t";
                if (isset($context["transfer_list"])) { $_transfer_list_ = $context["transfer_list"]; } else { $_transfer_list_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_transfer_list_);
                foreach ($context['_seq'] as $context["tfl_key"] => $context["tfl_val"]) {
                    // line 194
                    echo "                                    \t";
                    if (isset($context["tfl_val"])) { $_tfl_val_ = $context["tfl_val"]; } else { $_tfl_val_ = null; }
                    $context["items"] = $this->getAttribute($_tfl_val_, "items");
                    // line 195
                    echo "                                        ";
                    if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($_items_);
                    foreach ($context['_seq'] as $context["items_key"] => $context["items_val"]) {
                        // line 196
                        echo "                                        \t";
                        if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                        echo twig_escape_filter($this->env, $this->getAttribute($_items_val_, "nama_komponen"), "html", null, true);
                        echo " (";
                        if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                        if (($this->getAttribute($_items_val_, "nama_subkomponen") == "Activity")) {
                            if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                            echo twig_escape_filter($this->env, $this->getAttribute($_items_val_, "nama_aktifitas"), "html", null, true);
                        } else {
                            if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                            echo twig_escape_filter($this->env, $this->getAttribute($_items_val_, "nama_subkomponen"), "html", null, true);
                        }
                        echo ") <hr />
                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['items_key'], $context['items_val'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 198
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['tfl_key'], $context['tfl_val'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 199
                echo "                                </td>
                                <td>
                                \t";
                // line 201
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "no_bukti"), "html", null, true);
                echo "
                                </td>
                                <td>
                                \t";
                // line 204
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                $context["transfer_list"] = $this->getAttribute($_val_, "transfer_list");
                // line 205
                echo "                                \t";
                if (isset($context["transfer_list"])) { $_transfer_list_ = $context["transfer_list"]; } else { $_transfer_list_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_transfer_list_);
                foreach ($context['_seq'] as $context["tfl_key"] => $context["tfl_val"]) {
                    // line 206
                    echo "                                    \t";
                    if (isset($context["tfl_val"])) { $_tfl_val_ = $context["tfl_val"]; } else { $_tfl_val_ = null; }
                    $context["items"] = $this->getAttribute($_tfl_val_, "items");
                    // line 207
                    echo "                                        ";
                    if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($_items_);
                    foreach ($context['_seq'] as $context["items_key"] => $context["items_val"]) {
                        // line 208
                        echo "                                        \t";
                        if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                        if ((twig_length_filter($this->env, $this->getAttribute($_items_val_, "t_debet")) > 0)) {
                            // line 209
                            echo "                                        \t";
                            if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                            echo twig_escape_filter($this->env, $this->getAttribute($_items_val_, "nama_komponen"), "html", null, true);
                            echo " (";
                            if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                            if (($this->getAttribute($_items_val_, "nama_subkomponen") == "Activity")) {
                                if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                                echo twig_escape_filter($this->env, $this->getAttribute($_items_val_, "nama_aktifitas"), "html", null, true);
                            } else {
                                if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                                echo twig_escape_filter($this->env, $this->getAttribute($_items_val_, "nama_subkomponen"), "html", null, true);
                            }
                            echo ") 
                                            ";
                            // line 210
                            if (isset($context["items_val"])) { $_items_val_ = $context["items_val"]; } else { $_items_val_ = null; }
                            $context["debet"] = $this->getAttribute($_items_val_, "t_debet");
                            // line 211
                            echo "                                            ";
                            if (isset($context["debet"])) { $_debet_ = $context["debet"]; } else { $_debet_ = null; }
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($_debet_);
                            foreach ($context['_seq'] as $context["key_debet"] => $context["val_debet"]) {
                                echo "<br />
                                            \t";
                                // line 212
                                if (isset($context["val_debet"])) { $_val_debet_ = $context["val_debet"]; } else { $_val_debet_ = null; }
                                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_val_debet_, "tanggal"), "d-m-Y"), "html", null, true);
                                echo " - ";
                                if (isset($context["val_debet"])) { $_val_debet_ = $context["val_debet"]; } else { $_val_debet_ = null; }
                                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($_val_debet_, "total"), 0, ".", ","), "html", null, true);
                                echo "
                                                
                                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['key_debet'], $context['val_debet'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            // line 215
                            echo "                                            <hr />
                                            ";
                        }
                        // line 217
                        echo "                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['items_key'], $context['items_val'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 218
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['tfl_key'], $context['tfl_val'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 219
                echo "                                </td>
                                <td>
                                \t";
                // line 221
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($_val_, "jumlah"), 0, ".", ","), "html", null, true);
                echo "
                                </td>
                                <td>
                                \t";
                // line 224
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                if ($this->getAttribute($_loop_, "first")) {
                    // line 225
                    echo "                                \t";
                    if (isset($context["total_t_debet"])) { $_total_t_debet_ = $context["total_t_debet"]; } else { $_total_t_debet_ = null; }
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_total_t_debet_, 0, ".", ","), "html", null, true);
                    echo "
                                    ";
                }
                // line 227
                echo "                                </td>
                                <td>
                                \t";
                // line 229
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                if ($this->getAttribute($_loop_, "first")) {
                    // line 230
                    echo "                                \t";
                    if (isset($context["total_t_kredit"])) { $_total_t_kredit_ = $context["total_t_kredit"]; } else { $_total_t_kredit_ = null; }
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_total_t_kredit_, 0, ".", ","), "html", null, true);
                    echo "
                                    ";
                }
                // line 232
                echo "                                </td>
                                <td>
                                \t";
                // line 234
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                if ($this->getAttribute($_loop_, "first")) {
                    // line 235
                    echo "                                \t";
                    if (isset($context["total_t_kredit"])) { $_total_t_kredit_ = $context["total_t_kredit"]; } else { $_total_t_kredit_ = null; }
                    if (isset($context["total_t_debet"])) { $_total_t_debet_ = $context["total_t_debet"]; } else { $_total_t_debet_ = null; }
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($_total_t_kredit_ - $_total_t_debet_), 0, ".", ","), "html", null, true);
                    echo "
                                    ";
                }
                // line 237
                echo "                                </td>
                            </tr>
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
            // line 240
            echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        ";
        }
        // line 246
        echo "        <form action=\"\" method=\"post\" id=\"form-input\">
        <div class=\"widget-head\">
            <h4 class=\"heading\">Transaksi ";
        // line 248
        echo "Kredit </h4>
        </div>\t
        <div style=\"padding: 10px 0 0;\" class=\"widget-body\">
        \t<div class=\"row-fluid\">
                <div class=\"span6\">
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">";
        // line 254
        echo "Kredit</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<input type=\"text\" name=\"total\" id=\"total\" placeholder=\"Kolom Jumlah ";
        // line 258
        echo "Kredit (IDR)\" class=\"required span12 money\" />
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Tanggal</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<input type=\"text\" name=\"tanggal\" id=\"tanggal\" placeholder=\"Tanggal\" class=\"required span12 datepicker\" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end left side -->
                <div class=\"span6\">
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">No Bukti</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<input type=\"text\" name=\"no_bukti\" id=\"no_bukti\" placeholder=\"Kolom Nomor Bukti\" class=\"required span12\" />
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Komponen Biaya</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<select  id=\"id_item_transfer\" name=\"id_item_transfer\" class=\"span12 required\">\t
                                \t<option value=\"\">--PILIH KOMPONEN BIAYA</option>
                                    ";
        // line 290
        if (isset($context["listing_oj"])) { $_listing_oj_ = $context["listing_oj"]; } else { $_listing_oj_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_listing_oj_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 291
            echo "                                    <option data-max=\"";
            if (isset($context["listing_omax"])) { $_listing_omax_ = $context["listing_omax"]; } else { $_listing_omax_ = null; }
            if (isset($context["key"])) { $_key_ = $context["key"]; } else { $_key_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_listing_omax_, $_key_, array(), "array"), "html", null, true);
            echo "\" value=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_komponen"), "html", null, true);
            echo " - ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            if (($this->getAttribute($_val_, "nama_subkomponen") == "Activity")) {
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_aktifitas"), "html", null, true);
            } else {
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_subkomponen"), "html", null, true);
            }
            echo " (";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "no_bukti"), "html", null, true);
            echo ")</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 293
        echo "                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end right side -->
            </div>
        </div>
        <!-- end widget body -->
        ";
        // line 302
        if (isset($context["firm_list"])) { $_firm_list_ = $context["firm_list"]; } else { $_firm_list_ = null; }
        if ((twig_length_filter($this->env, $_firm_list_) > 0)) {
            // line 303
            echo "        <div class=\"widget-head\">
            <h4 class=\"heading\">Transaksi ";
            // line 304
            echo "Debet </h4>
        </div>\t
        <div style=\"padding: 10px 0 0;\" class=\"widget-body\">
        \t";
            // line 307
            if (isset($context["firm_list"])) { $_firm_list_ = $context["firm_list"]; } else { $_firm_list_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_firm_list_);
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 308
                echo "            ";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                $context["tf_list"] = $this->getAttribute($_val_, "transfer_list");
                // line 309
                echo "            ";
                if (isset($context["tf_list"])) { $_tf_list_ = $context["tf_list"]; } else { $_tf_list_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_tf_list_);
                foreach ($context['_seq'] as $context["tf_key"] => $context["tf_val"]) {
                    // line 310
                    echo "        \t<div class=\"row-fluid\">
                <div class=\"span6\">
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">";
                    // line 313
                    echo "Debet</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<div class=\"span12 input img-polaroid\" id=\"kode_jabatan\">
                                \t";
                    // line 318
                    if (isset($context["tf_val"])) { $_tf_val_ = $context["tf_val"]; } else { $_tf_val_ = null; }
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($_tf_val_, "jumlah"), 0, ".", ","), "html", null, true);
                    echo "
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Tanggal</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<div class=\"span12 input img-polaroid\" id=\"kode_jabatan\">
                                \t";
                    // line 329
                    if (isset($context["tf_val"])) { $_tf_val_ = $context["tf_val"]; } else { $_tf_val_ = null; }
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_tf_val_, "tanggal_diterima"), "j-m-Y"), "html", null, true);
                    echo "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end left side -->
                <div class=\"span6\">
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">No Bukti</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<div class=\"span12 input img-polaroid\" id=\"kode_jabatan\">
                                \t";
                    // line 343
                    if (isset($context["tf_val"])) { $_tf_val_ = $context["tf_val"]; } else { $_tf_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_tf_val_, "no_bukti"), "html", null, true);
                    echo "
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Uraian</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t";
                    // line 353
                    if (isset($context["tf_val"])) { $_tf_val_ = $context["tf_val"]; } else { $_tf_val_ = null; }
                    $context["items"] = $this->getAttribute($_tf_val_, "items");
                    // line 354
                    echo "                                ";
                    if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($_items_);
                    foreach ($context['_seq'] as $context["key_items"] => $context["val_items"]) {
                        // line 355
                        echo "                                \t";
                        if (isset($context["val_items"])) { $_val_items_ = $context["val_items"]; } else { $_val_items_ = null; }
                        echo twig_escape_filter($this->env, $this->getAttribute($_val_items_, "nama_komponen"), "html", null, true);
                        echo " - ";
                        if (isset($context["val_items"])) { $_val_items_ = $context["val_items"]; } else { $_val_items_ = null; }
                        if (($this->getAttribute($_val_items_, "nama_subkomponen") == "Activity")) {
                            if (isset($context["val_items"])) { $_val_items_ = $context["val_items"]; } else { $_val_items_ = null; }
                            echo twig_escape_filter($this->env, $this->getAttribute($_val_items_, "nama_aktifitas"), "html", null, true);
                        } else {
                            if (isset($context["val_items"])) { $_val_items_ = $context["val_items"]; } else { $_val_items_ = null; }
                            echo twig_escape_filter($this->env, $this->getAttribute($_val_items_, "nama_subkomponen"), "html", null, true);
                        }
                        echo " (";
                        if (isset($context["val_items"])) { $_val_items_ = $context["val_items"]; } else { $_val_items_ = null; }
                        echo twig_escape_filter($this->env, $this->getAttribute($_val_items_, "jumlah"), "html", null, true);
                        echo ")
                                    <hr />
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key_items'], $context['val_items'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 358
                    echo "                            </div>
                        </div>
                    </div>
                </div>
                <!-- end right side -->
            </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['tf_key'], $context['tf_val'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 365
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 366
            echo "        </div>
        ";
        }
        // line 368
        echo "        <!--<div class=\"row-fluid\">
            <div class=\"span12\">
                <div class=\"widget widget-4\">
                    <div class=\"widget-head\"><h4 class=\"heading\">Saldo Debet</h4></div>
                    <div class=\"separator\"></div>
                    <div class=\"row-fluid\">
                        <div class=\"controls\">
                            <input type=\"text\" readonly=\"readonly\" class=\"span12\" value=\"\" />
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- end widget body -->
        <div class=\"row-fluid\">
            \t<div class=\"span12\">
                \t<div class=\"widget widget-4\">
                    \t<div class=\"separator\"></div>
            \t<button class=\"btn btn-block btn-primary\" type=\"submit\">Simpan</button>
                \t</div>
                </div>
            </div>
         </form>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/bukubank/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  822 => 368,  818 => 366,  812 => 365,  800 => 358,  777 => 355,  771 => 354,  768 => 353,  754 => 343,  736 => 329,  721 => 318,  714 => 313,  709 => 310,  703 => 309,  699 => 308,  694 => 307,  689 => 304,  686 => 303,  683 => 302,  672 => 293,  643 => 291,  638 => 290,  604 => 258,  598 => 254,  590 => 248,  586 => 246,  578 => 240,  562 => 237,  554 => 235,  551 => 234,  547 => 232,  540 => 230,  537 => 229,  533 => 227,  526 => 225,  523 => 224,  516 => 221,  512 => 219,  506 => 218,  500 => 217,  496 => 215,  483 => 212,  475 => 211,  472 => 210,  457 => 209,  453 => 208,  447 => 207,  443 => 206,  437 => 205,  434 => 204,  427 => 201,  423 => 199,  417 => 198,  398 => 196,  392 => 195,  388 => 194,  382 => 193,  379 => 192,  372 => 189,  362 => 186,  358 => 184,  340 => 183,  337 => 182,  331 => 181,  326 => 180,  320 => 179,  314 => 178,  311 => 177,  305 => 176,  300 => 175,  294 => 174,  290 => 173,  286 => 172,  280 => 171,  276 => 170,  270 => 169,  266 => 168,  263 => 166,  257 => 165,  254 => 164,  252 => 163,  229 => 142,  226 => 141,  215 => 132,  196 => 130,  189 => 129,  185 => 128,  183 => 127,  178 => 124,  159 => 122,  154 => 121,  125 => 95,  118 => 92,  81 => 58,  73 => 53,  19 => 1,);
    }
}
