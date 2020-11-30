<?php

/* modules/firm/form.html */
class __TwigTemplate_bb737e6037b4d195dfee0cb10d2f36d0 extends Twig_Template
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
function addCommas(nStr)
{
\tnStr += '';
\tx = nStr.split('.');
\tx1 = x[0];
\tx2 = x.length > 1 ? '.' + x[1] : '';
\tvar rgx = /(\\d+)(\\d{3})/;
\twhile (rgx.test(x1)) {
\t\tx1 = x1.replace(rgx, '\$1' + ',' + '\$2');
\t}
\treturn x1 + x2;
}
function loadkantor(){
\tvar edit_id= \"";
        // line 15
        if (isset($context["kode_kantor"])) { $_kode_kantor_ = $context["kode_kantor"]; } else { $_kode_kantor_ = null; }
        echo twig_escape_filter($this->env, $_kode_kantor_, "html", null, true);
        echo "\";
\t\$(\"#kontrak-form #kode_kantor\").find('option').remove();
\t\$(\"#kontrak-form #kode_kantor\").append('<option value=\"\">--SELECT KANTOR--</option>');
\tif(\$(\"#kontrak-form #id_osp\")!=\"\"){
\t\t\$.ajax({
\t\t  type: \"POST\",
\t\t  url: \"";
        // line 21
        echo twig_escape_filter($this->env, site_url("kantor/getlist_by_osp_ajax"), "html", null, true);
        echo "\",
\t\t  data: {id_osp:\$(\"#kontrak-form #id_osp\").val()},
\t\t  dataType: 'json'
\t\t}).done(function(data){
\t\t\tif(data.success){
\t\t\t\t\$.each(data.data,function(key,val){
\t\t\t\t\tif(edit_id==val.kode_kantor)
\t\t\t\t\t   \$(\"#kontrak-form #kode_kantor\").append('<option value=\"'+val.kode_kantor+'\" selected=\"selected\">'+val.nama_kantor+' - '+val.nama_kabupaten+'</option>');
\t\t\t\t\telse
\t\t\t\t\t   \$(\"#kontrak-form #kode_kantor\").append('<option value=\"'+val.kode_kantor+'\">'+val.nama_kantor+' - '+val.nama_kabupaten+'</option>');
\t\t\t\t});
\t\t\t}
\t\t});
\t}
}
var loadsaldo = function (callback){
    if(\$(\"#kontrak-form #kode_kantor\")!=\"\"){
        \$(\"#saldo\").val(\"\");
\t\t\$.ajax({
\t\t  type: \"POST\",
\t\t  url: \"";
        // line 41
        echo twig_escape_filter($this->env, site_url("firm/getAmount"), "html", null, true);
        echo "\",
\t\t  data: {kode_kantor:\$(\"#kontrak-form #kode_kantor\").val()},
\t\t  dataType: 'json'
\t\t}).done(function(data){
\t\t\tif(data.success){
                callback(Math.max(0, 50000000-data.data.total));
\t\t\t}
            else{
                callback(50000000);
            }
\t\t}).fail(function(){
            callback(50000000);
        });
\t}
}
function setsaldo(saldo){
    \$(\"#jumlah\").rules('remove');
    \$(\"#jumlah\").rules('add',{
        currency_max: saldo
    });
    var val = \$(\"#kontrak-form\").validate();
    val.showErrors({\"jumlah\":\"Sisa saldo yang harus ditransfer: \"+addCommas(saldo)});
}
\$(document).on('ready',function(){
\t\$.validator.addMethod(\"currency_min\", function(value, element, params){
\t\tif(value==\"0\"){
\t\t\treturn false;
\t\t}
\t\treturn true;\t
\t}, \$.validator.format(\"Silakan Masukan Angka Di Atas 0\"));
\t\$.validator.addMethod(\"currency_max\", function(value, element, params){        
\t\tif(\$(\"#kode_jabatan\").val()==\"BKM\" && \$(\"#kode_kantor\").val().indexOf(\"BKM\") != -1){            
            if(parseInt(value.replace(/,/g,''))>params){
\t\t\t    return false;
            }
\t\t}
\t\treturn true;\t
\t}, function(param, element){
        var newParam = addCommas(param);
        return \$.validator.format(\"Sisa saldo yang harus ditransfer: {0}\", newParam);
    });
\t\$(\"#kontrak-form\").validate({
\t\trules: {
\t\t\tjumlah: {
\t\t\t\tcurrency_min: true,
\t\t\t\tcurrency_max: 50000000                
\t\t\t}
\t\t},
\t\tsubmitHandler: function(form) {
\t\t\tvar edit_id= \"";
        // line 90
        if (isset($context["kode_kantor"])) { $_kode_kantor_ = $context["kode_kantor"]; } else { $_kode_kantor_ = null; }
        echo twig_escape_filter($this->env, $_kode_kantor_, "html", null, true);
        echo "\";
\t\t\tif(edit_id==\"\")
\t\t\t\turl = \"";
        // line 92
        echo twig_escape_filter($this->env, site_url("firm/add"), "html", null, true);
        echo "\";
\t\t\telse
\t\t\t\turl = \"";
        // line 94
        echo twig_escape_filter($this->env, site_url("firm/edit/"), "html", null, true);
        echo "\"+\$(\"#no_bukti\").val();
\t\t\tvar test = \$(\"#kontrak-form #jumlah\").val();
\t\t\t\$(\"#kontrak-form #jumlah\").val(test.replace(/,/g,''));
\t\t\t\$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: url,
\t\t\t  data: \$(\"#kontrak-form\").serialize(),
\t\t\t  dataType: 'json'
\t\t\t}).done(function(data){
\t\t\t\tif(data.success)
\t\t\t\tdocument.location.href=\"";
        // line 104
        echo twig_escape_filter($this->env, site_url("firm"), "html", null, true);
        echo "\";
\t\t\t});
\t\t\treturn false;
\t\t}
\t});
\t\$(\"#id_osp\").on('change',function(){
\t\tloadkantor();
\t});
    \$(\"#kode_kantor\").on('change',function(){
        if(\$(\"#kode_kantor\").val().indexOf(\"BKM\") != -1){
            loadsaldo(setsaldo);
        } else {
            \$(\"#jumlah\").rules('remove');
            \$(\"#jumlah\").valid();
        }        
\t});
\t\$(\".datepicker\").datepicker({dateFormat:\"dd-mm-yy\",changeYear:true,changeMonth:true});
\t\$(\"#jumlah\").maskMoney({thousands:',', decimal:'', allowZero:true,precision:0});
\t\$(\"#id_osp\").trigger('change');
    \$(\"#kode_jabatan\").on('change',function(){
\t\tif(this.value==\"K-TP\"){
            \$(\"#jumlah\").val(3000000);
            \$(\"#jumlah\").attr('readonly','readonly');
        } else {
            \$(\"#jumlah\").val(0);
            \$(\"#jumlah\").removeAttr('readonly');
        }
\t});
});
</script>
<form action=\"\" method=\"post\" id=\"kontrak-form\">
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Form Kontrak</h4>
\t\t</div>
\t\t<div style=\"padding: 10px 0 0;\" class=\"widget-body\">
\t\t\t
\t\t\t<div class=\"row-fluid\">
                <div class=\"span6\">
                
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">No Bukti Transfer</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <input type=\"text\" class=\"span12 required\" placeholder=\"No Bukti Transfer\" name=\"no_bukti\" id=\"no_bukti\" ";
        // line 150
        if (isset($context["mode"])) { $_mode_ = $context["mode"]; } else { $_mode_ = null; }
        if (($_mode_ == "edit")) {
            echo "readonly=\"readonly\"";
        }
        echo " value=\"";
        if (isset($context["no_bukti"])) { $_no_bukti_ = $context["no_bukti"]; } else { $_no_bukti_ = null; }
        echo twig_escape_filter($this->env, $_no_bukti_, "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Tanggal Transfer</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <input type=\"text\" class=\"span12 required datepicker\" placeholder=\"Tanggal Transfer\" name=\"tanggal_transfer\" id=\"tanggal_transfer\" readonly=\"readonly\" value=\"";
        // line 160
        if (isset($context["tanggal_transfer"])) { $_tanggal_transfer_ = $context["tanggal_transfer"]; } else { $_tanggal_transfer_ = null; }
        echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $_tanggal_transfer_, "d-m-Y"), twig_date_format_filter($this->env, "now", "d-m-Y")), "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>
                    
                \t<div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Jabatan</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <select name=\"kode_jabatan\" id=\"kode_jabatan\" class=\"required span12\">
                                \t<option value=\"\">--PILIH JABATAN--</option>
                                    ";
        // line 172
        if (isset($context["list_jabatan"])) { $_list_jabatan_ = $context["list_jabatan"]; } else { $_list_jabatan_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_jabatan_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 173
            echo "                                    <option value=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "kode_jabatan"), "html", null, true);
            echo "\" ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            if (isset($context["kode_jabatan"])) { $_kode_jabatan_ = $context["kode_jabatan"]; } else { $_kode_jabatan_ = null; }
            if (($this->getAttribute($_val_, "kode_jabatan") == $_kode_jabatan_)) {
                echo "selected=\"selected\"";
            }
            echo ">";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_jabatan"), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 175
        echo "                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Kantor</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <select id=\"id_osp\" class=\"span4 required\" ";
        // line 184
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        if (($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 4)) {
            echo "disabled=\"disabled\"";
        }
        echo ">
                                    <option value=\"\">--SELECT OSP--</option>
                                    ";
        // line 186
        if (isset($context["list_osp"])) { $_list_osp_ = $context["list_osp"]; } else { $_list_osp_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_osp_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 187
            echo "                                    <option value=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id"), "html", null, true);
            echo "\" ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            if (isset($context["id_osp"])) { $_id_osp_ = $context["id_osp"]; } else { $_id_osp_ = null; }
            if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
            if ((($this->getAttribute($_val_, "id") == $_id_osp_) || (($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group") == 4) && ($this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_osp") == $this->getAttribute($_val_, "id"))))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "osp_name"), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 189
        echo "                                </select>
                                <select id=\"kode_kantor\" name=\"kode_kantor\" class=\"span8 required\">
                                    <option value=\"\">--SELECT KANTOR--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Periode</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <select id=\"periode_bulan\" class=\"span4 required\" name=\"periode_bulan\">
                                    <option value=\"\">--SELECT BULAN--</option>
                                    ";
        // line 203
        if (isset($context["list_month"])) { $_list_month_ = $context["list_month"]; } else { $_list_month_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_month_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 204
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
        // line 206
        echo "                                </select>
                                <select id=\"periode_tahun\" class=\"span8 required\" name=\"periode_tahun\">
                                    <option value=\"\">--SELECT TAHUN--</option>
                                    ";
        // line 209
        $context["start"] = 2014;
        // line 210
        echo "                                    ";
        if (isset($context["start"])) { $_start_ = $context["start"]; } else { $_start_ = null; }
        $context["end"] = ($_start_ + 11);
        // line 211
        echo "                                    ";
        if (isset($context["start"])) { $_start_ = $context["start"]; } else { $_start_ = null; }
        if (isset($context["end"])) { $_end_ = $context["end"]; } else { $_end_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range($_start_, $_end_));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 212
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
        // line 214
        echo "                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"span6\">
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Bank Penerima</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
\t                            <input type=\"text\" class=\"span12 required\" placeholder=\"Bank Penerima\" name=\"bank_tujuan\" id=\"bank_tujuan\" value=\"";
        // line 225
        if (isset($context["bank_tujuan"])) { $_bank_tujuan_ = $context["bank_tujuan"]; } else { $_bank_tujuan_ = null; }
        echo twig_escape_filter($this->env, $_bank_tujuan_, "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Nomor Rekening Penerima</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
\t                            <input type=\"text\" class=\"span12 required\" placeholder=\"Nomor Rekening Penerima\" name=\"ke_no_rek\" id=\"ke_no_rek\" value=\"";
        // line 234
        if (isset($context["ke_no_rek"])) { $_ke_no_rek_ = $context["ke_no_rek"]; } else { $_ke_no_rek_ = null; }
        echo twig_escape_filter($this->env, $_ke_no_rek_, "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Nama Penerima</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
\t                            <input type=\"text\" class=\"span12 required\" placeholder=\"Nama Penerima\" name=\"nama_penerima\" id=\"nama_penerima\" value=\"";
        // line 243
        if (isset($context["nama_penerima"])) { $_nama_penerima_ = $context["nama_penerima"]; } else { $_nama_penerima_ = null; }
        echo twig_escape_filter($this->env, $_nama_penerima_, "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Jumlah Ditransfer</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
\t                            <input type=\"text\" class=\"span12 required\" placeholder=\"Nama Penerima\" name=\"jumlah\" id=\"jumlah\" value=\"";
        // line 252
        if (isset($context["jumlah"])) { $_jumlah_ = $context["jumlah"]; } else { $_jumlah_ = null; }
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $_jumlah_, 0, "", ","), "html", null, true);
        echo "\">
                                <input type=\"hidden\" name=\"saldo\" id=\"saldo\">
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Keterangan</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
\t                            <textarea name=\"keterangan\" class=\"span12\">";
        // line 262
        if (isset($context["keterangan"])) { $_keterangan_ = $context["keterangan"]; } else { $_keterangan_ = null; }
        echo twig_escape_filter($this->env, $_keterangan_, "html", null, true);
        echo "</textarea>
                            </div>
                        </div>
                    </div>
                </div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
            \t<div class=\"span12\">
                \t<div class=\"widget widget-4\">
                        <div class=\"separator\"></div>
                        <button class=\"btn btn-block btn-primary\" type=\"submit\">Simpan</button>
                \t</div>
                </div>
            </div>
\t\t</div>\t
\t</div>
</div>
</form>";
    }

    public function getTemplateName()
    {
        return "modules/firm/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  439 => 262,  425 => 252,  412 => 243,  399 => 234,  386 => 225,  373 => 214,  354 => 212,  347 => 211,  343 => 210,  341 => 209,  336 => 206,  317 => 204,  312 => 203,  296 => 189,  276 => 187,  271 => 186,  263 => 184,  252 => 175,  233 => 173,  228 => 172,  212 => 160,  193 => 150,  144 => 104,  131 => 94,  126 => 92,  120 => 90,  68 => 41,  45 => 21,  35 => 15,  19 => 1,);
    }
}
